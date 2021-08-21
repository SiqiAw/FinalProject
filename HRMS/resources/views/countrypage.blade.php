@extends('layouts.app')
@section('content')
@include('addcountry')

    <div class="container">

        <div style="margin-bottom: 20px;">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addCountry">
                Add Country
            </button>
            <div class="col-md-3" style="float:right;">
                <form class="input-group" method="post" action="{{ route('searchCountry') }}">
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
                    <th>Country Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            @foreach($countrynames as $countryname)
            <tbody>
                <tr>
                    <td>{{ $countryname->id }}</td>
                    <td>{{ $countryname->name }}</td>
                    
                    <td>
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#editCountry{{$countryname->id}}">
                            Edit
                        </button>
                        <a href="{{ route('deleteCountry', ['id' => $countryname->id])}}" class="btn btn-danger" onclick="return confirm('Comfirm to delete this country?')">
                            Delete
                        </a>
                    </td>
                    @include('editcountry')
                </tr>
            </tbody>
            @endforeach
        </table>
    </div>
@endsection