$(document).ready(function () {


  
    $('#btn_login').on('click', function () { //validate on btn click
      if ($("#frm_login").valid()) { //check if all field is valid
        auth_sudo("../../model/tbl_sudo/select/auth_sudo.php", "#frm_login");
      } else {
        $('.val').addClass('animated bounceIn');
        $('.val').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
          $('.val').removeClass('animated');
        });
      } //end of else
    }); //end of btn click


    $("#frm_login").validate({ //form validation
      rules: {
        email: {
          required: true,
          email: true
        },
        password: {
          required: true,
          nowhitespace: true
        }
      }, //end of rules

      messages: {
        email: {
          required: "<small class='right val red-text'>This field is required</small>",
          email: "<small class='right val red-text'>Must be a valid Email Address</small>"
        },
        password: {
          required: "<small class='right val red-text'>This field is required</small>",
          nowhitespace: "<small class='right val red-text'>White spaces are invalid</small>"
        }
      }, //end of messages

      errorElement: 'div',
      errorPlacement: function (error, element) {
        var placement = $(element).data('error');
        if (placement) {
          $(placement).append(error)
        } else {
          error.insertAfter(element);
        }
      } //end of errorElement
    }); //end of validate






  }); //end of document.ready

  ///////////////////////////////Functions/////////////////////////////////
  function auth_sudo(model_url, form_name) {
    $.ajax({
      type: "POST",
      url: model_url,
      data: $(form_name).serialize(),
      dataType: "text",
      success: function (Result ) {
        if (Result === "sudo") {
          location.href = "home.php";
        } else if (Result === "mali") {
          $("#error_login small").removeClass("hide");
        } //end of else
      }//end of success
    });

  } //end of auth_tbl_user
