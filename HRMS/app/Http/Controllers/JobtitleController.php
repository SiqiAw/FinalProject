<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jobtitle;
use App\Models\Department;
use App\Models\Position;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class JobtitleController extends Controller
{
    function create()
    {
        return view('admin.settings.addjobtitle')
        ->with('departments', Department::all())
        ->with('positions', Position::all());
    }

    function store(Request $request)
    {
        $addDepartment = Jobtitle::create([    //step 3 bind data
            'id'=>$request->ID, //add on 
            'jobtitle_name'=>$request->position, //fullname from HTML
            'department_id'=>$request->department,
            'rate_per_hour'=>$request->rate_per_hour,
            
        ]);
        
        Session::flash('success', "Job Title added.");
        return redirect()->route('showJobtitle');
    }

    function show()
    {
        $jobtitles = Jobtitle::all();
        return view('admin.settings.jobtitle')->with('jobtitles', $jobtitles)
                                     ->with('departments', Department::all())
                                     ->with('positions', Position::all());
    }

    function edit($id)
    {
        $jobtitles = Jobtitle::all()->where('id',$id);

        return view('admin.settings.jobtitle')->with('jobtitles',$jobtitles)
                                     ->with('departments', Department::all())
                                     ->with('positions', Position::all());

    }

    function update()
    {
        $r=request();//retrive submited form data 
        $jobtitles = Jobtitle::find($r->ID);

        $jobtitles->jobtitle_name=$r->position;
        $jobtitles->department_id=$r->department;
        $jobtitles->rate_per_hour=$r->rate_per_hour;
        
        $jobtitles->save();
        return redirect()->route('showJobtitle');
    }

    function delete($id)
    {
        $jobtitles = Jobtitle::find($id);
        $jobtitles->delete();

        Session::flash('success', "Job title deleted.");
        return redirect()->route('showJobtitle');
    }
}
