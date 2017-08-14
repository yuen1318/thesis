$(document).ready(function(){
  //load content from db
  select_department("../../model/tbl_department/select/select_department.php", "#select_department");
  
  $(document).on('change', '#select_department', function(){
    //when you select your department, postion will dynamically show
    var department_value = $(this).val();   
    select_position("../../model/tbl_position/select/select_position.php?" + department_value, "#select_position");
  });

  //////////////////////////Form Validation/////////////////////////////////
 
  $('#btn_submit').on('click', function() {//validate on btn click
   if ($("#frm_signup").valid()){//check if all field is valid
      insert_admin("../../model/tbl_admin/insert/signup_admin.php","#frm_signup");
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
      fn: {required: true},
      ln: {required: true},
      mn: {required: true},
      email: {required: true, email:  true},
      password: {required: true, nowhitespace:  true},
      rpassword: {required: true, nowhitespace:  true, equalTo: "#password"},
      gender: {required: true},
      mobile: {required: true, number: true},
      department: {required: true},
      title: {required: true}
    },//end of rules

    messages: {
      fn: {required: "<small class='right val red-text'>This field is required</small>"},
      ln: {required: "<small class='right val red-text'>This field is required</small>"},
      mn: {required: "<small class='right val red-text'>This field is required</small>"},
      email: {required: "<small class='right val red-text'>This field is required</small>",
              email:  "<small class='right val red-text'>Must be a valid Email Address</small>"},
      password: {required: "<small class='right val red-text'>This field is required</small>",
                nowhitespace:  "<small class='right val red-text'>White spaces are invalid</small>"},
      rpassword: {required: "<small class='right val red-text'>This field is required</small>",
                  nowhitespace:  "<small class='right val red-text'>White spaces are invalid</small>",
                  equalTo:  "<small class='right val red-text'>Password didn't match</small>"},
      gender: {required: "<small class='right val red-text'>This field is required</small>"},
      mobile: {required: "<small class='right val red-text'>This field is required</small>",
              number: "<small class='right val red-text'>Numbers Only</small>"},
      department: {required: "<small class='right val red-text'>This field is required</small>"},
      title: {required: "<small class='right val red-text'>This field is required</small>"}
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
  function select_department(model_url, html_class_OR_id){
  $.ajax({
      url:  model_url,
      method: "GET",
      success:function(Result){
      //push the result on id or class
        $(html_class_OR_id).html(Result);
      }
    });
  }//end of select_department

function select_position(model_url, html_class_OR_id){
  $.ajax({
      url:  model_url,
      method: "GET",
      success:function(Result){
      //push the result on id or class
        $(html_class_OR_id).html(Result);
      }
    });
  }//end of select_department

  function insert_admin(model_url,form_name){
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
        Materialize.toast("Your Request is submitted, Frequently<br>check your email for updates", 8000, 'teal lighten-1');
      }
    }//end of success function

  })//end of ajax
  }//end of insert_user
