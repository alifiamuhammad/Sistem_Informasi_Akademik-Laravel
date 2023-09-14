<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\User;
use App\Models\Student;
use App\Models\Announcement;
use App\Models\ClassGroup;
use App\Models\Enrollment;
use App\Models\Mark;
use Auth;
use DB;
use Alert;
use Hash;
use Illuminate\Http\Request;


class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            if (Auth::check() && Auth::user()->role !== 'student') {
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
        $studentId = Student::where('user_id', Auth::id())->first();
        $data['announcement'] = Announcement::where('class_group_id', $studentId->class_group_id)->where('status', 'active')->get();
        
        return view('student.dashboard', $data);
    }

    public function enrollment() {
        $id = Auth::id();
        $studentId = Student::where('user_id', $id)->select('id')->first();
        $academicReport = Student::join('enrollments', 'enrollments.class_group_id', 'students.class_group_id')
                        ->leftJoin('marks', function($join) use ($studentId) {
                            $join->on('marks.student_id', 'students.id')
                                ->on('marks.enrollment_id', 'enrollments.id');
                        })
                        ->join('subjects', 'enrollments.subject_id', 'subjects.id')
                        ->where('students.id', $studentId->id)
                        ->select('subjects.*',
                        DB::raw('coalesce(marks.assignment_score, 0) as assignment_score'),
                        DB::raw('coalesce(marks.midterm_score, 0) as midterm_score'),
                        DB::raw('coalesce(marks.finalterm_score, 0) as finalterm_score'),
                        DB::raw('coalesce(marks.attendance_score, 0) as attendance_score'),
                        'enrollments.year',
                        'enrollments.semester')
                        ->get();

        $data['academicReport'] = $academicReport;
        return view('student.enrollment.index', $data);
    }

    public function report() {
        $id = Auth::id();
        $studentId = Student::where('user_id', $id)->first();
        $academicReport = Student::join('enrollments', 'enrollments.class_group_id', 'students.class_group_id')
                        ->leftJoin('marks', function($join) use ($studentId) {
                            $join->on('marks.student_id', 'students.id')
                                ->on('marks.enrollment_id', 'enrollments.id');
                        })
                        ->join('subjects', 'enrollments.subject_id', 'subjects.id')
                        ->where('students.id', $studentId->id)
                        ->select('subjects.*',
                        DB::raw('coalesce(marks.assignment_score, 0) as assignment_score'),
                        DB::raw('coalesce(marks.midterm_score, 0) as midterm_score'),
                        DB::raw('coalesce(marks.finalterm_score, 0) as finalterm_score'),
                        DB::raw('coalesce(marks.attendance_score, 0) as attendance_score'),
                        'enrollments.year',
                        'enrollments.semester')
                        ->get();

        $data['academicReport'] = $academicReport;
        $data['studentId'] = $studentId;
        $data['classgroup'] = ClassGroup::join('classes', 'class_groups.class_id', 'classes.id')->where('class_groups.id', $studentId->class_group_id)->first();
        return view('student.enrollment.report', $data);
    }

    public function getProfile() {
        return view('student.profile.index');
    }

    public function updateProfile(Request $request) {
        $user = Auth::user();

        if (!Hash::check($request->password, $user->password)) {
            alert()->error('Old password is incorrect.' );
            return redirect()->back();
        }

        $user->password = bcrypt($request->new_password);
        $user->save();
        alert()->success('Password updated successfully.' );

        return redirect()->back();

    }
}
