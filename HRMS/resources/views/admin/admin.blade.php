@extends('layouts.hrms')

@section('css')

<style>
    .inner h3 {
        font-size: 2.2em;
        font-weight: bold;
        color: #fff;
    }

    .inner p {
        font-size: 1.0em;
        font-weight: bold;
        color: #fff;
    }

    .icon i {
        position: absolute;
        font-size: 50px;
        top: 20px;
        right: 15px;
    }

    a.card-footer {
        text-align: center;
    }
</style>

@endsection

@section('content')
       
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-3">
                    <div class="card">
                    <div class="card-body bg-info">
                        <div class="inner">
                            <h3>150</h3>

                            <p>Employees</p>
                        </div>
                        <div class="icon">
                            <i class="bi bi-people-fill"></i>
                        </div>
                    </div>
                    <a href="#" class="card-footer text-muted">More info <i class="bi bi-arrow-right-circle-fill"></i></a>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="card">
                        <div class="card-body bg-success">
                            <div class="inner">
                                <h3>150</h3>

                                <p>Online Applicants</p>
                            </div>
                            <div class="icon">
                                <i class="bi bi-person-plus-fill"></i>
                            </div>
                        </div>
                        <a href="#" class="card-footer text-muted">More info <i class="bi bi-arrow-right-circle-fill"></i></a>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="card">
                    <div class="card-body bg-warning">
                        <div class="inner">
                            <h3>150</h3>

                            <p>Leave Types</p>
                        </div>
                        <div class="icon">
                            <i class="bi bi-umbrella-fill"></i>
                        </div>
                    </div>
                    <a href="#" class="card-footer text-muted">More info <i class="bi bi-arrow-right-circle-fill"></i></a>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="card">
                    <div class="card-body bg-danger">
                        <div class="inner">
                            <h3>150</h3>

                            <p>Events</p>
                        </div>
                        <div class="icon">
                            <i class="bi bi-calendar-day-fill"></i>
                        </div>
                    </div>
                    <a href="#" class="card-footer text-muted">More info <i class="bi bi-arrow-right-circle-fill"></i></a>
                    </div>
                </div>
            </div>
    </div>
@endsection
