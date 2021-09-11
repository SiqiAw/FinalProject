@extends('layouts.test')

@section('content')

<div class="container">
    <table id="table1" class="table table-striped table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <td width="5%">ID</td>
                    <td>Address</td>
                    <td>State</td>
                    <td>City</td>
                    <td>ZipCode</td>
                </tr>
            </thead>
            @foreach($tests as $test)
            
                <tr>
                    <td>{{ $test->id }}</td>
                    <td>{{ $test->address }}</td>
                    <td>{{ $test->state }}</td>
                    <td>{{ $test->city }}</td>
                    <td>{{ $test->zipcode }}</td>
                </tr>
           
            @endforeach
    </table>
</div>

@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#table1').DataTable();
        });
    </script>

@endsection