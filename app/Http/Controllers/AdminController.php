<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Vote;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return view('admin_index',
        [
            'title'=> "Dashboard",
            "votes" => Vote::with(['users', 'candidates'])->get(),
            "candidates" => Candidate::with(['votes'])->get(),
            "users" => User::all(),
        ]
        );
    }
}
