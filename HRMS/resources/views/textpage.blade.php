@extends('layouts.app')
@section('content')
<div class="container">
    <form method="post" action="{{ route('storeTest') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="" class="form-label">Address</label>
            <input type="text" name="address" id="address" class="form-control">
        </div>
        <div class="form-group">
            <label for="" class="form-label">State</label>
            <input type="text" name="state" id="state" class="form-control">
        </div>
        <div class="form-group">
            <label for="" class="form-label">City</label>
            <input type="text" name="city" id="city" class="form-control">
        </div>
        <div class="form-group">
            <label for="" class="form-label">ZipCode</label>
            <input type="text" name="zipcode" id="zipcode" class="form-control">
        </div>
        <button type="submit" class="btn btn-warning">
            Submit
        </button>
    </form>
</div>
@endsection