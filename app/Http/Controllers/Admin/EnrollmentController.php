<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Alert;
use App\Models\Enrollment;
use App\Models\Teacher;
use App\Models\Subject;
use App\Models\ClassGroup;
use Illuminate\Http\Request;
use Illuminate\support\facades\Auth;
class EnrollmentController extends Controller
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
        $enrollment = Enrollment::latest()->paginate($perPage);
        $classgroup = ClassGroup::join('classes', 'class_groups.class_id', 'classes.id')->pluck('classes.name', 'class_groups.id');
        $teacher = Teacher::pluck('teacher_name', 'id');
        $subject = Subject::pluck('subject_name', 'id');
        $data['classgroup'] = $classgroup;
        $data['teacher'] = $teacher;
        $data['subject'] = $subject;
        $data['enrollment'] = $enrollment;
        return view('admin.enrollment.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.enrollment.create');
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
        
        Enrollment::create($requestData);
        alert()->success('New ' . 'Enrollment'. ' Created!' );

        return redirect('admin/enrollment');
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
        $enrollment = Enrollment::findOrFail($id);

        return view('admin.enrollment.show', compact('enrollment'));
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
        $enrollment = Enrollment::findOrFail($id);
        $classgroup = ClassGroup::join('classes', 'class_groups.class_id', 'classes.id')->pluck('classes.name', 'class_groups.id');
        $teacher = Teacher::pluck('teacher_name', 'id');
        $subject = Subject::pluck('subject_name', 'id');
        $data['classgroup'] = $classgroup;
        $data['teacher'] = $teacher;
        $data['subject'] = $subject;
        $data['enrollment'] = $enrollment;
        return view('admin.enrollment.edit', $data);
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
        
        $enrollment = Enrollment::findOrFail($id);
        alert()->success('Record Updated!' );
        $enrollment->update($requestData);

        return redirect('admin/enrollment');
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
        Enrollment::destroy($id);

        return redirect('admin/enrollment');
    }
}
