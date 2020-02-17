<?php

namespace App\Http\Controllers;

use App\Candidate;
use App\Election;
use App\Mail\sendVoterConfirmation;
use App\Voter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use phpseclib\Crypt\RSA;
use BitcoinPHP\BitcoinECDSA\BitcoinECDSA;

class VoterController extends Controller
{
    public function index(Voter $model)
    {
        $voters = Voter::all();
        return view('pages.voters.voters_list', compact('voters'));
    }

    public function create()
    {
        $elections = Election::all();
        return view('pages.voters.voter_create', compact('elections'));
    }


    public function store(Request $request, Voter $voter)
    {

        $voter->name = $request->name;
        $voter->email = $request->email;
        $voter->election_id = $request->election_id;
        $key_pair = GenerateKeysController::generate_keys();
        $voter->private_key = $key_pair["privatekey"];
        $voter->public_key = $key_pair["publickey"];

        $bitcoinECDSA = new BitcoinECDSA();
        $bitcoinECDSA->setPrivateKey((integer)$key_pair["privatekey"]);
//        dd($bitcoinECDSA->getAddress());
        $address = $bitcoinECDSA->getUncompressedAddress();
        $voter->bitcoin_address = $request->bitcoin_address;

        $voter->network = $request->network;
        $voter->verify_token = sha1(uniqid($voter->private_key, true));
        $voter->save();
        $url = 'http://localhost:8000/voter/verify/' . $voter->verify_token;
        Mail::to($request->email)->send(new sendVoterConfirmation($request->name, $url));
        return redirect()->route('voter.index')->withStatus(__('Voter successfully created.'));
    }

    public function edit(Voter $voter)
    {
        return view('pages.voters.voter_edit', compact('voter'));
    }

    public function update(Request $request, Voter $voter)
    {
        $voter->name = $request->get('name');
        $voter->email = $request->get('email');
        $voter->bitcoin_address = $request->get('bitcoin_address');
        $voter->network = $request->get('network');
        $voter->save();
        return redirect()->route('voter.index')->withStatus(__('Voter successfully updated.'));
    }

    public function destroy(Voter $voter)
    {
        $voter->delete();
        return redirect()->route('voter.index')->withStatus(__('Voter successfully deleted.'));
    }

    public function verify($code)
    {
        $voter = Voter::where('verify_token', '=', $code)->first();
        $voter_private_key = $voter->private_key;
        $voter_public_key = $voter->public_key;
        if ($voter) {
            $voter->verified = true;
            $voter->save();
            $election_id = $voter->election_id;
            $election = Election::find($election_id);
            $election_date = $election->voting_date;
            $candidates = Candidate::all()->where('election_id', $election_id);
            if ($election->status == 'pending') {
                return view('pages.voting.voting_not_started',
                    [
                        'election_date' => $election_date,
                        'voter_private_key' => $voter_private_key,
                        'voter_public_key' => $voter_public_key
                    ]);
            }
            elseif ($election->status == 'running') {
                return view('pages.voting.voting_started_page',
                    [
                        'election_date' => $election_date,
                        'voter_private_key' => $voter_private_key,
                        'voter_public_key' => $voter_public_key,
                        'candidates' => $candidates
                    ]
                );
            }
            else
            {
                return view('pages.voting.voting_completed_page');
            }
        } else {
            return response()->json('Wrong token!', '404');
        }
    }
}
