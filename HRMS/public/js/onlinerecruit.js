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

document.getElementById("defaultOpen").click();

// select search
$(document).ready(function(){
  $('.search_select_box select').selectpicker();
})

// validation form
/* const form = document.getElementById('form');
const applicantname = document.getElementById('name');
const noic = document.getElementById('noic');
const email = document.getElementById('email');
const zipcode = document.getElementById('zipcode');

form.addEventListener('submit', (e) => {
  e.preventDefault();

  checkInputs();
})

function checkInputs() {
  // need to get the value from the input first
  const applicantnameValue = applicantname.value.trim()
  const noicValue = noic.value.trim()
  const emailValue = email.value.trim()
  const sipcodeValue = zipcode.value.trim()

  if (applicantnameValue === "") {
    // show error
    // add error class
    setErrorFor(applicantname, 'Applicant name cannot be blank.');
  } else {
    // add success class
    setSuccessFor(applicantname, 'Applicant name cannot be blank.');
  }

  if (emailValue === "") {
    setEmailErrorFor(email, 'Email cannot be blank.');
  } else if (!isEmail(emailValue)) {
    setEmailErrorFor(email, 'Email is not valid.')
  } else {
    setEmailSuccessFor(email)
  }

}

function isEmail() {
  return /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email);
}

function setErrorFor(input, message) {
  const formGroup = input.parentElement;
  const small = formGroup.querySelector('small');

  small.innerText = message;

  formGroup.className = 'form-group col-md-12 error';
}

function setSuccessFor(input) {
  const formGroup = input.parentElement;
  formGroup.className = 'form-group col-md-12 success';
}

function setEmailErrorFor(input, message) {
  const formGroup = input.parentElement;
  const small = formGroup.querySelector('small');

  // add error message
  small.innerText = message;

  // add error class
  formGroup.className = 'form-group col-md-6 error';
}

function setEmailSuccessFor(input) {
  const formGroup = input.parentElement;
  formGroup.className = 'form-group col-md-6 success';
}
 */
// submit button
/* (function() {
  $('form input').keyup(function() {

      var empty = false;
      $('form input').each(function() {
          if ($(this).val() == '') {
              empty = true;
          }
      });

      if (empty) {
          $('#submit').attr('disabled', 'disabled'); 
      } else {
          $('#submit').removeAttr('disabled');
      }
  });
})() */