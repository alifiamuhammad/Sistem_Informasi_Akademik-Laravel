<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Alert;
use App\Models\ClassGroup;
use App\Models\Classing;
use Illuminate\Http\Request;
use Illuminate\support\facades\Auth;
class ClassGroupController extends Controller
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
        $classgroup = ClassGroup::latest()->paginate($perPage);
        $class = Classing::pluck('name', 'id');
        $data['class'] = $class;
        $data['classgroup'] = $classgroup;
        return view('admin.class-group.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.class-group.create');
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
        
        ClassGroup::create($requestData);
        alert()->success('New ' . 'ClassGroup'. ' Created!' );

        return redirect('admin/class-group');
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
        $classgroup = ClassGroup::findOrFail($id);

        return view('admin.class-group.show', compact('classgroup'));
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
        $classgroup = ClassGroup::findOrFail($id);
        $class = Classing::pluck('name', 'id');
        $data['class'] = $class;
        $data['classgroup'] = $classgroup;
        return view('admin.class-group.edit', $data);
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
        
        $classgroup = ClassGroup::findOrFail($id);
        alert()->success('Record Updated!' );
        $classgroup->update($requestData);

        return redirect('admin/class-group');
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
        ClassGroup::destroy($id);

        return redirect('admin/class-group');
    }
}
