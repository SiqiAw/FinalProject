<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use Session;
use DB;

class CountryController extends Controller
{
    function create()
    {
        return view('addcountry');
    }

    function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
        ]);

        $countrynames = new Country;

        $countrynames->name = $request->input('name');
        
        $countrynames->save();

        Session::flash('success', "Country added.");
        return redirect()->route('showCountry');
    }

    function show()
    {
        $countrynames = Country::all();
        return view('countrypage')->with('countrynames', $countrynames);
    }

    function edit($id)
    {
        $countrynames = Country::find($id);
        return view('editcountry', compact('countrynames','id'));
    }

    function update()
    {
        $r=request();//retrive submited form data 
        $countrynames = Country::find($r->ID);

        $countrynames->name=$r->name;
        
        $countrynames->save(); //run the SQL update statment
        return redirect()->route('showCountry');
    }

    function delete($id)
    {
        $countrynames = Country::find($id);
        $countrynames->delete();

        Session::flash('success', 'Counrty deleted.');
        return redirect()->route('showCountry');
    }

    function search()
    {
        $request = request();
        $keyword = $request->search;
        $countrynames = DB::table('countrynames')
        ->where('name', 'like', '%' .$keyword. '%')
        ->get();

        return view('countrypage')->with('countrynames', $countrynames);
    }
}
