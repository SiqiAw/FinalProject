@extends('layouts.hrms')
@section('content')
@include('admin.adddepartment')

    <div class="container">

        <div style="margin-bottom: 20px;">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addDept">
                Add Department
            </button>
            <div class="col-md-3" style="float:right;">
                <form class="input-group" method="post" action="{{ route('searchDept') }}">
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

        <table class="table table-striped table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th width="5%">ID</th>
                    <th>Department Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            @foreach($departments as $department)
            <tbody>
                <tr>
                    <td>{{ $department->id }}</td>
                    <td>{{ $department->department_name }}</td>
                    
                    <td>
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#editDept{{$department->id}}">
                            <i class="bi bi-pencil-square"></i>
                        </button>
                        <a href="{{ route('deleteDept', ['id' => $department->id])}}" class="btn btn-danger" onclick="return confirm('Comfirm to delete this deparment?')">
                            <i class="bi bi-trash-fill"></i>
                        </a>
                    </td>
                    @include('admin.editdepartment')
                </tr>
            </tbody>
            @endforeach
        </table>
    </div>

    <div class="page_link" style="float: right;">
        {{$departments->links()}}
    </div>
@endsection