<?php
  session_start();
  #if session exist
  if (isset($_SESSION["admin_password"]) ) {
    header("Location:home.php");
  }

  #if session doesnt exist
  else {

  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="../../assets/fa/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../assets/materialize/css/materialize.min.css">
    <link rel="stylesheet" href="../../assets/materialize/css/animate.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <style media="screen">
      canvas {
       position: relative;
       left: 0;
       top: 0;
       width: 100%;
       height: 100%;
       border-radius: 4px;
       box-shadow: 0 0 5px rgba(0, 0, 0, 0.02) inset;
       }
    </style>

  </head>
  <body class="red">

    <!--Login Form-->
    <div class="valign-wrapper" style="width:100%;height:100%;position: absolute;" id="div_login">
      <div class="valign" style="width:100%;">
          <div class="container">
             <div class="row">
                <div class="col s12 m6 offset-m3">
                   <div class="card z-depth-4">
                      <div class="card-content">
                        <form id="frm_login">
                         <span class="card-title black-text">Sign In</span>

                            <div class="row">
                               <div class="input-field col s12 m12 l12">
                                  <input name="email" id="email" type="text">
                                  <label for="email">Email</label>
                               </div>
                            </div>

                            <div class="row">
                               <div class="input-field col s12 m12 l12">
                                  <input name="password" id="password" type="password">
                                  <label for="password">Password</label>
                               </div>
                            </div>

                            <div id="error_login">
                              <small class='right val red-text hide'>Invalid Email or Password</small>
                            </div>


                      </div>
                      <div class="card-action">
                        <a href="signup.php"  class="btn waves-effect left green darken-2">Sign Up</a>
                        <button type="button" class="btn waves-effect right green darken-2" id="btn_login">Log In</button>
                        <br><br>
                      </div>
                      </form>
                   </div>
                </div>
             </div>
          </div>
      </div>
    </div><!--end of valign wrapper-->



  </body>

  <script src="../../assets/jquery/jquery.min.js" charset="utf-8"></script>
  <script src="../../assets/jquery/jquery.validate.min.js" charset="utf-8"></script>
  <script src="../../assets/jquery/jquery.additionalMethod.min.js" charset="utf-8"></script>
  <script src="../../assets/materialize/js/materialize.min.js" charset="utf-8"></script>
  <script type="text/javascript">
  $(document).ready(function () {



    $('#btn_login').on('click', function () { //validate on btn click
      if ($("#frm_login").valid()) { //check if all field is valid


        $.ajax({
          url: "../../model/tbl_admin/select/auth_admin.php",
          method: "POST",
          data: $("#frm_login").serialize(),
          dataType: "text",
          success: function (Result) {
            if (Result == "success") {
              location.href = "home.php";
            } else if (Result == "mali") {
              $("#error_login small").removeClass("hide");
            } //end of else
            else {
              alert("puta");
            }
          } //end of success function
        }) //end of ajax


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
  function auth_admin(model_url, form_name) {
    $.ajax({
      url: model_url,
      method: "POST",
      data: $(form_name).serialize(),
      dataType: "text",
      success: function (Result) {
        if (Result == "success") {
          location.href = "home.php";
        } else if (Result == "mali") {
          $("#error_login small").removeClass("hide");
        } //end of else
 else{
   alert("ASD");
 }
      } //end of success function
    }) //end of ajax
  } //end of auth_tbl_user


  </script>




</html>
