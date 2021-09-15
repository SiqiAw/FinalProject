<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Deduction;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class DeductionController extends Controller
{
    function create() 
    {
        return view('admin.payroll.adddeduction');
    }

    function store(Request $request) 
    {
        $this->validate($request, [
            'deduct_item' => 'required',
            'amount' => 'required',
        ]);

        $addDeductions = Deduction::create([
            'deduct_item' => $request->deduct_item,
            'amount' => $request->amount,
        ]); 

        Session::flash('success', "Deduction successfully added.");
        return redirect()->route('showDeduction');
    }

    function show()
    {
        $deductions = Deduction::all();
        return view('admin.payroll.deductionpage')->with('deductions', $deductions);
    }

    function edit($id) 
    {
        $deductions = Deduction::find($id);
        return view('admin.payroll.editdeduction', compact('deductions','id'));
    }

    function update(Request $request)
    {
        $deductions = Deduction::find($request->ID);
        $deductions -> deduct_item = $request -> deduct_item;
        $deductions -> amount = $request -> amount;
        $deductions->save();

        Session::flash('success', "Deduction successfully updated.");
        return  redirect()->route('showDeduction');
    }

    function delete($id)
    {
        $deductions = Deduction::find($id);
        $deductions->delete();

        Session::flash('success', "Deduction successfully deleted.");
        return redirect()->route('showDeduction');
    }

    function search() 
    {
        
    }
}
