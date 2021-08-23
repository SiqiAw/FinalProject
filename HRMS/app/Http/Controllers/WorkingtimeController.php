<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Workingtime;
use Session;
use DB;
use Illuminate\Pagination\LengthAwarePaginator;

class WorkingtimeController extends Controller
{
    function create()
    {
        return view('addworkingtime');
    }

    function store(Request $request)
    {
        $this->validate($request,[
            'start' => 'required',
            'end'=> 'required',
            'duration'=> 'required',
        ]);

        $workingtimes = new Workingtime;

        $workingtimes->start = $request->input('start');
        $workingtimes->end = $request->input('end');
        $workingtimes->duration = $request->input('duration');
        
        $workingtimes->save();

        Session::flash('success', "Working Time added.");
        return redirect()->route('showWRKtime');
    }

    function show()
    {
        $workingtimes = Workingtime::paginate(10);
        return view('workingtime')->with('workingtimes', $workingtimes);
    }

    function edit($id)
    {
        $workingtimes = Workingtime::find($id);
        return view('wokingtime', compact('workingtimes','id'));
    }

    function update()
    {
        $r=request();//retrive submited form data 
        $workingtimes = Workingtime::find($r->ID);

        $workingtimes->start=$r->start;
        $workingtimes->end=$r->end;
        $workingtimes->duration=$r->duration;
        
        $workingtimes->save(); //run the SQL update statment
        return redirect()->route('showWRKtime');
    }

    function delete($id)
    {
        $workingtimes = Workingtime::find($id);
        $workingtimes->delete();

        Session::flash('success', "Working Time deleted.");
        return redirect()->route('showWRKtime');
    }

    function search()
    {
        $request = request();
        $keyword = $request->search;
        $workingtimes = DB::table('workingtimes')
        ->where('start', 'like', '%' .$keyword. '%')
        ->orWhere('end', 'like', '%' .$keyword. '%')
        ->orWhere('duration', 'like', '%' .$keyword. '%')
        ->get();

        return view('workingtime')->with('workingtimes', $workingtimes);
    }
}
