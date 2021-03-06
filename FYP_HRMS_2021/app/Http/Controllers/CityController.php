<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class CityController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
   }

    //
    function create()
    {
        return view('admin.system-settings.addcity');
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
        $cities = City::all();
        return view('admin.system-settings.citypage')->with('cities', $cities);
    }

    function edit($id)
    {
        $cities = City::find($id);
        return view('admin.system-settings.editcity',compact('cities','id'));
    }

    function update()
    {
        $r=request(); 
        $cities = City::find($r->ID);

        $cities->name=$r->name;
        
        $cities->save();
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
        ->get();
        
        return view('admin.system-settings.citypage')->with('cities', $cities);
    }
}
