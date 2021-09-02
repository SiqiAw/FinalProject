@extends('layouts.online')
@section('content')

    <div class="container" style="max-width: 750px;">
        <form class="row g-3" method="post" action="" enctype="multipart/form-data">
            @csrf
            <div class="col-md-6">
                <label for="" class="form-label">First Name</label>
                <input type="text" class="form-control" id="Fname" name="Fname">
            </div>
            <div class="col-md-6">
                <label for="" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="Lname" class="Lname">
            </div>
            <div class="col-12">
                <label for="" class="form-label">Phone Number</label>
                <input type="number" class="form-control" id="phone" class="phone">
            </div>
            <div class="col-12">
                <label for="" class="form-label">Address</label>
                <textarea type="text" class="form-control" id="address"></textarea>
            </div>
            <div class="col-md-6">
                <label for="" class="form-label">City</label>
                <input type="text" class="form-control" id="city" class="city">
            </div>
            <div class="col-md-4">
                <label for="" class="form-label">State</label>
                <select id="state" name="state" class="form-select">
                <option selected>Choose...</option>
                <option>...</option>
                </select>
            </div>
            <div class="col-md-2">
                <label for="" class="form-label">Zip</label>
                <input type="text" class="form-control" id="zipcode" name="zipcode">
            </div>
            <div class="col-md-4">
                <label for="" class="form-label">Position Applied For</label>
                <select id="position" name="position" class="form-select">
                <option selected>Choose...</option>
                <option>...</option>
                </select>
            </div>
            <div class="col-md-8">
                <label for="" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary" style="float: right; width: 10%">
                    <i class="bi bi-arrow-right-short" style="font-size: 20px;"></i>
                </button>
            </div>
        </form>

    </div>

@endsection