@extends('layouts.app')

@section('content')
@include('addcert')

    <div class="container">

        <div style="margin-bottom: 20px;">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addCert">
                Add Certificate
            </button>
            <div class="col-md-3" style="float:right;">
                <form class="input-group" method="post" action="{{ route('searchCert') }}">
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
                    <th>Certificate Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            @foreach($certificates as $certificate)
            <tbody>
                <tr>
                    <td>{{ $certificate->id }}</td>
                    <td>{{ $certificate->certificate_name }}</td>
                    
                    <td>
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#editCert{{$certificate->id}}">
                            Edit
                        </button>
                        <a href="{{ route('deleteCert', ['id' => $certificate->id])}}" class="btn btn-danger" onclick="return confirm('Comfirm to delete this certificate?')">
                            Delete
                        </a>
                    </td>
                    @include('editcert')
                </tr>
            </tbody>
            @endforeach
        </table>
    </div>
@endsection