@extends('layouts.app')
@section('content')
@include('addmarital')

    <div class="container">

        <div style="margin-bottom: 20px;">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addMarital">
                Add Marital Status
            </button>
            <div class="col-md-3" style="float:right;">
                <form class="input-group" method="post" action="{{ route('searchMarital') }}">
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
                    <th>Marital Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            @foreach($statusmaritals as $statusmarital)
            <tbody>
                <tr>
                    <td>{{ $statusmarital->id }}</td>
                    <td>{{ $statusmarital->maritalstatus_name }}</td>
                    
                    <td>
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#editMarital{{$statusmarital->id}}">
                            <i class="bi bi-pencil-square"></i>
                        </button>
                        <a href="{{ route('deleteMarital', ['id' => $statusmarital->id])}}" class="btn btn-danger" onclick="return confirm('Comfirm to delete this certificate?')">
                            <i class="bi bi-trash-fill"></i>
                        </a>
                    </td>
                    @include('editmarital')
                </tr>
            </tbody>
            @endforeach
        </table>
    </div>

    <div class="page_link" style="float: right;">
        {{$statusmaritals->links()}}
    </div>
@endsection