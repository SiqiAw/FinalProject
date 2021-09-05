<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use Session;
use DB;
use Illuminate\Pagination\LengthAwarePaginator;

class CityController extends Controller
{
    //
    function create()
    {
        return view('addcity');
    }

    function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
        ]);

        $addcity = City::create([
            'name' => $request->name
        ]);

        Session::flash('success', "City added.");
        return redirect()->route('showCity');
    }

    function show()
    {
        $cities = City::paginate(10);
        return view('citypage')->with('cities', $cities);
    }

    function edit($id)
    {
        $cities = City::find($id);
        return view('editcity',compact('cities','id'));
    }

    function update()
    {
        $r=request();//retrive submited form data 
        $cities = City::find($r->ID);

        $cities->name=$r->name;
        
        $cities->save(); //run the SQL update statment
        return redirect()->route('showCity');
    }

    function delete($id)
    {
        $cities = City::find($id);
        $cities->delete();

        Session::flash('success', "City deleted.");
        return redirect()->route('showCity');
    }

    function search()
    {
        $request = request();
        $keyword = $request->search;
        $cities = DB::table('cities')
        ->where('name', 'like', '%' . $keyword . '%')
        ->paginate(10);
        
        return view('citypage')->with('cities', $cities);
    }
}
