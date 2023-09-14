<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use App\Models\Teacher;
use App\Models\Student;
use Auth;
use Alert;
use Illuminate\Http\Request;


class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            if (Auth::check() && Auth::user()->role !== 'admin') {
                alert()->error('Acces Denied');
                return redirect()->back();
            }

            return $next($request);
        });
    }
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $data['student'] = Student::count();
        $data['teacher'] = Teacher::count();
        return view('admin.dashboard', $data);
    }


}
