<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payroll;
use App\Models\Employee;
use App\Models\Allowance;
use App\Models\Deduction;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class PayrollController extends Controller
{
    function showPayrollGenerate()
    {
        $employees = Employee::all();
        return view('admin.payroll.payrollpage')->with('employees', $employees);
    }

    function create($id)
    {
        $employees = Employee::all()->where('id', $id);
        $allowances = Allowance::all();
        $deductions = Deduction::all();
        return view('admin.payroll.addpayroll')
        ->with('employees', $employees)
        ->with('allowances', $allowances)
        ->with('deductions', $deductions);
    }

    function store(Request $request)
    {
        $payrolls = Payroll::create([
            'employee_id' => $request -> employee_id,
            'employee_name' => $request -> employee_name,
            'department' => $request -> department,
            'jobtitle' => $request -> jobtitle,
            'status'=> $request -> status,
            'basic_salary' => $request -> basic_salary,
            'deduction' => $request -> deduction,
            'allowance' => $request -> allowance,
            'gross' => $request -> gross,
            'net' => $request -> net,
            'month' => $request -> month,
            'year' => $request -> year,
        ]);

        return redirect()->route('showPayroll');
    }

    function show()
    {
        $payrolls = Payroll::all();
        return view('admin.payroll.employeepayroll', compact('payrolls'));
    }

}
