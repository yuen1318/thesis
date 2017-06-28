$(document).ready(function(){
  //load content from db
  select_department("../../model/tbl_department/select/select_department.php", "#select_department");
  ///////////////////////////Signature Pad//////////////////////////////////
    var wrapper = document.getElementById("signature-pad"),
        clearButton = wrapper.querySelector("[data-action=clear]"),
        saveButton = wrapper.querySelector("[data-action=save]"),
        canvas = wrapper.querySelector("canvas"),
        signaturePad;

    // Adjust canvas coordinate space taking into account pixel ratio,
    // to make it look crisp on mobile devices.
    // This also causes canvas to be cleared.
    function resizeCanvas() {
        var ratio =  window.devicePixelRatio || 1;
        canvas.width = canvas.offsetWidth * ratio;
        canvas.height = canvas.offsetHeight * ratio;
        canvas.getContext("2d").scale(ratio, ratio);
    }

    window.onresize = resizeCanvas;
    resizeCanvas();
    signaturePad = new SignaturePad(canvas);
    clearButton.addEventListener("click", function (event) {
        signaturePad.clear();
        document.getElementById("siginput").value="";
    });

  var form = document.getElementById("sigform"),
  input = document.getElementById("siginput")

  saveButton.addEventListener("click", function (event) {
      if (signaturePad.isEmpty()) {
            swal({
              title: 'Error',
              text: "note: please provide a signature",
              type: 'error',
              confirmButtonText: 'Ok',
              confirmButtonClass: 'btn waves-effect green darken-2',
              buttonsStyling: false
            })
      }//end of if
      else {
        swal({
          title: 'Signature Selected',
          text: "note: this will not be saved unless you submit the form",
          type: 'success',
          confirmButtonText: 'Ok',
          confirmButtonClass: 'btn waves-effect green darken-2',
          buttonsStyling: false
        })
          input.value = signaturePad.toDataURL();
      }//end of else
  });//end of saveButton
  ///////////////////////////End of Signature Pad/////////////////////////////

  //////////////////////////Form Validation/////////////////////////////////

  $('#btn_submit').on('click', function() {//validate on btn click
   if ($("#frm_signup").valid()){//check if all field is valid
      insert_user("../../model/tbl_user/insert/signup_admin.php","#frm_signup");
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
      title: {required: true},
      siginput: {required: true}
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
      title: {required: "<small class='right val red-text'>This field is required</small>"},
      siginput: {required: "<small class='right val red-text'>This field is required</small>"}
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

  function insert_user(model_url,form_name){
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
