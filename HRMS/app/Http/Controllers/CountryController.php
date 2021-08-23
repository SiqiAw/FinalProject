<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use Session;
use DB;
use Illuminate\Pagination\LengthAwarePaginator;

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

        $countries = new Country;

        $countries->name = $request->input('name');
        
        $countries->save();

        Session::flash('success', "Country added.");
        return redirect()->route('showCountry');
    }

    function show()
    {
        $countries = Country::paginate(10);
        return view('countrypage')->with('countries', $countries);
    }

    function edit($id)
    {
        $countries = Country::find($id);
        return view('editcountry', compact('countries','id'));
    }

    function update()
    {
        $r=request();//retrive submited form data 
        $countries = Country::find($r->ID);

        $countries->name=$r->name;
        
        $countries->save(); //run the SQL update statment
        return redirect()->route('showCountry');
    }

    function delete($id)
    {
        $countries = Country::find($id);
        $countries->delete();

        Session::flash('success', 'Counrty deleted.');
        return redirect()->route('showCountry');
    }

    function search()
    {
        $request = request();
        $keyword = $request->search;
        $countries = DB::table('countries')
        ->where('name', 'like', '%' .$keyword. '%')
        ->get();

        return view('countrypage')->with('countries', $countries);
    }
}
