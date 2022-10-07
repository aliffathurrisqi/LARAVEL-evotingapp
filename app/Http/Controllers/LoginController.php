<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\User;
use App\Models\Vote;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    function default(){
        return redirect('/login');
    }

    function index(){
        return view('welcome',
        [
            "title" => "Login",
            "votes" => Vote::with(['users', 'candidates'])->get(),
            "candidates" => Candidate::with(['votes'])->get(),
            "users" => User::all()
        ]
    );
    }
}
