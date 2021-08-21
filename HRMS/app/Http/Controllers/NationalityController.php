<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nationality;
use Session;
use DB;

class NationalityController extends Controller
{
    function create()
    {
        return view('addnationality');
    }

    function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
        ]);

        $nationalitys = new Nationality;

        $nationalitys->name = $request->input('name');
        
        $nationalitys->save();

        Session::flash('success', "Nationality added.");
        return redirect()->route('showNationality');
    }

    function show()
    {
        $nationalitys = Nationality::all();
        return view('nationalitypage')->with('nationalitys', $nationalitys);
    }

    function edit($id)
    {
        $nationalitys = Nationality::find($id);
        return view('editnationality', compact('nationalitys','id'));
    }

    function update()
    {
        $r=request();//retrive submited form data 
        $nationalitys = Nationality::find($r->ID);

        $nationalitys->name=$r->name;
        
        $nationalitys->save(); //run the SQL update statment
        return redirect()->route('showNationality');
    }

    function delete($id)
    {
        $nationalitys = Nationality::find($id);
        $nationalitys->delete();

        Session::flash('success', "Nationality deleted.");
        return redirect()->route('showNationality');
    }

    function search()
    {
        $request = request();
        $keyword = $request->search;
        $nationalitys = DB::table('nationalitys')
        ->where('name', 'like', '%' .$keyword. '%')
        ->get();

        return view('nationalitypage')->with('nationalitys', $nationalitys);
    }
}
