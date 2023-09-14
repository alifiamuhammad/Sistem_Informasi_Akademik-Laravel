<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Alert;
use App\Models\Teacher;
use App\User;
use Illuminate\Http\Request;
use Illuminate\support\facades\Auth;
class TeacherController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            if (Auth::check() && Auth::user()->role !== 'admin') {
                alert()->error('Forbidden Access For');
                return redirect()->back();
            }

            return $next($request);
        });
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $perPage = 25;
        $teacher = Teacher::latest()->paginate($perPage);
        $data['teacher'] = $teacher;
        return view('admin.teacher.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.teacher.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        
        $requestData = $request->all();
        $user = new User;
        $user->name = $requestData['teacher_name'];
        $user->email = $requestData['email'];
        $user->password = bcrypt($requestData['password']);
        $user->role = $requestData['role'];
        $user->save();
        $requestData['user_id'] = $user->id;
        Teacher::create($requestData);
        alert()->success('New ' . 'Teacher'. ' Created!' );

        return redirect('admin/teacher');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $teacher = Teacher::findOrFail($id);

        return view('admin.teacher.show', compact('teacher'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $teacher = Teacher::findOrFail($id);
        $data['teacher'] = $teacher;
        return view('admin.teacher.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        
        $requestData = $request->all();
        
        $teacher = Teacher::findOrFail($id);
        $user = User::where('id', $teacher->user_id)->first();
        if($request->has('password')) {
            $user->name = $requestData['teacher_name'];
            $user->email = $requestData['email'];
            $user->password = bcrypt($requestData['password']);
            $user->save();
        } else {
            $user->name = $requestData['teacher_name'];
            $user->email = $requestData['email'];
            $user->save();
        }
        alert()->success('Record Updated!' );
        $teacher->update($requestData);

        return redirect('admin/teacher');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        alert()->success('Record Deleted!' );
        Teacher::destroy($id);

        return redirect('admin/teacher');
    }
}
