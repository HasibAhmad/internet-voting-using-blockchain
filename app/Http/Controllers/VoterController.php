<?php

namespace App\Http\Controllers;

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
        return view('pages.voters.voter_create');
    }


    public function store(Request $request, Voter $voter)
    {
        $voter->name = $request->name;
        $voter->email = $request->email;
        $voter->election_id = $request->election_id;

        $rsa = new RSA();
        $rsa->setPrivateKeyFormat(RSA::PRIVATE_FORMAT_PKCS1);
        $rsa->setPublicKeyFormat(RSA::PUBLIC_FORMAT_PKCS1);
        $rsa->setHash('sha256');
        $rsa->setComment('ivub');
        $key_pair = $rsa->createKey(1024);
//        $fingerprint = $rsa->loadKey($privateKey);
//        $keyFingerprint = $rsa->getPublicKeyFingerprint();
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
//        $voter->private_key = $request->get('private_key');
//        $voter->private_key = 'default';
//        $voter->public_key = $request->get('public_key');
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
        if ($voter) {
            $voter->verified = true;
            $voter->save();
            $election = Election::find(2);
            if ($election->status == 'pending') {
                return view('pages.voting_not_started');
            }
            elseif ($election->status == 'running') {
                return view('pages.voting_started_page');
            }
            else
            {
                return view('pages.voting_completed_page');
            }
        } else {
            return response()->json('Wrong token!', '404');
        }
    }
}
