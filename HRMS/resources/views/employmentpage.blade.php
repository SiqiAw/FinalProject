@extends('layouts.app')
@section('content')
@include('addemployment')

    <div class="container">

        <div style="margin-bottom: 20px;">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addEmployment">
                Add Employment
            </button>
            <div class="col-md-3" style="float:right;">
                <form class="input-group" method="post" action="{{ route('searchEmployment') }}">
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
                    <th>Employment Type</th>
                    <th>Working Time</th>
                    <th >Action</th>
                </tr>
            </thead>
            @foreach($employments as $employment)
            <tbody>
                <tr>
                    <td>{{ $employment->id }}</td>
                    <td>{{ $employment->employment_name }}</td>
                    <td>{{ $employment->workingtime_id }}</td>
                   
                    <td>
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#editEmployment{{$employment->id}}">
                            Edit
                        </button>
                        <a href="{{ route('deleteEmployment', ['id' => $employment->id])}}" class="btn btn-danger" onclick="return confirm('Comfirm to delete?')">
                            Delete
                        </a>
                    </td>
                    @include('editemployment')
                </tr>
            </tbody>
            @endforeach
        </table>
    </div>

    <div class="page_link" style="float: right;">
        {{$employments->links()}}
    </div>
@endsection