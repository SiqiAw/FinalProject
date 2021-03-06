<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class CountryController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
   }

    function create()
    {
        return view('admin.system-settings.addcountry');
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
        $countries = Country::all();
        return view('admin.system-settings.countrypage')->with('countries', $countries);
    }

    function edit($id)
    {
        $countries = Country::find($id);
        return view('admin.system-settings.editcountry', compact('countries','id'));
    }

    function update()
    {
        $r=request();
        $countries = Country::find($r->ID);

        $countries->name=$r->name;
        
        $countries->save();
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

        return view('admin.system-settings.countrypage')->with('countries', $countries);
    }
}
