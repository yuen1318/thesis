<?php
  session_start();
  #if session exist
  if (isset($_SESSION["user_email"]) &&  isset($_SESSION["user_password"]) ) {
    header("Location:view/user/index.php");
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
    <link rel="stylesheet" href="assets/fa/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/materialize/css/materialize.min.css">
    <link rel="stylesheet" href="assets/materialize/css/myStyle.css">
    <link rel="stylesheet" href="assets/materialize/css/animate.css">
    <link rel="stylesheet" href="assets/sweetalert2/sweetalert2.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <style media="screen">
      .bg{
        background-image: url(Background.png) !important;
        background-repeat: no-repeat !important;
        background-position: center center !important;
        background-attachment: fixed !important;
        background-size: cover !important;
      }
    </style>
    </head>
  <body class="bg">
 
    <!--Sign Up form-->
  <br>
          <div class="container">
             <div class="row">
                <div class="col s12 m10 offset-m1">
                   <div class="card">
                      <div class="card-content">
                         <span class="card-title black-text">Sign Up</span>
                         <form id="frm_signup">

                            <div class="row">
                               <div class="input-field col s12 m4 l4">
                                  <input  name="fn" id="fn" type="text">
                                  <label for="fn">First Name</label>
                               </div>

                               <div class="input-field col s12 m4 l4">
                                  <input  name="mn" id="mn" type="text">
                                  <label for="mn">Middle Name</label>
                               </div>

                               <div class="input-field col s12 m4 l4">
                                  <input  name="ln" id="ln" type="text">
                                  <label for="ln">Last Name</label>
                               </div>



                            </div><!--end of row-->

                            <div class="row">
                              <div class="input-field col s12 m4 l4">
                                <input  name="email" id="email" type="text">
                                <label for="email">Email</label>
                                <div id="error_email">
                                  <small class='right val red-text hide'>Email address already exist</small>
                                </div>
                              </div>

                              <div class="input-field col s12 m4 l4">
                                <input  name="password" id="password" type="password">
                                <label for="password">Password</label>
                              </div>

                              <div class="input-field col s12 m4 l4">
                                <input  name="rpassword" id="rpassword" type="password">
                                <label for="rpassword">Re-enter Password</label>
                              </div>

                            </div><!--end of row-->

                            <div class="row">

                              <div class="input-field col s12 m3 l3">
                                <label class="active">Gender</label>
                                <select  name="gender"  class="browser-default">
                                  <option disabled selected>Select Gender</option>
                                  <option value="Male">Male</option>
                                  <option value="Female">Female</option>
                                </select>
                              </div><!--end of gender-->

                              <div class="input-field col s12 m3 l3">
                                <input  name="mobile" id="mobile" type="number">
                                <label for="mobile">Contact Number</label>
                              </div>

                              <div class="input-field col s12 m3 l3">
                                <label for="mobile" class="active">Department</label>
                                <select  name="department"  class="browser-default" id="select_department">
                                  <!--content from database-->
                                </select>
                              </div>

                              <div class="input-field col s12 m3 l3">
                                <label  class="active">Position</label>
                                <select name="title" class="transparent browser-default" id="select_position">
                                  <!--content from database-->
                                </select>
                              </div>

                            </div><!--end of row-->

                            <div class="row">
                              <h6 class="active">Digital Signature</h6>
                              <div class="col s12 m12 l12 grey lighten-2 " style="height:200px;" id="signature-pad">

                                <canvas></canvas>

                                <div class="row">
                                  <button type="button" id="btn_clear" class="btn waves-effect center fa fa-refresh fa-lg green darken-2" data-action="clear"></button>
                                  <button type="button" class="btn waves-effect center fa fa-floppy-o fa-lg green darken-2" data-action="save"></button>
                                </div>
                              </div><br><br><br><br>
                              <!--hidden input-->
                              <input id="siginput" type="text" name="siginput" style="visibility: hidden"/>
                            </div><!--end of row-->

                      </div><!--end of card-content-->

                      <div class="card-action">
                        <a href="index.php" class="btn waves-effect green darken-2">Login</a>
                        <button type="button" class="btn waves-effect right green darken-2" id="btn_submit" >Submit</button>
                        <br><br>
                      </div><!--end of card-action-->

                    </form><!--end of form-->
                  </div><!--end of card-->
                </div><!--end of col s12 m10 offset-m1-->
             </div><!--end of row-->
          </div><!--end of container-->
 



  </body>

  <script src="assets/jquery/jquery.min.js" charset="utf-8"></script>
  <script src="assets/jquery/jquery.validate.min.js" charset="utf-8"></script>
  <script src="assets/jquery/jquery.additionalMethod.min.js" charset="utf-8"></script>
  <script src="assets/materialize/js/materialize.min.js" charset="utf-8"></script>
  <script src="assets/signaturePad/signature_pad.js" charset="utf-8"></script>
  <script src="assets/sweetalert2/sweetalert2.min.js" charset="utf-8"></script>
  <script src="controller/signup.js" charset="utf-8"></script>




</html>
