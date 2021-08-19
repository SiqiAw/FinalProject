@extends('layouts.app')
@section('content')
@include('addworkingtime')

    <div class="container">

        <div style="margin-bottom: 20px;">
            <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#addWRKtime">
                Add Working Time
            </button>
            <div class="col-md-3" style="float:right;">
                <form class="input-group" method="post" action="{{ route('searchWRKtime') }}">
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
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th>Duration</th>
                    <th>Action</th>
                </tr>
            </thead>
            @foreach($workingtimes as $workingtime)
            <tbody>
                <tr>
                    <td>{{ $workingtime->id }}</td>
                    <td>{{ $workingtime->start }}</td>
                    <td>{{ $workingtime->end }}</td>
                    <td>{{ $workingtime->duration }}</td>
                    
                    <td>
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#editWRKtime{{$workingtime->id}}">
                            Edit
                        </button>
                        <a href="{{ route('deleteWRKtime', ['id' => $workingtime->id])}}" class="btn btn-danger" onclick="return confirm('Comfirm to delete this deparment?')">
                            Delete
                        </a>
                    </td>
                    @include('editworkingtime')
                </tr>
            </tbody>
            @endforeach
        </table>
    </div>
@endsection
