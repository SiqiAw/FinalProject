@extends('layouts.adminapp')
@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3 class="m-0">Payroll Generate</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end mt-2">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                    <li class="breadcrumb-item">Payroll</li>
                    <li class="breadcrumb-item active">Payroll Generate</li>
                </ol>
            </div>
        </div>
    </div>
@endsection

@section('content')
        
    <div class="container">

        <div style="padding-bottom: 5%;">
            <div class="col-md-3" style="float:right;">
                <form class="input-group" method="post" action="#">
                    @csrf
                    <input type="text" class="form-control" id="search" name="search" placeholder="search">
                    <button class="btn btn-dark" type="submit">Search</button>
                </form>
            </div>
        </div>

        <div>
            @if(Session::has('success'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('success')}}
                </div>
            @endif
        </div>

        <table id="payrollTableid" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Employee ID</th>
                    <th>Name</th>
                    <th>Department</th>
                    <th>Jobtitle</th>
                    <th>Status</th>
                    <th>Basic Salary</th>
                    <th style="text-align:center;">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($employees as $employee)
                <tr>
                    <td>{{ $employee->id }}</td>
                    <td>{{ $employee->employee_ID }}</td>
                    <td>{{ $employee->employee_Name }}</td>
                    <td>{{ $employee->department }}</td>
                    <td>{{ $employee->jobtitle }}</td>
                    <td>{{ $employee->status }}</td>
                    <td>{{ $employee->salary }}</td>
                        
                    <td style="text-align:center;">
                    <a href="{{ route('showAddPayroll', ['id' => $employee->id]) }}" class="btn btn-success">
                        <i class="bi bi-plus" data-bs-toggle="tooltip" data-bs-placement="bottom" title="generate payroll"></i>
                    </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <a href="#" type="submit" class="mt-2 btn btn-warning" style="float:right;">
            Back
        </a>
    </div>

@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#payrollTableid').DataTable({
                "pagingType": "full_numbers",
                "searching": false,
            });
        });
    </script>
@endsection