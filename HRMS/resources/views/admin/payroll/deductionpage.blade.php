@extends('layouts.adminapp')

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3 class="m-0">Deduction</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end mt-2">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                    <li class="breadcrumb-item">Payroll</li>
                    <li class="breadcrumb-item active">Deduction</li>
                </ol>
            </div>
        </div>
    </div>
@endsection

@section('content')
@include('admin.payroll.adddeduction')

    <div class="container">

        <div style="margin-bottom: 20px;">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addDeduction">
                Add Deduction
            </button>
            <div class="col-md-3" style="float:right;">
                <form class="input-group" method="post" action="{{ route('searchDeduction') }}">
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

        <table id="deductionTableid" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th width="5%">ID</th>
                    <th>Deduction</th>
                    <th>Amount</th>
                    <th style="text-align:center;">Action</th>
                </tr>
            </thead>
            @foreach($deductions as $deduction)
            <tr>
                <td>{{ $deduction->id }}</td>
                <td>{{ $deduction->deduct_item }}</td>
                <td>{{ $deduction->amount }}</td>
                    
                <td style="text-align:center;">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editDeduction{{$deduction->id}}">
                        <i class="bi bi-pencil-square"></i>
                    </button>
                    <a href="{{ route('deleteDeduction', ['id' => $deduction->id])}}" class="btn btn-danger" onclick="return confirm('Comfirm to delete?')">
                        <i class="bi bi-trash-fill"></i>
                    </a>
                </td>
                @include('admin.payroll.editdeduction')
            </tr>
            @endforeach
        </table>
        <a href="{{ route('showDeduction') }}" type="submit" class="mt-2 btn btn-warning" style="float:right;">
            Back
        </a>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#deductionTableid').DataTable({
                "pagingType": "full_numbers",
                "searching": false,
            });
        });
    </script>
@endsection