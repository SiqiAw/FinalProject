@extends('layouts.app')
@section('content')
@include('addleavetype')

    <div class="container">

        <div style="margin-bottom: 20px;">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addLeavetype">
                Add Leave Type
            </button>
            <div class="col-md-3" style="float:right;">
                <form class="input-group" method="post" action="{{ route('searchLeavetype') }}">
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
                    <th width="5%">ID</th>
                    <th>Leave Type</th>
                    <th>Total Days Entitled</th>
                    <th>Action</th>
                </tr>
            </thead>
            @foreach($leavetypes as $leavetype)
            <tbody>
                <tr>
                    <td>{{ $leavetype->id }}</td>
                    <td>{{ $leavetype->name }}</td>
                    <td>{{ $leavetype->entitleDays }}</td>
                    
                    <td>
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#editLeavetype{{$leavetype->id}}">
                            <i class="bi bi-pencil-square"></i>
                        </button>
                        <a href="{{ route('deleteLeavetype', ['id' => $leavetype->id])}}" class="btn btn-danger" onclick="return confirm('Comfirm to delete?')">
                            <i class="bi bi-trash-fill"></i>
                        </a>
                    </td>
                    @include('editleavetype')
                </tr>
            </tbody>
            @endforeach
        </table>
    </div>

    <div class="page_link" style="float: right;">
        {{$leavetypes->links()}}
    </div>
@endsection