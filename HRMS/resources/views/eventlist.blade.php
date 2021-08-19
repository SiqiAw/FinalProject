@extends('layouts.app')
@section('content')

    <div class="container">
        <table class="table table-striped table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Event Name</th>
                    <th>Color Code</th>
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
                    <td>{{ $event->color }}</td>
                    <td style="background-color:{{ $event->color }}"> </td>
                    <td>{{ $event->start_date }}</td>
                    <td>{{ $event->end_date }}</td>

                    <td>
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#editEvent{{$event->id}}">
                            Edit
                        </button>
                        <a href="{{ route('deleteEvent', ['id' => $event->id])}}" class="btn btn-danger" onclick="return confirm('Comfirm to delete this event?')">
                            Delete
                        </a>
                    </td>
                    @include('editevent')
                </tr>
            </tbody>
            @endforeach
        </table>
    </div>
@endsection