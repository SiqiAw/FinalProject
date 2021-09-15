@extends('layouts.adminapp')

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3 class="m-0">Allowance</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end mt-2">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                    <li class="breadcrumb-item">Payroll</li>
                    <li class="breadcrumb-item active">Allowance</li>
                </ol>
            </div>
        </div>
    </div>
@endsection

@section('content')
@include('payroll.admin.addallowance')

    <div class="container">

        <div style="margin-bottom: 20px;">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addAllowance">
                Add Allowance
            </button>
            <div class="col-md-3" style="float:right;">
                <form class="input-group" method="post" action="{{ route('searchAllowance') }}">
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

        <table id="allowanceTableid" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th width="5%">ID</th>
                    <th>Allowance</th>
                    <th>Amount</th>
                    <th style="text-align:center;">Action</th>
                </tr>
            </thead>
            @foreach($allowances as $allowance)
            <tr>
                <td>{{ $allowance->id }}</td>
                <td>{{ $allowance->allowance_item }}</td>
                <td>{{ $allowance->amount }}</td>
                    
                <td style="text-align:center;">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editAllowance{{$allowance->id}}">
                        <i class="bi bi-pencil-square"></i>
                    </button>
                    <a href="{{ route('deleteAllowance', ['id' => $allowance->id])}}" class="btn btn-danger" onclick="return confirm('Comfirm to delete?')">
                        <i class="bi bi-trash-fill"></i>
                    </a>
                </td>
                @include('payroll.admin.editallowance')
            </tr>
            @endforeach
        </table>
        <a href="{{ route('showAllowance') }}" type="submit" class="mt-2 btn btn-warning" style="float:right;">
            Back
        </a>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#allowanceTableid').DataTable({
                "pagingType": "full_numbers",
                "searching": false,
            });
        });
    </script>
@endsection