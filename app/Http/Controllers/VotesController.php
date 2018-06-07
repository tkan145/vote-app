<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Vote;

class VotesController extends Controller
{

    // Get all votes
    public function getIndex(){
        // Only get what belong to current user
        $votes = Vote::where('user_id',Auth::user()->id)->orderBy('created_at','desc')->paginate(10);
        return view('dashboard.index',['votes' => $votes]);
    }

    // Get details vote by ID
    public function getVoteByID($id){
        $vote = Vote::find($id);
        return view('votes.details',['vote' => $vote, 'voteId' => $id]);
    }

    // Return create new vote form
    public function getCreate(){
        return view('votes.create');
    }

    public function postCreate(Request $request){
       $this->validate($request,[
           'title'      => 'required'
       ]);

       $user = Auth::user();
        if(!$user){
            return redirect()->back();
        }

        $vote = new Vote([
            'title'         => $request->input('title'),
            'user_id'       => $user->id,
            'vote_id'       => strtoupper(str_random(10)),
            'description'   => "",
            'status'        => 'Open',
        ]);

        $vote->save();

        return redirect()->route('dashboard.index')->with("info", "A vote with ID: #$vote->vote_id has been created");
    }

    // Get edit from
    public function getEdit($id){
        // $vote = Vote::find($id);
        //return view('votes.edit',['vote' => $vote,'voteId' => $id]);
        return view('votes.create');
    }

    public function postUpdate(Request $request){
        $this->validate($request,[
            'title' => 'required|min:5',
          ]);
        $vote = Vote::find($request->input('id'));
        $vote->title = $request->input('title');
        $vote->description = $request->input('description');
        $vote->save();
        return redirect()->route('dashboard.index')->with('info','Vote edited, Title is:' . $request->input('title'));
    }

    // View public vote and complete the vote

    // View submited answer

    // Delete survey
    public function getDelete($id){
        $vote = Vote::find($id);
        $vote->delete();
        return redirect()->route('dashboard.index')->with('info','Vote ' . $vote->title .' has been deleted' );
    }
}
