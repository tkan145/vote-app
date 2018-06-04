<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Vote;

class VotesController extends Controller
{
    public function getIndex(){
        // Only get what belong to current user
        $votes = Vote::where('user_id',Auth::user()->id)->orderBy('created_at','desc')->paginate(10);
        return view('dashboard.index',['votes' => $votes]);
    }

    public function getVoteByID($id){
        $vote = Vote::find($id);
        return view('votes.details',['vote' => $vote, 'voteId' => $id]);
        
    }

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
}
