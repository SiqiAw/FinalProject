@extends('layouts.hrms')
@section('content')
@include('addcity')

    <div class="container">

        <div style="margin-bottom: 20px;">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addCity">
                Add City
            </button>
            <div class="col-md-3" style="float:right;">
                <form class="input-group" method="post" action="{{ route('searchCity') }}">
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
                    <th>City Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            @foreach($cities as $city)
            <tbody>
                <tr>
                    <td>{{ $city->id }}</td>
                    <td>{{ $city->name }}</td>
                    
                    <td>
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#editCity{{$city->id}}">
                            <i class="bi bi-pencil-square"></i>
                        </button>
                        <a href="{{ route('deleteCity', ['id' => $city->id])}}" class="btn btn-danger" onclick="return confirm('Comfirm to delete this city?')">
                            <i class="bi bi-trash-fill"></i>
                        </a>
                    </td>
                    @include('editcity')
                </tr>
            </tbody>
            @endforeach
        </table>
    </div>

    <div class="page_link" style="float: right;">
        {{$cities->links()}}
    </div>
@endsection