<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Alert;
use File;
use App\Models\Announcement;
use App\Models\ClassGroup;
use Illuminate\Http\Request;
use Illuminate\support\facades\Auth;
class AnnouncementController extends Controller
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
        $announcement = Announcement::latest()->paginate($perPage);
        $classgroup = ClassGroup::join('classes', 'class_groups.class_id', 'classes.id')->pluck('classes.name', 'class_groups.id');
        $data['classgroup'] = $classgroup;
        $data['announcement'] = $announcement;
        return view('admin.announcement.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.announcement.create');
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
        if ($request->hasFile('attachment')) {
            $attachment = $request->file('attachment');
            $image_name = $request->file('attachment')->getClientOriginalName();
            $attachment->move('uploads/attachment', $image_name);
            $requestData['attachment'] = $image_name;
        }
        
        Announcement::create($requestData);
        alert()->success('New ' . 'Announcement'. ' Created!' );

        return redirect('admin/announcement');
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
        $announcement = Announcement::findOrFail($id);

        return view('admin.announcement.show', compact('announcement'));
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
        $announcement = Announcement::findOrFail($id);
        $classgroup = ClassGroup::join('classes', 'class_groups.class_id', 'classes.id')->pluck('classes.name', 'class_groups.id');
        $data['classgroup'] = $classgroup;
        $data['announcement'] = $announcement;
        return view('admin.announcement.edit', $data);
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
        
        $announcement = Announcement::findOrFail($id);
        if ($request->hasFile('attachment')) {
            File::delete('uploads/attachment', $announcement->attachment);
            $attachment = $request->file('attachment');
            $image_name = $request->file('attachment')->getClientOriginalName();
            $attachment->move('uploads/attachment', $image_name);
            $requestData['attachment'] = $image_name;
        }
        alert()->success('Record Updated!' );
        $announcement->update($requestData);

        return redirect('admin/announcement');
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
        Announcement::destroy($id);

        return redirect('admin/announcement');
    }
}
