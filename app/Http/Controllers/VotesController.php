<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

    public function postCreate(){
       
    }
}
