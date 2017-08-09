$(document).ready(function(){

  //////////////////////////Form Validation/////////////////////////////////

  $('#btn_submit').on('click', function() {//validate on btn click
   if ($("#frm_signup").valid()){//check if all field is valid
      insert_sudo("../../model/tbl_sudo/insert/signup_sudo.php","#frm_signup");

   }
   else{
      $('.val').addClass('animated bounceIn');
      $('.val').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
      $('.val').removeClass('animated');
     });
   }//end of else
  });//end of btn click


  $("#frm_signup").validate({//form validation
    rules:{
      email: {required: true, email:  true},
      password: {required: true, nowhitespace:  true},
      rpassword: {required: true, nowhitespace:  true, equalTo: "#password"}
    },//end of rules
    messages: {
      email: {required: "<small class='right val red-text'>This field is required</small>",
              email:  "<small class='right val red-text'>Must be a valid Email Address</small>"},
      password: {required: "<small class='right val red-text'>This field is required</small>",
                nowhitespace:  "<small class='right val red-text'>White spaces are invalid</small>"},
      rpassword: {required: "<small class='right val red-text'>This field is required</small>",
                  nowhitespace:  "<small class='right val red-text'>White spaces are invalid</small>",
                  equalTo:  "<small class='right val red-text'>Password didn't match</small>"}
      },//end of messages

    errorElement : 'div',
    errorPlacement: function(error, element) {
      var placement = $(element).data('error');
      if (placement) {
        $(placement).append(error)
      } else {
        error.insertAfter(element);
      }
    }//end of errorElement
  });//end of validate
  ////////////////////////////////End of Form Validation/////////////////////
  });//end of document.ready


  ////////////////////////////Functions//////////////////////////


  function insert_sudo(model_url,form_name){
  $.ajax({
    url:  model_url,
    method:"POST",
    data: $(form_name).serialize(),
    dataType:"text",
    success:function(Result){
      if(Result == "error"){
        $("#error_email small").removeClass("hide");
      }
      else if(Result == "success") {
        $("#error_email small").addClass("hide");
        $(form_name)[0].reset();
        $('#btn_clear').trigger('click');
        Materialize.toast("Your Request is submitted, Frequently<br>check your email for updates", 8000, 'green darken-2');
      }
    }//end of success function

  })//end of ajax
  }//end of insert_user
