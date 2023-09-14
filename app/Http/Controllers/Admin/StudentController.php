<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Alert;
use App\User;
use App\Models\ClassGroup;
use App\Models\Classing;
use App\Models\Student;
use App\Models\StudentClassGroup;
use Illuminate\Http\Request;
use Illuminate\support\facades\Auth;
class StudentController extends Controller
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
        $student = Student::latest()->paginate($perPage);
        $classgroup = ClassGroup::join('classes', 'class_groups.class_id', 'classes.id')->pluck('classes.name', 'class_groups.id');
        $data['classgroup'] = $classgroup;
        $data['student'] = $student;
        return view('admin.student.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.student.create');
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
        $existingid = Student::where('student_id', $request->student_id)->first();
        if($existingid) {
            alert()->error('NIS has already Registered' );

            return redirect()->back();
        }
        $existingEmail = User::where('email', $request->email)->first();
        if($existingEmail) {
            alert()->error('Email Already Exist' );

            return redirect()->back();
        }
        $user = new User;
        $user->name = $requestData['student_name'];
        $user->email = $requestData['email'];
        $user->password = bcrypt($requestData['password']);
        $user->role = 'student';
        $user->save();

        
        $requestData['user_id'] = $user->id;
        Student::create($requestData);

        $student = Student::where('user_id', $user->id)->first();

        $studentClassGroup = new StudentClassGroup;
        $studentClassGroup->student_id = $student->id;
        $studentClassGroup->class_group_id = $requestData['class_group_id'];
        $studentClassGroup->save();

        alert()->success('New ' . 'Student'. ' Created!' );

        return redirect('admin/student');
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
        $student = Student::findOrFail($id);

        return view('admin.student.show', compact('student'));
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
        $student = Student::findOrFail($id);
        $classgroup = ClassGroup::join('classes', 'class_groups.class_id', 'classes.id')->pluck('classes.name', 'class_groups.id');
        $data['classgroup'] = $classgroup;
        $data['student'] = $student;
        return view('admin.student.edit', $data);
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
        
        $student = Student::findOrFail($id);
        $user = User::where('id', $student->user_id)->first();
        if($request->has('password')) {
            $user->name = $requestData['student_name'];
            $user->email = $requestData['email'];
            $user->password = bcrypt($requestData['password']);
            $user->save();
        } else {
            $user->name = $requestData['student_name'];
            $user->email = $requestData['email'];
            $user->save();
        }
        alert()->success('Record Updated!' );
        $student->update($requestData);

        return redirect('admin/student');
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
        $student = Student::find($id);
       User::where("id", $student->user_id)->delete();
       Student::destroy($id);
       
    
        return redirect('admin/student');
    }
}