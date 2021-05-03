<?php

namespace App\Http\Controllers;

use Gate;
use Illuminate\Support\Facades\Auth;
use App\Models\Adoptions;
use Illuminate\Http\Request;

class AdoptionsController extends Controller
{
    // retrieve all pending adoption requests and display for staff only.
    public function requests()
    {
        $adoptions = Adoptions::all();
        if (Gate::denies('publicview') == false) {
            return view('animals.pending_adoptions', compact('adoptions'));
        } else {
            return view('animals.access');
        }
    }

    // retrieve user's previous adoption requests and display the "My requests" page for a user.
    public function requests_history()
    {
        $adoptions = Adoptions::all();
        if (Gate::denies('publicview') == true) {
            return view('animals.adoptions_history', compact('adoptions'));
        }
    }

    // retrieve every adoption request made and display "Previous requests" page for staff.
    public function all_adoptions()
    {
        $adoptions = Adoptions::all();
        if (Gate::denies('publicview') == false) {
            return view('animals.staff_all_requests', compact('adoptions'));
        } else {
            return view('animals.access');
        }
    }

    // retrieves adoption requests and handles displaying adopted animals' owners.
    public function adopter()
    {
        $adoptions = Adoptions::all();
        if (Gate::denies('publicview') == false) {
            return view('animals.owners', compact('adoptions'));
        } else {
            return view('animals.access');
        }
    }

    // accept button to handle accepting a request.
    public function approve(Request $request)
    {
        $rowid = Adoptions::select('id')
            ->where('animalID', $request->animalID)
            ->where('userID', $request->userID)
            ->get()->first()['id'];

        $req = Adoptions::find($rowid);
        $req->status = 'Approved';
        $req->save();

        // call auto deny method to automatically deny other requests of the same animal.
        $this->auto_deny($req, $request);

        $rowid = \App\Models\Animal::select('id')
            ->where('id', $request->animalID)
            ->get()->first()['id'];

        // save the availability of the animal to unavailable if a request is accepted.
        $req =  \App\Models\Animal::find($rowid);
        $req->availability = 'Unavailable';
        $req->save();

        return back();
    }


    // deny button to handle denying a request.
    public function deny(Request $request)
    {
        $rowid = Adoptions::select('id')
            ->where('animalID', $request->animalID)
            ->where('userID', $request->userID)
            ->get()->first()['id'];

        // save status of request to denied.
        $req = Adoptions::find($rowid);
        $req->status = 'Denied';
        $req->save();
        return back();
    }


    // Automatically denies following requests for the same animal if one request is accepted.
    public function auto_deny($req, $request)
    {
        // return all requests with animalID.
        $rowid = Adoptions::where('animalID', $request->animalID)->get();

        foreach ($rowid as $row) {

            // if the row is not equal to the requested id, set status to denied.
            if ($row->id != $req->id) {
                $row->status = 'Denied';
                $row->save();
            }
        }
    }

    // store requests in database.
    public function store(Request $request)
    {

        // prevent user from requesting the same animal multiple times.
        $id = Auth::id();
        if (Adoptions::select('id')->where('animalID', $request->animalID)->where('userID', $id)->exists()) {

            return back()->with('error', 'You have already requested to adopt this animal.');;
        } else {

            // create adoption request object and set its value from the input.
            $adoption = new Adoptions();
            $adoption->animalID = $request->input('animalID');
            $adoption->userID = $id;
            $adoption->status = 'Pending';


            // save the adoption object.
            $adoption->save();


            return back()->with('success', 'Your adoption request is pending.');;
        }
    }
}
