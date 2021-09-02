<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\State;
use Session;
use DB;
use Illuminate\Pagination\LengthAwarePaginator;

class StateController extends Controller
{
    function create()
    {
        return view('addstate');
    }

    function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
        ]);

        $states = new State;

        $states->name = $request->input('name');
        
        $states->save();

        Session::flash('success', "State successfully added.");
        return redirect()->route('showState');
    }

    function show()
    {
        $states = State::paginate(10);
        return view('statepage')->with('states', $states);
    }

    function edit($id)
    {
        $states = State::find($id);
        return view('editstate', compact('states','id'));
    }

    function update()
    {
        $r=request();//retrive submited form data 
        $states = State::find($r->ID);

        $states->name=$r->name;
        
        $states->save(); //run the SQL update statment
        return redirect()->route('showState');
    }

    function delete($id)
    {
        $states = State::find($id);
        $states->delete();

        Session::flash('success', "State successfully deleted.");
        return redirect()->route('showState');
    }

    function search()
    {
        $request = request();
        $keyword = $request->search;
        $states = DB::table('states')
        ->where('name', 'like', '%' .$keyword. '%')
        ->get();

        return view('statepage')->with('states', $states);
    }
}
