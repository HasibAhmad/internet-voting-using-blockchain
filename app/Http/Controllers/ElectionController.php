<?php

namespace App\Http\Controllers;

use App\Election;
use Illuminate\Http\Request;

class ElectionController extends Controller
{
    public function index()
    {
        $elections = Election::all();
        return view('pages.elections.elections_list', compact('elections'));
    }

    public function create()
    {
        return view('pages.elections.election_create');
    }

    public function store(Request $request, Election $election)
    {
        $election->create($request->all());
        return redirect()->route('election.index')->withStatus(__('Election successfully created.'));
    }

    public function edit(Election $election)
    {
        return view('pages.elections.election_edit', compact('election'));
    }

    public function update(Request $request, Election $election)
    {
        $election->name = $request->get('name');;
        $election->status = $request->get('status');;
        $election->description = $request->get('description');;
        $election->voting_date = $request->get('voting_date');
        $election->save();
        return redirect()->route('election.index')->withStatus(__('Election successfully updated.'));
    }

    public function destroy(Election $election)
    {
        $election->delete();
        return redirect()->route('election.index')->withStatus(__('Election successfully deleted.'));
    }

    public function startElection(Election $election)
    {
        if ($election->status == "pending" || $election->status == "completed") {
            $election->status = 'running';
            $election->update();
        } elseif ($election->status == "running") {
            $election->status = 'completed';
            $election->update();
        }
        return redirect()->route('election.index')->withStatus(__('Election updated successfully.'));
    }
}
