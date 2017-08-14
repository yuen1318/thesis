<?php
session_start();
require 'session.php';
 ?>
  <!DOCTYPE html>
  <html>

  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="../../assets/fa/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../assets/materialize/css/materialize.min.css">
    <link rel="stylesheet" href="../../assets/materialize/css/admin.css">
    <link rel="stylesheet" href="../../assets/materialize/css/animate.css">
    <link rel="stylesheet" href="../../assets/sweetalert2/sweetalert2.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <style media="screen">
      @media only screen and (max-device-width: 480px) {
        img {
          width: 100% !important;
        }
      }
    </style>
  </head>

  <body class="grey lighten-3">
    <?php require 'nav.php'; ?>

    <div class="container">
      <div class="row">
        <div class="col s12 m6 l6">
          <h5>Account Settings</h5>
        </div>

        <div class="col s12 m6 l6">
          <h5 class="right">
            <?php echo $_SESSION["sudo_email"]?>
          </h5>
        </div>
      </div>

      <div class="row">

        <div class="col s12 m3 l3  ">
          <div class="card transparent ">
            <div class="card-content">
              <img class="responsive-img" src="img/sudo.png" alt="" width="200" height="150">
            </div>
          </div>
          <!--end of card-->

        </div>
        <!--end of col s12 m3 l3-->

        <div class="col s12 m9 l9">
          <form id="frm_change_password">
            <div class="row">
              <div class="col s12 m12 l12 input-field">
                <input type="password" name="password" id="password">
                <label for="password">Password</label>
              </div>

              <div class="col s12 m12 l12 input-field">
                <input type="password" name="rpassword" id="rpassword">
                <label for="rpassword">Re-enter Password</label>
              </div><br>

            <button class="right btn waves-effect blue-grey darken-3" type="button" id="btn_frm_change_password">Change Password</button>

            </div>
          </form>

        </div>

      </div>
      <!--end of row-->







  </body>

  <script src="../../assets/jquery/jquery.min.js" charset="utf-8"></script>
  <script src="../../assets/jquery/jquery.validate.min.js" charset="utf-8"></script>
  <script src="../../assets/jquery/jquery.additionalMethod.min.js" charset="utf-8"></script>
  <script src="../../assets/materialize/js/materialize.min.js" charset="utf-8"></script>
  <script src="../../assets/signaturePad/signature_pad.js" charset="utf-8"></script>
  <script src="../../assets/sweetalert2/sweetalert2.min.js" charset="utf-8"></script>
  <script src="../../controller/sudo/fetch_sudo_notif.js" charset="utf-8"></script>
  <script src="../../controller/sudo/myAccount.js" charset="utf-8"></script>


  </html>