<?php

namespace App\Http\Controllers;

use App\Voter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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


    public function store(Request $request, Voter $model)
    {
        $model->create($request->all());
        return redirect()->route('voter.index')->withStatus(__('Voter successfully created.'));
    }

    public function edit(Voter $voter)
    {
        return view('pages.voter_edit', compact('voter'));
    }

    public function update(Request $request, Voter $voter)
    {
        $voter->name = $request->get('name');;
        $voter->email = $request->get('email');;
        $voter->private_key = $request->get('private_key');;
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
}
