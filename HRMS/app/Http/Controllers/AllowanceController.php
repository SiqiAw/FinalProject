<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Allowance;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class AllowanceController extends Controller
{
    function create() 
    {
        return view('admin.payroll.addallowance');
    }

    function store(Request $request) 
    {
        $this->validate($request, [
            'allowance_item' => 'required',
            'amount' => 'required',
        ]);

        $allowances = new Allowance;
        
        $allowances -> allowance_item = $request -> input('allowance_item');
        $allowances -> amount = $request -> input('amount');
        $allowances -> save();

        Session::flash('success', "Allowance successfully added.");
        return redirect()->route('showAllowance');
    }

    function show()
    {
        $allowances = Allowance::all();
        return view('admin.payroll.allowancepage')->with('allowances', $allowances);
    }

    function edit($id) 
    {
        $allowances = Allowance::find($id);
        return view('admin.payroll.editallowance', compact('allowances','id'));
    }

    function update(Request $request)
    {
        $allowances = Allowance::find($request->ID);
        $allowances -> allowance_item = $request -> allowance_item;
        $allowances -> amount = $request -> amount;
        $allowances -> save();

        Session::flash('success', "Allowance successfully updated.");
        return redirect()->route('showAllowance');
    }

    function delete($id)
    {
        $allowances = Allowance::find($id);
        $allowances->delete();

        Session::flash('success', "Allowance successfully deleted.");
        return redirect()->route('showAllowance');
    }

    function search() 
    {

    }
}
