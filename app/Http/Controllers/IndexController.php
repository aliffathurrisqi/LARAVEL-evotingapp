<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Candidate;
use App\Models\User;
use App\Models\Vote;

class IndexController extends Controller
{
    function index(){
        return view('index',
        [
            "title" => "Home",
            "votes" => Vote::with(['users', 'candidates'])->get(),
            "candidates" => Candidate::with(['votes'])->get(),
            "users" => User::all()
        ]
    );
    }
}
