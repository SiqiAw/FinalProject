@extends('layouts.online')

@section('css')
<style>
    .search_select_box button {
        height: 30px;
        font-size: 12px;
    }

</style>
@endsection

@section('content')

    <div class="container">
        <div class="tab">
            <button class="tablinks" id="defaultOpen" onclick="openForm(event, 'Aboutme')">About Me</button>
            <button class="tablinks" onclick="openForm(event, 'Resume')">Upload Resume</button>
            <button class="tablinks" onclick="openForm(event, 'EmergencyContact')">Emergency Contact</button>
        </div>

        <form id="form" method="post" action="{{ route('addApplicant') }}"  enctype="multipart/form-data">
            @csrf

            <!-- About Me -->
            <div id="Aboutme" class="tabcontent">
                <div class="form-row" style="padding: 5%;">
                    <h4 class="mb-3">
                        About Me <br/>
                        <span class="asterisk">* required</span>
                    </h4>
                    <div class="form-group col-sm-12">
                        <label for="" class="form-label">Name <span class="asterisk">*</span></label>
                        <input type="text" class="form-control form-control-sm" id="name" name="name" onkeyup="toUpperCase()" required>
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="" class="form-label">NOIC <span class="asterisk">*</span></label>
                        <input type="text" class="form-control form-control-sm" id="noic" name="noic" placeholder="i.e 000000-00-0000" required>
                        <small>Error Message</small>
                    </div>
                    
                    <div class="form-group col-sm-4">
                        <label for="" class="form-label">Date Of Birth <span class="asterisk">*</span></label>
                        <input type="date" class="form-control form-control-sm" id="dob" name="dob" required>
                    </div>
                    <div class="form-group col-sm-4" style="padding-top: 50px; padding-left: 30px;">
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
                    <div id="special" class="search_select_box form-group col-sm-6">
                        <label for="" class="form-label">Marital Status <span class="asterisk">*</span></label>
                        <select id="maritalstatus" name="maritalstatus" data-live-search="true">
                        <option value="" selected> -- Select Status --</option>
                        <option value="single">Single</option>
                        <option value="married">Married</option>
                        <option value="widowed">Widowed</option>
                        <option value="divorced">Divorced</option>
                        </select>
                    </div>
                    <div id="special" class="search_select_box form-group col-sm-6">
                        <label for="" class="form-label">Race <span class="asterisk">*</span></label> <br/>
                        <select id="race" name="race" data-live-search="true"
                        onchange="if (this.value=='Others'){this.form['othersrace'].style.visibility='visible'}
                        else {this.form['othersrace'].style.visibility='hidden'};">
                        <option value="" selected>-- Select Race --</option>
                        <option value="Malay">Malay</option>
                        <option value="Chinese">Chinese</option>
                        <option value="Indian">Indian</option>
                        <option value="Others">Others</option>
                        </select>
                        <input type="text" name="othersrace" id="race" style="visibility:hidden; margin-top: 5px"/>
                    </div>
                    <div id="special" class="search_select_box form-group col-sm-6">
                        <label for="" class="form-label">Religion <span class="asterisk">*</span></label> <br/>
                        <select id="religion" name="religion" data-live-search="true"
                        onchange="if (this.value=='Others'){this.form['others'].style.visibility='visible'}
                        else {this.form['others'].style.visibility='hidden'};">
                        <option value="" selected>-- Select Religion --</option>
                        <option value="Islam">Islam</option>
                        <option value="Buddhism">Buddhism</option>
                        <option value="Christianity">Christianity</option>
                        <option value="Hinduism">Hinduism</option>
                        <option value="Others">Others</option>
                        </select>
                        <input type="text" name="others" id="religion" style="visibility:hidden; margin-top: 5px"/>
                    </div>
                    <div id="special" class="search_select_box form-group col-sm-6">
                        <label for="" class="form-label">Nationality <span class="asterisk">*</span></label>
                        <select id="nationality" name="nationality" data-live-search="true">
                        <option value="" selected>-- Select Nationality --</option>
                            @foreach ($nationalities as $nationality)
                                <option value="{{ $nationality -> name }}">
                                    {{ $nationality -> name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="" class="form-label">Email <span class="asterisk">*</span></label>
                        <input type="email" class="form-control form-control-sm" id="email" name="email" required>
                        <small>Error Message</small>
                    </div>
                    
                    <div class="form-group col-sm-6">
                        <label for="" class="form-label">Phone Number <span class="asterisk">*</span></label>
                        <input type="text" class="form-control form-control-sm" id="phone" name="phone" placeholder="+00000000000" required>
                        <small>Error Message</small>
                    </div>
                    
                    <div class="form-group col-sm-12">
                        <label for="" class="form-label">Address <span class="asterisk">*</span></label>
                        <textarea type="text" class="form-control form-control-sm" name="address" id="address" required></textarea>
                    </div>
                    <div class="search_select_box form-group col-sm-4">
                        <label for="" class="form-label">City <span class="asterisk">*</span></label><br/>
                        <select id="city" name="city" data-live-search="true">
                            @foreach ($cities as $city)
                                <option value="{{ $city -> name}}">
                                    {{ $city->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="search_select_box form-group col-sm-4">
                        <label for="" class="form-label">State <span class="asterisk">*</span></label>
                        <select id="state" name="state" data-live-search="true">
                            @foreach ($states as $state)
                                <option value="{{ $state -> name }}">
                                    {{ $state -> name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="search_select_box form-group col-sm-4">
                        <label for="" class="form-label">Country <span class="asterisk">*</span></label>
                        <select id="country" name="country" data-live-search="true">
                            @foreach ($countries as $country)
                                <option value="{{ $country -> name }}">
                                    {{ $country -> name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="search_select_box form-group col-sm-4">
                        <label for="" class="form-label">Position Applied For <span class="asterisk">*</span></label>
                        <select id="position" name="position" data-live-search="true">
                            @foreach ($jobtitles as $jobtitle)
                                <option value="{{ $jobtitle -> jobtitle_name }}">
                                    {{ $jobtitle -> jobtitle_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="" class="form-label">Expected Salary (RM)</label>
                        <input type="text" class="form-control form-control-sm" id="Esalary" name="Esalary">
                    </div>
                </div>
            </div>
            <!-- End About Me -->

            <!-- Upload Resume -->
            <div id="Resume" class="tabcontent">
                <div class="form-row" style="padding: 5%;">
                    <h4 class="form-group col-sm-12">Upload Resume <span class="asterisk">*</span></h4>
                    <ul class="resume">
                        <li>Your file must be in <strong>Word (.doc or .docx), Text (.txt), Rich Text (.rtf) or PDF (.pdf)</strong> format</li>
                        <li>File size must <strong>not exceed 1MB</strong>.</li>
                        <li>File name as <strong>name.filetype</strong></li>
                    </ul>
                    <div class="form-group col-sm-12" style="padding: 5%;">
                        <input type="file" class="form-control-file form-control-sm" name="resume-file" id="resume" required>
                    </div>
                </div>
                <div class="form-row" style="padding: 5%;">
                    <h4 class="form-group col-sm-12">Upload Image <span class="asterisk">*</span></h4>
                    <ul class="profile">
                        <li>File must be in <strong>JPEG(.jpg or .jpeg) or GIF(.gif)</strong> format</li>
                        <li>File size must <strong>not exceed 20KB</strong></li>
                        <li>Recommended dimension of photo : <strong>150 x 150 pixels</strong></li>
                    </ul>
                    <div class="form-group col-sm-12" style="padding: 5%;">
                        <input type="file" class="form-control-file form-control-sm" name="profile-image" id="image" required>
                    </div>
                </div>
            </div>
            <!-- End Upload Resume -->

            <!-- Emergency Contact-->
            <div id="EmergencyContact" class="tabcontent">
                <div class="form-row" style="padding: 5%;">
                    <h4 class="mb-3">Emergency Contact</h4>
                    <div class="form-group col-sm-12">
                        <label for="" class="form-label">Name <span class="asterisk">*</span></label>
                        <input type="text" class="form-control form-control-sm" id="Ename" name="Ename" onkeyup="toUpperCase()" required>
                    </div>
                    <div class="form-group col-sm-12">
                        <label for="" class="form-label">Phone Number <span class="asterisk">*</span></label>
                        <input type="text" class="form-control form-control-sm" id="Ephone" name="Ephone" required>
                    </div> 
                </div>
            </div>
            <!-- End Emergency Contact -->

            <button id="submit" name="submit" type="submit" class="btn btn-warning" onclick="return confirm('Comfirm to submit?')">
                Submit
            </button>
        </form>
    </div>
@endsection

@section('script')

<script>
    function openForm(evt, formName) {
    var i, tabcontent, tablinks;
  
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
    }
  
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
  
        document.getElementById(formName).style.display = "block";
        evt.currentTarget.className += " active";
    }
</script>


@endsection
