@extends('layouts.hrms')

@section('css')
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>   
@endsection

@section('content')
@include('addevent')

    <div class="container">
        <div class="d-grid gap-2 d-md-block" style="margin-bottom: 20px;">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addEvent">
                Add Event
            </button>
            <a href="{{ route('showEventList')}}" class="btn btn-success">Event List</a>
        </div>

        <div>
            @if(Session::has('success'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('success')}}
                </div>
            @endif
        </div>
    
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="background: #2e6da4; color: white">
                        Event Calendar
                    </div>

                    <div class="card-body">
                        {!! $calendar->calendar() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
    {!! $calendar->script() !!}
@endsection