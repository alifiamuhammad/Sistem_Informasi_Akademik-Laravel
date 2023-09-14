<?php

namespace App\Http\Controllers\Auth;

use Alert;
use Auth;
use App\User;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function loginpage() {
        return view('auth.login');
    }

    public function loginUser(Request $req)
    {
        $req->validate([
            'email' => 'required',
            'password' => 'required',
            
        ]);   
        $email = $req->get('email');
        $credentials = $req->only('email', 'password');
        $user = User::where('email', $email)->first();
        if (auth()->guard('web')->attempt($credentials) && $user->role == 'admin') {
            session(["email" => $email]);
            session(["role" => $user->role]);
            alert()->success('Login Success');
            return redirect('/admin');
        } 
        else if (auth()->guard('web')->attempt($credentials) && $user->role == 'teacher') {
            session(["email" => $email]);
            session(["role" => $user->role]);
            alert()->success('Login Success');
            return redirect('/teacher');

        } else if (auth()->guard('web')->attempt($credentials) && $user->role == 'student') {
            session(["email" => $email]);
            session(["role" => $user->role]);
            alert()->success('Login Success');
            return redirect('/student');

        } else {
            alert()->error('Email atau ' . 'Password'. ' Salah!' );
            return redirect('/auth-user');
        }
    }

    public function logoutUser() {
        session()->flush();
        Auth::logout();
        return redirect('/auth-user');
    }

}
