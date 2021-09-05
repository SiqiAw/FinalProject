@extends('layouts.app')
@section('content')

    <div class="container">

        <div>
            <div class="col-md-3" style="float:right; margin-bottom: 10px">
                <form class="input-group" method="post" action="#">
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
                    <th>Name</th>
                    <th>NO IC</th>
                    <th>Gender</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Profile</th>
                    <th>Action</th>
                </tr>
            </thead>
            @foreach($onlineapplicants as $onlineapplicant)
            <tbody>
                <tr>
                    <td>{{ $onlineapplicant->id }}</td>
                    <td>{{ $onlineapplicant->name }}</td>
                    <td>{{ $onlineapplicant->ic }}</td>
                    <td>{{ $onlineapplicant->gender }}</td>
                    <td>{{ $onlineapplicant->email }}</td>
                    <td>{{ $onlineapplicant->phone_num }}</td>
                    <td><img src="{{ asset('images/') }}/{{$onlineapplicant->image}}" alt="" width="50"></td>

                    <td>
                        <a href="{{ route('admin.view', ['id' => $onlineapplicant->id])}}" class="btn btn-primary">
                            <i class="bi bi-eye"></i>
                        </a>
                        <a href="" class="btn btn-success">
                            <i class="bi bi-check-lg"></i>
                        </a>
                        <a href="" class="btn btn-danger">
                            <i class="bi bi-x-lg"></i>
                        </a>
                        <a href="" class="btn btn-warning">
                            <i class="bi bi-person-plus"></i>
                        </a>
                    </td>
                </tr>
            </tbody>
            @endforeach
        </table>
    </div>

    <div class="page_link" style="float: right;">
        {{$onlineapplicants->links()}}
    </div>
@endsection