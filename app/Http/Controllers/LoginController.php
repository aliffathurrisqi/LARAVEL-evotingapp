<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\User;
use App\Models\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    function default(){
        return redirect('/login');
    }

    function index(){
        return view('login',
    [
        'title' => "Login"
    ]);
    }

    public function authenticate(Request $request)
    {

        $credentials = $request->validate([
            'username' => "required",
            'password' => "required",
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if (auth()->user()->isAdmin == true) {
                return redirect()->intended('/admin');
            } else {
                return redirect()->intended('/home');
            }
        }

        return back()->with('error', true);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
