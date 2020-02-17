<?php

namespace App\Http\Controllers;

use App\Candidate;
use Illuminate\Http\Request;

class CandidateController extends Controller
{
    public function index(Candidate $model)
    {
        $candidates = Candidate::all();
        return view('pages.candidates.candidates_list', compact('candidates'));
    }

    public function create()
    {
        return view('pages.candidates.candidate_create');
    }


    public function store(Request $request, Candidate $candidate)
    {
//        $candidate->create($request->all());
        $candidate->name = $request->name;
        $candidate->email = $request->email;
        $candidate->description = $request->description;
        $candidate->election_id = $request->election_id;
        if (isset($request->photo)) {
            $photo = $request->photo;
            $name = $photo->getClientOriginalName();
            $filename = $photo->store('uploads', 'public');
        }
        $candidate->photo = $filename;
        $candidate->save();
        return redirect()->route('candidate.index')->withStatus(__('Candidate successfully created.'));
    }

    public function edit(Candidate $candidate)
    {
        return view('pages.candidates.candidate_edit', compact('candidate'));
    }

    public function update(Request $request, Candidate $candidate)
    {
        $candidate->name = $request->get('name');;
        $candidate->email = $request->get('email');;
        $candidate->description = $request->get('description');
        if (isset($request->photo)) {
            $photo = $request->photo;
            $name = $photo->getClientOriginalName();
            $filename = $photo->store('uploads', 'public');
        }
        $candidate->photo = $filename;
        $candidate->update();
        return redirect()->route('candidate.index')->withStatus(__('Candidate successfully updated.'));
    }

    public function destroy(Candidate $candidate)
    {
        $candidate->delete();

        return redirect()->route('candidate.index')->withStatus(__('Candidate successfully deleted.'));
    }
}
