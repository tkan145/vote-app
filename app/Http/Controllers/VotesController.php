<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Vote;

class VotesController extends Controller
{
    public function getIndex(){
        $votes = Vote::orderBy('created_at','desc')->get();
        return view('dashboard.index',['votes' => $votes]);
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
