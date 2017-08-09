<?php
  session_start();
  #if session exist
  if (isset($_SESSION["admin_email"]) &&  isset($_SESSION["admin_password"]) ) {
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

    <link rel="stylesheet" href="../../assets/fa/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../assets/materialize/css/materialize.min.css">
    <link rel="stylesheet" href="../../assets/materialize/css/myStyle.css">
    <link rel="stylesheet" href="../../assets/materialize/css/animate.css">
    <link rel="stylesheet" href="../../assets/sweetalert2/sweetalert2.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <style>
      html {
        height: 100% !important;
        background-repeat: no-repeat !important;
        background-attachment: fixed;
        background-image: linear-gradient(to top, #0ba360 0%, #3cba92 100%);
      }

      /* label focus color */

      .input-field input:focus+label {
        color: white !important;
      }
      /* label underline focus color */

      .row .input-field input:focus {
        border-bottom: 1px solid white !important;
        box-shadow: 0 1px 0 0 white !important
      }

      label {
        color: white !important;
      }

      input {
        border-bottom: 1px solid white !important;
        box-shadow: 0 1px 0 0 white !important;
        color: white !important;
      }

      select {
        border-style: none !important;
        color: white !important;
        "

      }

      option {
        background-color: #0ba360 !important;
        color: white !important;
      }
    </style>
  </head>

  <body><br><br><br><br>

    <!--Sign Up form-->



    <div class="container">
      <div class="row">
        <div class="col s12 m10 offset-m1">
          <div class=" transparent">
            <div class="card-content">
              <h4 class="white-text">Sign Up</h4>
              <form id="frm_signup">

                <div class="row">
                  <div class="input-field col s12 m4 l4">
                    <input name="fn" id="fn" type="text">
                    <label for="fn">First Name</label>
                  </div>

                  <div class="input-field col s12 m4 l4">
                    <input name="mn" id="mn" type="text">
                    <label for="mn">Middle Name</label>
                  </div>

                  <div class="input-field col s12 m4 l4">
                    <input name="ln" id="ln" type="text">
                    <label for="ln">Last Name</label>
                  </div>



                </div>
                <!--end of row-->

                <div class="row">
                  <div class="input-field col s12 m4 l4">
                    <input name="email" id="email" type="text">
                    <label for="email">Email</label>
                    <div id="error_email">
                      <small class='right val red-text hide'>Email address already exist</small>
                    </div>
                  </div>

                  <div class="input-field col s12 m4 l4">
                    <input name="password" id="password" type="password">
                    <label for="password">Password</label>
                  </div>

                  <div class="input-field col s12 m4 l4">
                    <input name="rpassword" id="rpassword" type="password">
                    <label for="rpassword">Re-enter Password</label>
                  </div>

                </div>
                <!--end of row-->

                <div class="row">

                  <div class="input-field col s12 m3 l3">
                    <label class="active white-text">Gender</label>
                    <select name="gender" class="transparent browser-default">
                      <option disabled selected>Select Gender</option>
                      <option value="Male">Male</option>
                      <option value="Female">Female</option>
                    </select>
                  </div>
                  <!--end of gender-->

                  <div class="input-field col s12 m3 l3">
                    <input name="mobile" id="mobile" type="number">
                    <label for="mobile">Contact Number</label>
                  </div>

                  <div class="input-field col s12 m3 l3">
                    <label class="active">Department</label>
                    <select name="department" class="transparent browser-default" id="select_department">
                      <!--content from database-->
                    </select>
                  </div>

                  <div class="input-field col s12 m3 l3">
                    <label  class="active">Position</label>
                    <select name="title" class="transparent browser-default" id="select_position">
                      <!--content from database-->
                    </select>
                  </div>

                </div>
                <!--end of row-->



            </div><br><br>
            <!--end of card-content-->

            <div class="card-action">
              <a href="index.php" class="btn waves-effect transparent z-depth-4">Login</a>
              <button type="button" class="btn waves-effect right transparent z-depth-4" id="btn_submit">Submit</button>
              <br><br>
            </div>
            <!--end of card-action-->

            </form>
            <!--end of form-->
          </div>
          <!--end of card-->
        </div>
        <!--end of col s12 m10 offset-m1-->
      </div>
      <!--end of row-->
    </div>
    <!--end of container-->




  </body>

  <script src="../../assets/jquery/jquery.min.js" charset="utf-8"></script>
  <script src="../../assets/jquery/jquery.validate.min.js" charset="utf-8"></script>
  <script src="../../assets/jquery/jquery.additionalMethod.min.js" charset="utf-8"></script>
  <script src="../../assets/materialize/js/materialize.min.js" charset="utf-8"></script>
  <script src="../../assets/signaturePad/signature_pad.js" charset="utf-8"></script>
  <script src="../../assets/sweetalert2/sweetalert2.min.js" charset="utf-8"></script>
  <script src="../../controller/admin/signup.js" charset="utf-8"></script>


  </html>