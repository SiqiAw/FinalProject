<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    function show()
    {
        return view('employeepage')->with("employees", Employee::all());
    }
}
