@extends('layouts.app')
@section('content')

<div class="container">
    <table class="table table-striped table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th width="5%">ID</th>
                    <th>Address</th>
                    <th>State</th>
                    <th>City</th>
                    <th>ZipCode</th>
                </tr>
            </thead>
            @foreach($tests as $test)
            <tbody>
                <tr>
                    <td>{{ $test->id }}</td>
                    <td>{{ $test->address }}</td>
                    <td>{{ $test->state }}</td>
                    <td>{{ $test->city }}</td>
                    <td>{{ $test->zipcode }}</td>
                </tr>
            </tbody>
            @endforeach
    </table>
</div>

@endsection