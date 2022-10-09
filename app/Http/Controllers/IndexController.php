<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Candidate;
use App\Models\User;
use App\Models\Vote;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class IndexController extends Controller
{
    function index(){
        return view('index',
        [
            "title" => "Home",
            "votes" => Vote::with(['users', 'candidates'])->get(),
            "candidates" => Candidate::with(['votes'])->get(),
            "users" => User::all(),
            "checks" => Vote::where('user_id', md5(auth()->user()->id))
        ]
    );
    }

    function show(){
        return view('showvote',
        [
            "title" => "Perolehan",
            "votes" => Vote::with(['users', 'candidates'])->get(),
            "candidates" => Candidate::with(['votes'])->get(),
            "users" => User::where('isAdmin',false),
        ]
    );
    }

    public function vote(Request $request)
    {
        Vote::create([
            'candidate_id' => $request->candidate_id,
            'user_id' => md5($request->user_id),
        ]);

        return redirect('/votes');
    }
}
