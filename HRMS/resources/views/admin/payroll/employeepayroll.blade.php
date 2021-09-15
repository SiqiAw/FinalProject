@extends('layouts.adminapp')
@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3 class="m-0">Payroll</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end mt-2">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                    <li class="breadcrumb-item">Payroll</li>
                    <li class="breadcrumb-item active">Payroll History</li>
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
                    <th>Net Salary</th>
                    <th style="text-align:center;">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($payrolls as $payroll)
                <tr>
                    <td>{{ $payroll->id }}</td>
                    <td>{{ $payroll->employee_id }}</td>
                    <td>{{ $payroll->employee_name }}</td>
                    <td>{{ $payroll->department }}</td>
                    <td>{{ $payroll->jobtitle }}</td>
                    <td>{{ $payroll->status }}</td>
                    <td>{{ $payroll->net }}</td>
                        
                    <td style="text-align:center;">
                    <a href="{{ route('viewPayrollDetail', ['id' => $payroll->id]) }}" class="btn btn-primary"
                        data-bs-toggle="tooltip" data-bs-placement="bottom" title="view detail">
                        <i class="bi bi-eye"></i>
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