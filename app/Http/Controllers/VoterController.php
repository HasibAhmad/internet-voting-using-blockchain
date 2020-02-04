<?php

namespace App\Http\Controllers;

use App\Mail\sendVoterConfirmation;
use App\Voter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class VoterController extends Controller
{
    public function index(Voter $model)
    {
        $voters = Voter::all();
        return view('pages.voters_list', compact('voters'));
    }

    public function create()
    {
        return view('pages.voter_create');
    }


    public function store(Request $request, Voter $voter)
    {
        $voter->name = $request->name;
        $voter->email = $request->email;
//        $voter->private_key = $request->private_key;
        $voter->private_key = 'default';
        $voter->public_key = $request->get('public_key');
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
        return view('pages.voter_edit', compact('voter'));
    }

    public function update(Request $request, Voter $voter)
    {
        $voter->name = $request->get('name');
        $voter->email = $request->get('email');
//        $voter->private_key = $request->get('private_key');
        $voter->private_key = 'default';
        $voter->public_key = $request->get('public_key');
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
            return view('pages.voting_page');
        } else {
            return response()->json('Wrong token!', '404');
        }
    }
}
