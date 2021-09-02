@extends('layouts.app')

@section('content')
@include('addqualification')

    <div class="container">

        <div style="margin-bottom: 20px;">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addQualif">
                Add Qualification
            </button>
            <div class="col-md-3" style="float:right;">
                <form class="input-group" method="post" action="{{ route('searchQualif') }}">
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
                    <th>Qualification</th>
                    <th>Action</th>
                </tr>
            </thead>
            @foreach($qualifications as $qualification)
            <tbody>
                <tr>
                    <td>{{ $qualification->id }}</td>
                    <td>{{ $qualification->name }}</td>
                    
                    <td>
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#editQualif{{$qualification->id}}">
                            <i class="bi bi-pencil-square"></i>
                        </button>
                        <a href="{{ route('deleteQualif', ['id' => $qualification->id])}}" class="btn btn-danger" onclick="return confirm('Comfirm to delete this qualification?')">
                            <i class="bi bi-trash-fill"></i>
                        </a>
                    </td>
                    @include('editqualification')
                </tr>
            </tbody>
            @endforeach
        </table>
    </div>

    <div class="page_link" style="float: right;">
        {{$qualifications->links()}}
    </div>
@endsection