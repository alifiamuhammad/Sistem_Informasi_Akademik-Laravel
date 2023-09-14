<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\User;
use App\Models\Teacher;
use App\Models\Student;
use App\Models\Enrollment;
use App\Models\Mark;
use Auth;
use Alert;
use Illuminate\Http\Request;


class TeacherController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            if (Auth::check() && Auth::user()->role !== 'teacher') {
                alert()->error('Forbidden Access For');
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
        return view('teacher.dashboard', $data);
    }

    public function enrollment() {
        $id = Auth::id();
        $teacherId = Teacher::where('user_id', $id)->first();
        $enrollment = Enrollment::where('teacher_id', $teacherId->id)->get();
        $data['enrollment'] = $enrollment;
        return view('teacher.enrollment.index', $data);
    }

    public function enrollmentDetail($id) {
        $enrollment = Enrollment::find($id);
        $data['enrollment'] = $enrollment;
        $data['students'] = Student::where('class_group_id', $enrollment->class_group_id)->get();
        return view('teacher.mark.index', $data);
    }

    public function giveMark(Request $request) 
    {
        $mark = new Mark;
        $mark->student_id = $request->student_id;
        $mark->enrollment_id = $request->enrollment_id;
        $mark->assignment_score = $request->assignment_score;
        $mark->midterm_score = $request->midterm_score;
        $mark->finalterm_score = $request->finalterm_score;
        $mark->attendance_score = $request->attendance_score;
        $mark->save();
        alert()->success('Success Giving Mark');
        return redirect()->back();
    }

    public function editMark(Request $request)
    {
        $mark = Mark::findOrFail($request->mark_id);
        $mark->assignment_score = $request->assignment_score;
        $mark->midterm_score = $request->midterm_score;
        $mark->finalterm_score = $request->finalterm_score;
        $mark->attendance_score = $request->attendance_score;
        $mark->save();
        alert()->success('Success Updating Mark');
        return redirect()->back();
    }
}
