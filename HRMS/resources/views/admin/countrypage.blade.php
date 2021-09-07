@extends('layouts.hrms')
@section('content')
@include('admin.addcountry')

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
                    <th width="5%">ID</th>
                    <th>Country Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            @foreach($countries as $country)
            <tbody>
                <tr>
                    <td>{{ $country->id }}</td>
                    <td>{{ $country->name }}</td>
                    
                    <td>
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#editCountry{{$country->id}}">
                            <i class="bi bi-pencil-square"></i>
                        </button>
                        <a href="{{ route('deleteCountry', ['id' => $country->id])}}" class="btn btn-danger" onclick="return confirm('Comfirm to delete this country?')">
                            <i class="bi bi-trash-fill"></i>
                        </a>
                    </td>
                    @include('admin.editcountry')
                </tr>
            </tbody>
            @endforeach
        </table>
    </div>

    <div class="page_link" style="float: right;">
        {{$countries->links()}}
    </div>
@endsection