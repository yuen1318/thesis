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
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <style>
      .bg {
       background-image: linear-gradient(to right, #f78ca0 0%, #f9748f 19%, #fd868c 60%, #fe9a8b 100%);background-image: linear-gradient(to top, #09203f 0%, #537895 100%);
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
      input {
        border-bottom: 1px solid white !important;
        box-shadow: 0 1px 0 0 white !important
      }
    </style>

  </head>

  <body>

    <!--Login Form-->
    <div class="bg valign-wrapper" style="width:100%;height:100%;position: absolute;" id="div_login">
      <div class="valign" style="width:100%;">
        <div class="container">
          <div class="row">
            <div class="col s12 m6 offset-m3">
              <div class="  transparent ">
                <div class="card-content">
                  <form id="frm_login">
                    <h5 class="center white-text">Electronic File Tracking System</h5><br><br>

                    <div class="row">
                      <div class="input-field col s12 m12 l12">
                        <input class="white-text" name="email" id="email" type="text">
                        <label class="white-text" for="email"><span class="fa fa-user-secret fa-lg"></span>&emsp;Email</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s12 m12 l12">
                        <input class="white-text" name="password" id="password" type="password">
                        <label class="white-text" for="password"><span class="fa fa-key fa-lg"></span>&emsp;Password</label>
                      </div>
                    </div>

                    <div id="error_login">
                      <small class='right val red-text hide'>Invalid Email or Password</small><br>
                    </div>


                </div>
                <div class="card-action">
                  <button type="button" class="btn waves-effect right transparent z-depth-3" id="btn_login">Log In</button>
                  <br><br>
                </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--end of valign wrapper-->



  </body>

  <script src="../../assets/jquery/jquery.min.js" charset="utf-8"></script>
  <script src="../../assets/jquery/jquery.validate.min.js" charset="utf-8"></script>
  <script src="../../assets/jquery/jquery.additionalMethod.min.js" charset="utf-8"></script>
  <script src="../../assets/materialize/js/materialize.min.js" charset="utf-8"></script>
  <script src="../../controller/sudo/index.js" charset="utf-8"></script>


  </html>