<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bankname;
use Session;
use DB;

class BanknameController extends Controller
{
    function create()
    {
        return view('addbankname');
    }

    function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
        ]);

        $banknames = new Bankname;

        $banknames->name = $request->input('name');
        
        $banknames->save();

        Session::flash('success', "Bank name added.");
        return redirect()->route('showBankname');
    }

    function show()
    {
        $banknames = Bankname::all();
        return view('banknamepage')->with('banknames', $banknames);
    }

    function edit($id)
    {
        $banknames = Bankname::find($id);
        return view('editbankname', compact('banknames','id'));
    }

    function update()
    {
        $r=request();//retrive submited form data 
        $banknames = Bankname::find($r->ID);

        $banknames->name=$r->name;
        
        $banknames->save(); //run the SQL update statment
        return redirect()->route('showBankname');
    }

    function delete($id)
    {
        $banknames = Bankname::find($id);
        $banknames->delete();

        Session::flash('success', 'Bank Name deleted.');
        return redirect()->route('showBankname');
    }

    function search()
    {
        $request = request();
        $keyword = $request->search;
        $banknames = DB::table('banknames')
        ->where('name', 'like', '%' .$keyword. '%')
        ->get();

        return view('banknamepage')->with('banknames', $banknames);
    }
}
