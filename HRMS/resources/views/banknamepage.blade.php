@extends('layouts.app')
@section('content')
@include('addbankname')

    <div class="container">

        <div style="margin-bottom: 20px;">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addBankname">
                Add Bank
            </button>
            <div class="col-md-3" style="float:right;">
                <form class="input-group" method="post" action="{{ route('searchBankname') }}">
                    @csrf
                    <input type="text" class="form-control" id="search" name="search" placeholder="search">
                    <button class="btn btn-dark" type="button">Search</button>
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

        <table class="table table-striped table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Bank Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            @foreach($banknames as $bankname)
            <tbody>
                <tr>
                    <td>{{ $bankname->id }}</td>
                    <td>{{ $bankname->name }}</td>
                    
                    <td>
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#editBankname{{$bankname->id}}">
                            Edit
                        </button>
                        <a href="{{ route('deleteBankname', ['id' => $bankname->id])}}" class="btn btn-danger" onclick="return confirm('Comfirm to delete this bank?')">
                            Delete
                        </a>
                    </td>
                    @include('editbankname')
                </tr>
            </tbody>
            @endforeach
        </table>
    </div>
@endsection