<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Vote;
use App\Option;
use Webpatser\Uuid\Uuid;
use DB;

class VotesController extends Controller
{

    // Get all votes
    public function getIndex(){
        // Only get what belong to current user
        $votes = Vote::where('user_id','=',Auth::user()->id)->where('status','!=','Archive')->orderBy('created_at','desc')->paginate(10);
        return view('dashboard.index',['votes' => $votes]);
    }

    public function getIndexArchive(){
      $votes = Vote::where('user_id','=',Auth::user()->id)->where('status','=','Archive')->orderBy('created_at','desc')->paginate(10);
      return view('dashboard.index',['votes' => $votes]);
    }

    // Get single vote by ID
    public function getVoteByID($uuid){
        $vote = Vote::where('uuid','=',$uuid)->limit(1)->get();
        $vote = count($vote) === 1 ? $vote[0] : null;

        // Get total answer here

        // Push to d3 to draw a graph.
        return view('votes.details',['vote' => $vote]);
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

        $vote = new Vote;
        $vote->title    = $request->input('title');
        $vote->user_id  = $user->id;
        $vote->uuid     = Uuid::generate(4);
        $vote->status   = 'Private';

        // Add option to the vote
        $description = $request->input('description') ? $request->input('description') : null;
        if($description != null)
          $vote->description = $request->input('description');

        $vote->save();
        $options = $request->options;
        Option::saveOptions($vote->id,$options);
        //Vote->createVoteOptions($vote,$options);

        return redirect()->route('dashboard.index')->with("info", "A vote with ID: #$vote->vote_id has been created");
    }

    // Get edit from
    public function getEdit($uuid){
        $vote = Vote::where('user_id','=',Auth::user()->id)->where('uuid','=',$uuid)->limit(1)->get();
        $vote = count($vote) === 1 ? $vote[0] : null;
        if(!$vote):
          return redirect()->route('dashboard.index')->with("info", "A vote with ID: #$vote->vote_uuid not found.");
        endif;
        return view('votes.edit',['vote' => $vote,'vote_uuid' => $uuid]);
    }

    public function postUpdate(Request $request){
        $this->validate($request,[
            'title' => 'required|min:5',
          ]);
          $vote = Vote::where('user_id','=',Auth::user()->id)->where('uuid','=',$request->input('uuid'))->limit(1)->get();
          $vote = count($vote) === 1 ? $vote[0] : null;
          if(!$vote):
            echo null;
            return redirect()->route('dashboard.index')->with("info", "A vote with ID: #$vote->vote_uuid not found.");
          endif;
        $vote->title = $request->input('title');
        $vote->description = $request->input('description');
        $vote->status = $request->input('status');
        $vote->save();

        // Update option

        // Redirect
        return redirect()->route('dashboard.index')->with('info','Vote edited, Title is:' . $request->input('title'));
    }

    // View public vote and complete the vote

    // View submited answer

    // Delete survey
    public function getDelete($uuid){
        $vote = Vote::where([
          'user_id' => Auth::user()->id,
          'uuid'      => $uuid
        ])->limit(1)->get();
        $vote = count($vote) === 1 ? $vote[0] : null;
        if(!$vote):
          return redirect()->route('dashboard.index')->with("info", "A vote with ID: #$vote->vote_uuid not found.");
        endif;
        $vote->delete();
        return redirect()->route('dashboard.index')->with('info','Vote ' . $vote->title .' has been deleted' );
    }

    public function getPublicVote(){
      $available_votes = DB::table('votes')->select('votes.*','users.name as author_name')->join('users','users.id','=','votes.user_id')->where('votes.status','=','Public')->get();
      return view('home',['available_votes' => $available_votes]);
    }
}
