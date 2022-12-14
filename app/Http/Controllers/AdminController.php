<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Vote;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index(){
        return view('admin_index',
        [
            'title'=> "Dashboard",
            "votes" => Vote::with(['users', 'candidates'])->get(),
            "candidates" => Candidate::with(['votes'])->get(),
            "users" => User::where('isAdmin',false),
        ]
        );
    }

    public function candidate(){
        return view('admin_candidate',
        [
            'title'=> "Kandidat",
            "candidates" => Candidate::all(),
        ]
        );
    }

    public function addCandidate(Request $request)
    {
        Candidate::create([
            'name' => $request->name,
            'color' => $request->color,
        ]);

        return redirect('/admin/candidate');
    }

    public function editCandidate(Request $request)
    {
        Candidate::find($request->id)->update(['name' => $request->name, 'color' => $request->color]);

        return redirect('/admin/candidate');
    }

    public function deleteCandidate(Request $request)
    {
        Candidate::find($request->id)->delete();
        Vote::where('candidate_id', $request->id)->delete();

        return redirect('/admin/candidate');
    }

    public function user(){
        return view('admin_user',
        [
            'title'=> "User",
            "usertotal" => User::where('isAdmin',false),
            "users" => User::where('isAdmin',false)->with(['votes'])->filter(request(['search']))->orderBy('username')->paginate(20),
        ]
        );
    }

    public function addUser(Request $request)
    {
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'isAdmin' => false
        ]);

        return redirect('/admin/user');
    }

}
