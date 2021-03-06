@extends('layouts.online')
@section('content')

    <div class="container">
        <div class="tab">
            <button class="tablinks" id="defaultOpen" onclick="openForm(event, 'Aboutme')">About Me</button>
            <button class="tablinks" onclick="openForm(event, 'Resume')">Upload Resume</button>
            <button class="tablinks" onclick="openForm(event, 'EmergencyContact')">Emergency Contact</button>
        </div>

        <form method="post" action="{{ route('addApplicant') }}"  enctype="multipart/form-data">
            @csrf

            <!-- About Me -->
            <div id="Aboutme" class="tabcontent">
                <div class="form-row" style="padding: 5%;">
                    <h4 class="mb-3">About Me</h4>
                    <div class="form-group col-md-12">
                        <label for="" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="" class="form-label">NOIC</label>
                        <input type="text" class="form-control" id="noic" name="noic">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="" class="form-label">Date Of Birth</label>
                        <input type="date" class="form-control" id="dob" name="dob">
                    </div>
                    <div class="form-group col-md-4" style="padding-top: 35px; padding-left: 30px;">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="radioM" value="Male" checked>
                            <label class="form-check-label" for="">
                                Male
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="radioF" value="Female">
                            <label class="form-check-label" for="">
                                Female
                            </label>
                        </div>
                    </div>
                    <div class="search_select_box form-group col-md-6">
                        <label for="" class="form-label">Marital Status</label>
                        <select id="maritalstatus" name="maritalstatus" data-live-search="true">
                        <option value="" selected> -- Select Status --</option>
                        <option value="single">Single</option>
                        <option value="married">Married</option>
                        <option value="widowed">Widowed</option>
                        <option value="divorced">Divorced</option>
                        </select>
                    </div>
                    <div class="search_select_box form-group col-md-6">
                        <label for="" class="form-label">Race</label> <br/>
                        <select id="race" name="race" data-live-search="true">
                        <option value="" selected>-- Select Race --</option>
                        <option value="Malay">Malay</option>
                        <option value="Chinese">Chinese</option>
                        <option value="Indian">Indian</option>
                        <option value="Others">Others</option>
                        </select>
                    </div>
                    <div class="search_select_box form-group col-md-6">
                        <label for="" class="form-label">Religion</label> <br/>
                        <select id="religion" name="religion" data-live-search="true">
                        <option value="" selected>-- Select Religion --</option>
                        <option value="Islam">Islam</option>
                        <option value="Buddhism">Buddhism</option>
                        <option value="Christianity">Christianity</option>
                        <option value="Hinduism">Hinduism</option>
                        <option value="Others">Others</option>
                        </select>
                    </div>
                    <div class="search_select_box form-group col-md-6">
                        <label for="" class="form-label">Nationality</label>
                        <select id="nationality" name="nationality" data-live-search="true">
                        <option value="" selected>-- Select Nationality --</option>
                        <option value="Malaysian">Malaysian</option>
                        <option value="Non-Malaysian">Non-Malaysian</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="" class="form-label">Phone Number</label>
                        <input type="text" class="form-control" id="phone" name="phone">
                    </div>
                    <div class="form-group col-md-12">
                        <label for="" class="form-label">Address</label>
                        <textarea type="text" class="form-control" name="address" id="address"></textarea>
                    </div>
                    <div class="search_select_box form-group col-md-4">
                        <label for="" class="form-label">City</label><br/>
                        <select id="city" name="city" data-live-search="true">
                            @foreach ($cities as $city)
                                <option value="{{ $city -> name}}">
                                    {{ $city->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="search_select_box form-group col-md-4">
                        <label for="" class="form-label">State</label>
                        <select id="state" name="state" data-live-search="true">
                            @foreach ($states as $state)
                                <option value="{{ $state -> name }}">
                                    {{ $state -> name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="" class="form-label">Zip</label>
                        <input type="text" class="form-control" id="zipcode" name="zipcode">
                    </div>
                    <div class="search_select_box form-group col-md-4">
                        <label for="" class="form-label">Country</label>
                        <select id="country" name="country" data-live-search="true">
                            @foreach ($countries as $country)
                                <option value="{{ $country -> name }}">
                                    {{ $country -> name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="search_select_box form-group col-md-4">
                        <label for="" class="form-label">Position Applied For</label>
                        <select id="position" name="position" data-live-search="true">
                            @foreach ($jobtitles as $jobtitle)
                                <option value="{{ $jobtitle -> jobtitle_name }}">
                                    {{ $jobtitle -> jobtitle_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="" class="form-label">Expected Salary (RM)</label>
                        <input type="number" class="form-control" id="Esalary" name="Esalary">
                    </div>
                </div>
            </div>
            <!-- End About Me -->

            <!-- Upload Resume -->
            <div id="Resume" class="tabcontent">
                <div class="form-row" style="padding: 5%;">
                    <h4 class="form-group col-md-12">Upload Resume</h4>
                    <ul class="resume">
                        <li>Your file must be in <strong>Word (.doc or .docx), Text (.txt), Rich Text (.rtf) or PDF (.pdf)</strong> format</li>
                        <li>File size must <strong>not exceed 1MB</strong>.</li>
                        <li>File name as <strong>name.filetype</strong></li>
                    </ul>
                    <div class="form-group col-md-12" style="padding: 5%;">
                        <input type="file" class="form-control-file" name="resume-file" id="resume">
                    </div>
                </div>
                <div class="form-row" style="padding: 5%;">
                    <h4 class="form-group col-md-12">Upload Image</h4>
                    <ul class="profile">
                        <li>File must be in <strong>JPEG(.jpg or .jpeg) or GIF(.gif)</strong> format</li>
                        <li>File size must <strong>not exceed 20KB</strong></li>
                        <li>Recommended dimension of photo : <strong>150 x 150 pixels</strong></li>
                    </ul>
                    <div class="form-group col-md-12" style="padding: 5%;">
                        <input type="file" class="form-control-file" name="profile-image" id="image">
                    </div>
                </div>
            </div>
            <!-- End Upload Resume -->

            <!-- Emergency Contact-->
            <div id="EmergencyContact" class="tabcontent">
                <div class="form-row" style="padding: 5%;">
                    <h4 class="mb-3">Emergency Contact</h4>
                    <div class="form-group col-md-12">
                        <label for="" class="form-label">Name</label>
                        <input type="text" class="form-control" id="Ename" name="Ename">
                    </div>
                    <div class="form-group col-md-12">
                        <label for="" class="form-label">Phone Number</label>
                        <input type="text" class="form-control" id="Ephone" name="Ephone">
                    </div> 
                    <div class="form-group col-md-12">
                        <label for="" class="form-label">Relationship</label>
                        <input type="text" class="form-control" id="Erelation" name="Erelation">
                    </div>
                </div>
            </div>
            <!-- End Emergency Contact -->

            <button type="submit" class="btn btn-warning" id="submit">
                Submit
            </button>
        </form>
    </div>

@endsection