@extends('layouts.adminapp')
@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3 class="m-0">Payroll Generate</h3>
            </div>
            <div class="col-sm-6">
            @foreach($employees as $employee)
                <ol class="breadcrumb float-sm-end mt-2">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                    <li class="breadcrumb-item">Payroll</li>
                    <li class="breadcrumb-item"><a href="{{ route('showPayrollGenerate') }}"></a> Payroll Generate</li>
                    <li class="breadcrumb-item active">{{ $employee-> employee_Name }}</li>
                </ol>
            
            </div>
        </div>
    </div>
@endsection

@section('content')

    <div class="container">
        <form action="{{ route('addPayroll') }}" method="post">
          @csrf
          <div class="card-body" style="width: 500px;">
            <div class="row g-2">
                <div class="col-md-6 mb-3">
                    <label for="">Month</label>
                    <select id="month" name="month" class="form-select form-select-sm">
                        <option value="" selected>-- Select Month --</option>
                        <option value="January">January/ 1</option>
                        <option value="February">February/ 2</option>
                        <option value="March">March/ 3</option>
                        <option value="April">April/ 4</option>
                        <option value="May">May/ 5</option>
                        <option value="June">June/ 6</option>
                        <option value="July">July/ 7</option>
                        <option value="August">August/ 8</option>
                        <option value="September">September/ 9</option>
                        <option value="October">October/ 10</option>
                        <option value="November">November/ 11</option>
                        <option value="December">December/ 12</option>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Year</label>
                    <input type="text" id="year" name="year" class="form-control form-control-sm" placeholder="Enter year" required>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Employee ID</label>
                    <input type="text" class="form-control form-control-sm" name="employee_id" id="employee_id" value="{{ $employee->employee_ID }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Employee Name</label>
                    <input type="text" class="form-control form-control-sm" name="employee_name" id="employee_name" value="{{ $employee->employee_Name }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="">Department</label>
                    <input type="text" class="form-control form-control-sm" name="department" id="department" value="{{ $employee->department }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="">Jobtitle</label>
                    <input type="text" class="form-control form-control-sm" name="jobtitle" id="jobtitle" value="{{ $employee->jobtitle }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="">Status</label>
                    <input type="text" class="form-control form-control-sm" name="status" id="status" value="{{ $employee->status }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="">Basic Salary</label>
                    <input type="text" class="form-control form-control-sm" name="basic_salary" id="basic_salary" value="{{ $employee->salary }}" readonly>
                </div>
                @endforeach
                <div class="mb-3">
                    <label for="">Allowance</label>
                    <select name="allowance" id="allowance" class="form-control form-control-sm">
                        @foreach($allowances as $allowance)
                            <option value="{{ $allowance->amount }}">
                                {{ $allowance->allowance_item }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="">Deduction</label>
                    <select name="deduction" id="deduction" class="form-control form-control-sm">
                        @foreach($deductions as $deduction)
                            <option value="{{ $deduction->amount }}">
                                {{ $deduction->deduct_item }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="">Gross Salary</label>
                    <input type="text" class="form-control form-control-sm" id="gross" name="gross">
                </div>
                <div class="mb-3">
                    <label for="">Net Salary</label>
                    <input type="text" class="form-control form-control-sm" id="net" name="net">
                </div>
            </div>
            <div class="col-auto mt-3">
                <button class="btn btn-danger">Generate Payroll</button>
            </div>
          </div>
        </form>
    </div>

@endsection