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
    <link rel="stylesheet" href="../../assets/materialize/css/myStyle.css">
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
            <?php echo $_SESSION["user_email"]?>
          </h5>
        </div>
      </div>

      <div class="row">

        <div class="col s12 m3 l3  ">
          <div class="card">
            <div class="card-content">
              <img class="responsive-img" src="../../DB/profile/<?php echo $_SESSION['user_photo']?>" alt="" width="200" height="150">
              <a href="#upload_img_modal" class="btn-floating halfway-fab waves-effect waves-light green darken-2  modal-trigger"><i class="fa fa-camera"></i></a>
              <img class="responsive-img" src="../../DB/signature/<?php echo $_SESSION['user_email']?>.png" alt="" width="150" height="80">
            </div>
          </div>
          <!--end of card-->
        </div>
        <!--end of "col s12 m6 l6 card-->

        <form id="frm_info">
          <div class="col s12 m9 l9  ">
            <div class="card">
              <div class="card-content">

                <div class="row">
                  <div class="col s12 m4 l4 input-field">
                    <input type="text" name="fn" value="<?php echo $_SESSION['user_fn']?>" id="fn">
                    <label class="active" for="fn">First Name</label>
                  </div>

                  <div class="col s12 m4 l4 input-field">
                    <input type="text" name="mn" value="<?php echo $_SESSION['user_mn']?>" id="mn">
                    <label class="active" for="mn">Middle Name</label>
                  </div>

                  <div class="col s12 m4 l4 input-field">
                    <input type="text" name="ln" value="<?php echo $_SESSION['user_ln']?>" id="ln">
                    <label class="active" for="ln">Last Name</label>
                  </div>

                </div>
                <!--end of div-->

                <div class="row">
                  <div class="col s12 m4 l4 input-field">
                    <input name="mobile" id="mobile" type="number" value="<?php echo $_SESSION['user_mobile']?>">
                    <label class="active" for="mobile">Contact No.</label>
                  </div>

                  <div class="col s12 m4 l4 input-field">
                    <label for="department" class="active">Department</label>
                    <select name="department" class="browser-default" id="select_department">
                        <!--content from database-->
                      </select>
                  </div>

                  <div class="col s12 m4 l4 input-field">
                    <input type="text" name="title" value="<?php echo $_SESSION['user_title']?>" id="title">
                    <label class="active" for="title">Title</label>
                  </div>

                </div>
                <!--end of div-->

                <button type="button" class="btn-floating halfway-fab waves-effect waves-light green darken-2 fa fa-send fa-lg " id="btn_frm_info"></button>
              </div>
              <!--end of card-content-->
            </div>
            <!--end of card-->
          </div>
          <!--end of "col s12 m6 l6 card-->
        </form>
        <!--end of frm_info-->

      </div>
      <!--end of row-->




      <div class="row">

        <div class="col s12 m12 l12 ">

          <form id="frm_signature">
            <div class="card">
              <div class="card-content  ">


                <div class="row">
                  <h6 class="active">Digital Signature</h6>
                  <div class="col s12 m12 l12 grey lighten-2 " style="height:200px;" id="signature-pad">

                    <canvas></canvas>

                    <div class="row">
                      <button type="button" id="btn_clear" class="btn waves-effect center fa fa-refresh fa-lg green darken-2" data-action="clear"></button>
                      <button type="button" class="btn waves-effect center fa fa-floppy-o fa-lg green darken-2" data-action="save"></button>
                    </div>
                  </div> b
                  <!--hidden input-->
                  <input id="siginput" type="text" name="siginput" style="visibility:hidden !important;" />
                </div>
                <!--end of row-->

                <button type="button" class="btn-floating halfway-fab waves-effect waves-light green darken-2 fa fa-send fa-lg " id="btn_frm_signature"></button>

              </div>
              <!--end of card-content-->
            </div>
            <!--end of card-->
          </form>
          <!--end of row-->

        </div>
        <!--end of "col s12 m6 l6 card-->

      </div>
      <!--end of row-->

      <div class="row">
        <div class="col s12 m12 l12">
          <a href="#change_password_modal" class="modal-trigger btn waves-effect green darken-2 right">Change Password</a>
        </div>
      </div>

    </div>
    <!--end of container-->


    <form id="frm_change_password">
      <div class="modal" id="change_password_modal">
        <div class="modal-content">
          <h5 class="center">Change Password</h5><br>

          <div class="row">
            <div class="col s12 m6 l6 input-field">
              <input type="password" name="password" id="password">
              <label for="password">Password</label>
            </div>

            <div class="col s12 m6 l6 input-field">
              <input type="password" name="rpassword" id="rpassword">
              <label for="rpassword">Re-enter Password</label>
            </div>

          </div>

        </div>
        <!--end of modal-content-->
        <div class="modal-footer">
          <button type="button" class="btn waves-effect   green darken-2 fa fa-send fa-lg" id="btn_frm_change_password"></button>
        </div>
      </div>
      <!--end of modal-->
    </form>

    <form id="frm_update_profile_picture" enctype="multipart/form-data" method="post" action="../../model/tbl_user/update/update_user_profile_picture.php">
      <div class="modal" id="upload_img_modal">
        <div class="modal-content">
          <h5 class="center">Change Profile Picture</h5><br>

          <div class="file-field input-field">
            <div class="btn green darken-2">
              <span class="fa fa-upload fa-lg"></span>
              <input type="file" name="uploaded_img">
            </div>
            <div class="file-path-wrapper">
              <input class="file-path" type="text" readonly placeholder=".jpg only">
            </div>
          </div>

        </div>
        <!--end of modal-content-->
        <div class="modal-footer">
          <button type="submit" class="btn waves-effect   green darken-2 fa fa-send fa-lg" id="btn_frm_update_profile_picture"></button>
        </div>
      </div>
      <!--end of modal-->
    </form>








  </body>

  <script src="../../assets/jquery/jquery.min.js" charset="utf-8"></script>
  <script src="../../assets/jquery/jquery.validate.min.js" charset="utf-8"></script>
  <script src="../../assets/jquery/jquery.additionalMethod.min.js" charset="utf-8"></script>
  <script src="../../assets/materialize/js/materialize.min.js" charset="utf-8"></script>
  <script src="../../assets/signaturePad/signature_pad.js" charset="utf-8"></script>
  <script src="../../assets/sweetalert2/sweetalert2.min.js" charset="utf-8"></script>
  <script src="../../controller/user/fetch_user_notif.js" charset="utf-8"></script>
  <script src="../../controller/user/myAccount.js" charset="utf-8"></script>



  </html>