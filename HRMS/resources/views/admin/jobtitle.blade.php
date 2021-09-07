@extends('layouts.hrms')
@section('content')
@include('admin.addjobtitle')

    <div class="container">

        <div style="margin-bottom: 20px;">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addJobtitle">
                Add Job Title
            </button>
            <div class="col-md-3" style="float:right;">
                <form class="input-group" method="post" action="{{ route('searchJobtitle') }}">
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
                    <th width="15%">Job Title</th>
                    <th width="20%">Department</th>
                    <th>Description</th>
                    <th width="17%">Action</th>
                </tr>
            </thead>
            @foreach($jobtitles as $jobtitle)
            <tbody>
                <tr>
                    <td>{{ $jobtitle->id }}</td>
                    <td>{{ $jobtitle->jobtitle_name }}</td>
                    <td>{{ $jobtitle->department_id }}</td>
                    <td>{{ $jobtitle->description }}</td>
                    
                    <td>
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#editJobtitle{{$jobtitle->id}}">
                            <i class="bi bi-pencil-square"></i>
                        </button>
                        <a href="{{ route('deleteJobtitle', ['id' => $jobtitle->id])}}" class="btn btn-danger" onclick="return confirm('Comfirm to delete this Job title?')">
                            <i class="bi bi-trash-fill"></i>
                        </a>
                    </td>
                    @include('admin.editjobtitle')
                </tr>
            </tbody>
            @endforeach
        </table>
    </div>

    <div class="page_link" style="float: right;">
        {{$jobtitles->links()}}
    </div>
@endsection