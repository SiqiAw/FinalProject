@extends('layouts.hrms')
@section('content')
@include('addnationality')

    <div class="container">

        <div style="margin-bottom: 20px;">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addNationality">
                Add Nationality
            </button>
            <div class="col-md-3" style="float:right;">
                <form class="input-group" method="post" action="{{ route('searchNationality') }}">
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
                    <th>Nationality</th>
                    <th>Action</th>
                </tr>
            </thead>
            @foreach($nationalities as $nationality)
            <tbody>
                <tr>
                    <td>{{ $nationality->id }}</td>
                    <td>{{ $nationality->name }}</td>
                    
                    <td>
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#editNationality{{$nationality->id}}">
                            Edit
                        </button>
                        <a href="{{ route('deleteNationality', ['id' => $nationality->id])}}" class="btn btn-danger" onclick="return confirm('Comfirm to delete this nationality?')">
                            Delete
                        </a>
                    </td>
                    @include('editnationality')
                </tr>
            </tbody>
            @endforeach
        </table>
    </div>

    <div class="page_link" style="float: right;">
        {{$nationalities->links()}}
    </div>
@endsection