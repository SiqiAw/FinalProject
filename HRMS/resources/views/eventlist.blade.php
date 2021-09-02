@extends('layouts.app')
@section('content')

    <div class="container">

        <div>
            @if(Session::has('success'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('success')}}
                </div>
            @endif
        </div>

        <div style="margin-bottom: 20px;">
            <a href="{{ route('showCalendar') }}" class="btn btn-success">
                Back
            </a>
            <div class="col-md-3" style="float:right;">
                <form class="input-group" method="post" action="{{ route('searchEvent') }}">
                    @csrf
                    <input type="text" class="form-control" id="search" name="search" placeholder="search">
                    <button class="btn btn-dark" type="submit">Search</button>   
                    &nbsp;
                </form>
            </div>
            <div class="col-md-3" style="float:right;">
                <form class="input-group" method="post" action="{{ route('searchByDate') }}">
                    @csrf
                    <input type="date" class="form-control" id="searchdate" name="searchdate" value="{{date('Y-m-d')}}">
                    <button class="btn btn-dark" type="submit">View</button>
                </form>
            </div>
        </div>

        <table class="table table-striped table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th width="5%">ID</th>
                    <th>Event Name</th>
                    <th>Color</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            @foreach($events as $event)
            <tbody>
                <tr>
                    <td>{{ $event->id }}</td>
                    <td>{{ $event->eventname }}</td>
                    <td style="background-color:{{ $event->color }}"> </td>
                    <td>{{ $event->start_date }}</td>
                    <td>{{ $event->end_date }}</td>
                    
                    <td>
                    @if ($event->start_date > date('Y-m-d H:i:s'))
                        <button type="button" class="btn btn-success" data-toggle="modal" data-idUpdate="'.$event->id.'" data-target="#editEvent{{$event->id}}">
                            <i class="bi bi-pencil-square"></i>
                        </button>
                        <a href="{{ route('deleteEvent', ['id' => $event->id])}}" class="btn btn-danger" onclick="return confirm('Comfirm to delete this event?')">
                            <i class="bi bi-trash-fill"></i>
                        </a>
                    @endif
                    </td>
                    @include('editevent')
                </tr>
            </tbody>
            @endforeach
        </table>
    </div>

    <div class="page_link" style="float: right;">
        {{$events->links()}}
    </div>

@endsection