<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Alert;
use App\Models\Mark;
use App\Models\Student;
use App\Models\Enrollment;
use Illuminate\Http\Request;
use Illuminate\support\facades\Auth;
class MarkController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
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
        $data['enrollment'] = $enrollment;
        
        return view('admin.mark.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function gradetDetail($id) {
        $enrollment = Enrollment::find($id);
        $data['enrollment'] = $enrollment;
        $data['students'] = Student::where('class_group_id', $enrollment->class_group_id)->get();
        return view('teacher.mark.index', $data);
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
        
        Mark::create($requestData);
        alert()->success('New ' . 'Mark'. ' Created!' );

        return redirect('admin/mark');
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
        $mark = Mark::findOrFail($id);

        return view('admin.mark.show', compact('mark'));
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
        $mark = Mark::findOrFail($id);
        $data['mark'] = $mark;
        return view('admin.mark.edit', $data);
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
        
        $mark = Mark::findOrFail($id);
        alert()->success('Record Updated!' );
        $mark->update($requestData);

        return redirect('admin/mark');
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
        Mark::destroy($id);

        return redirect('admin/mark');
    }
}
