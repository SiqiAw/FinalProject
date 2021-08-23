<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use Session;
use DB;
use Illuminate\Pagination\LengthAwarePaginator;

class DepartmentController extends Controller
{
    function create()
    {
        return view('adddepartment');
    }

    function store(Request $request)
    {
        $this->validate($request,[
            'department_name' => 'required',
        ]);

        $departments = new Department;

        $departments->department_name = $request->input('department_name');
        
        $departments->save();

        Session::flash('success', "Department added.");
        return redirect()->route('showDept');
    }

    function show()
    {
        $departments = Department::paginate(10);
        return view('departmentpage')->with('departments', $departments);
    }

    function edit($id)
    {
        $departments = Department::find($id);
        return view('editdepartment',compact('departments','id'));
    }

    function update()
    {
        $r=request();//retrive submited form data 
        $departments = Department::find($r->ID);

        $departments->department_name=$r->department_name;
        
        $departments->save(); //run the SQL update statment
        return redirect()->route('showDept');
    }

    function delete($id)
    {
        $departments = Department::find($id);
        $departments->delete();

        Session::flash('success', "Department deleted.");
        return redirect()->route('showDept');
    }

    function search()
    {
        $request = request();
        $keyword = $request->search;
        $departments = DB::table('departments')
        ->where('department_name', 'like', '%' . $keyword . '%')
        ->get();
        
        return view('departmentpage')->with('departments', $departments);
    }
}