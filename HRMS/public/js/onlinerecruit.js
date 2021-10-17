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


$(document).ready(function(){
  $('.search_select_box select').selectpicker();
})


(function() {
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
})()
