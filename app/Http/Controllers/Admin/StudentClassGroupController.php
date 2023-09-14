<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Alert;
use App\Models\StudentClassGroup;
use Illuminate\Http\Request;

class StudentClassGroupController extends Controller
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
        $studentclassgroup = StudentClassGroup::latest()->paginate($perPage);
        $data['studentclassgroup'] = $studentclassgroup;
        return view('admin.student-class-group.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.student-class-group.create');
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
        
        StudentClassGroup::create($requestData);
        alert()->success('New ' . 'StudentClassGroup'. ' Created!' );

        return redirect('admin/student-class-group');
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
        $studentclassgroup = StudentClassGroup::findOrFail($id);

        return view('admin.student-class-group.show', compact('studentclassgroup'));
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
        $studentclassgroup = StudentClassGroup::findOrFail($id);
        $data['studentclassgroup'] = $studentclassgroup;
        return view('admin.student-class-group.edit', $data);
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
        
        $studentclassgroup = StudentClassGroup::findOrFail($id);
        alert()->success('Record Updated!' );
        $studentclassgroup->update($requestData);

        return redirect('admin/student-class-group');
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
        StudentClassGroup::destroy($id);

        return redirect('admin/student-class-group');
    }
}
