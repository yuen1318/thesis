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
            <?php echo $_SESSION["admin_email"]?>
          </h5>
        </div>
      </div>

      <div class="row">

        <div class="col s12 m3 l3  ">
          <div class="card">
            <div class="card-content">
              <img class="responsive-img" src="../../DB/profile/<?php echo $_SESSION['admin_photo']?>" alt="" width="200" height="150">
              <a href="#upload_img_modal" class="btn-floating halfway-fab waves-effect waves-light green darken-2  modal-trigger"><i class="fa fa-camera"></i></a>
              <img class="responsive-img" src="../../DB/signature/<?php echo $_SESSION['admin_email']?>.png" alt="" width="150" height="80">
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
                    <input type="text" name="fn" value="<?php echo $_SESSION['admin_fn']?>" id="fn">
                    <label class="active" for="fn">First Name</label>
                  </div>

                  <div class="col s12 m4 l4 input-field">
                    <input type="text" name="mn" value="<?php echo $_SESSION['admin_mn']?>" id="mn">
                    <label class="active" for="mn">Middle Name</label>
                  </div>

                  <div class="col s12 m4 l4 input-field">
                    <input type="text" name="ln" value="<?php echo $_SESSION['admin_ln']?>" id="ln">
                    <label class="active" for="ln">Last Name</label>
                  </div>

                </div>
                <!--end of div-->

                <div class="row">
                  <div class="col s12 m4 l4 input-field">
                    <input name="mobile" id="mobile" type="number" value="<?php echo $_SESSION['admin_mobile']?>">
                    <label class="active" for="mobile">Contact No.</label>
                  </div>


                  <div class="col s12 m4 l4 input-field">
                    <input type="text" name="title" value="<?php echo $_SESSION['admin_title']?>" id="title">
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




      <div class="row hide">

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

    <form id="frm_update_profile_picture" enctype="multipart/form-data" method="post" action="../../model/tbl_admin/update/update_admin_profile_picture.php">
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
    <script>
         $(document).ready(function() {
    //modal init
    $('.modal').modal();
    //sidenave init
    $('.button-collapse').sideNav({
        menuWidth: 255
    });
    //dropdown init
    $('.dropdown-button').dropdown({
        inDuration: 300,
        outDuration: 225,
        constrainWidth: false, // Does not change width of dropdown to that of the activator
        hover: true, // Activate on hover
        gutter: 0, // Spacing from edge
        belowOrigin: false, // Displays dropdown below the button
        alignment: 'left', // Displays dropdown with edge aligned to the left of button
        stopPropagation: false // Stops event propagation
    });
     //get department
   
     $('#btn_frm_info').on('click', function() { //validate on btn click
         if ($("#frm_info").valid()) { //check if all field is valid
             update_admin_info("../../model/tbl_admin/update/update_admin_info.php", "#frm_info");
         } else {
             $('.val').addClass('animated bounceIn');
             $('.val').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
                 $('.val').removeClass('animated');
             });
         } //end of else
     }); //end of btn click

     $('#frm_update_profile_picture').on('submit', function(e) { //validate on btn click
         e.preventDefault();

         var file_name = $('.file-path').val();
         var file_extension = file_name.split('.')[1];

         if (file_extension.toLowerCase() == 'jpg' || file_extension.toLowerCase() == 'jpeg') {
             $.ajax({
                     url: "../../model/tbl_admin/update/update_admin_profile_picture.php",
                     method: "POST",
                     data: new FormData(this),
                     contentType: false,
                     processData: false,
                     success: function(Result) {
                             if (Result == "big") {
                                 swal({
                                     title: 'Error',
                                     text: "File size to big, 2mb is the allowed size",
                                     type: 'error',
                                     confirmButtonText: 'Ok',
                                     confirmButtonClass: 'btn waves-effect green darken-2',
                                     buttonsStyling: false
                                 })
                             } //end of if
                             else if (Result == "success") {
                                 location.reload(true);
                             } //end of else if
                             else {
                                 swal({
                                     title: 'Error',
                                     text: "An error has occured",
                                     type: 'error',
                                     confirmButtonText: 'Ok',
                                     confirmButtonClass: 'btn waves-effect green darken-2',
                                     buttonsStyling: false
                                 })
                             } //end of else
                         } //end of success function
                 }) //end of ajax
         } //end of if
         else {
             swal({
                     title: 'Error',
                     text: "Only jpg files are allowed",
                     type: 'error',
                     confirmButtonText: 'Ok',
                     confirmButtonClass: 'btn waves-effect green darken-2',
                     buttonsStyling: false
                 }) //end of swal
         } //end of else
     }); //end of btn click

     $('#btn_frm_signature').on('click', function() { //validate on btn click
         if ($("#frm_signature").valid()) { //check if all field is valid
             update_admin_signature("../../model/tbl_admin/update/update_admin_signature.php", "#frm_signature");
         } else {
             $('.val').addClass('animated bounceIn');
             $('.val').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
                 $('.val').removeClass('animated');
             });
         } //end of else
     }); //end of btn click

     $('#btn_frm_change_password').on('click', function() { //validate on btn click
         if ($("#frm_change_password").valid()) { //check if all field is valid
             update_admin_password("../../model/tbl_admin/update/update_admin_password.php", "#frm_change_password");
         } else {
             $('.val').addClass('animated bounceIn');
             $('.val').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
                 $('.val').removeClass('animated');
             });
         } //end of else
     }); //end of btn click

     $("#frm_info").validate({ //form validation
         rules: {
             fn: {
                 required: true
             },
             ln: {
                 required: true
             },
             mn: {
                 required: true
             },
             mobile: {
                 required: true,
                 number: true
             },
             title: {
                 required: true
             },
         }, //end of rules
         messages: {
             fn: {
                 required: "<small class='right val red-text'>This field is required</small>"
             },
             ln: {
                 required: "<small class='right val red-text'>This field is required</small>"
             },
             mn: {
                 required: "<small class='right val red-text'>This field is required</small>"
             },
             mobile: {
                 required: "<small class='right val red-text'>This field is required</small>",
                 number: "<small class='right val red-text'>Numbers Only</small>"
             },
             title: {
                 required: "<small class='right val red-text'>This field is required</small>"
             }
         }, //end of messages
         errorElement: 'div',
         errorPlacement: function(error, element) {
                 var placement = $(element).data('error');
                 if (placement) {
                     $(placement).append(error)
                 } else {
                     error.insertAfter(element);
                 }
             } //end of errorElement
     }); //end of validate

     $("#frm_signature").validate({ //form validation
         rules: {
             siginput: {
                 required: true
             }
         }, //end of rules
         messages: {
             siginput: {
                 required: "<small class='right val red-text'>This field is required</small>"
             }
         }, //end of messages
         errorElement: 'div',
         errorPlacement: function(error, element) {
                 var placement = $(element).data('error');
                 if (placement) {
                     $(placement).append(error)
                 } else {
                     error.insertAfter(element);
                 }
             } //end of errorElement
     }); //end of validate

     $("#frm_change_password").validate({ //form validation
         rules: {
             email: {
                 required: true,
                 email: true
             },
             password: {
                 required: true,
                 nowhitespace: true
             },
             rpassword: {
                 required: true,
                 nowhitespace: true,
                 equalTo: "#password"
             }

         }, //end of rules
         messages: {
             password: {
                 required: "<small class='right val red-text'>This field is required</small>",
                 nowhitespace: "<small class='right val red-text'>White spaces are invalid</small>"
             },
             rpassword: {
                 required: "<small class='right val red-text'>This field is required</small>",
                 nowhitespace: "<small class='right val red-text'>White spaces are invalid</small>",
                 equalTo: "<small class='right val red-text'>Password didn't match</small>"
             }
         }, //end of messages
         errorElement: 'div',
         errorPlacement: function(error, element) {
                 var placement = $(element).data('error');
                 if (placement) {
                     $(placement).append(error)
                 } else {
                     error.insertAfter(element);
                 }
             } //end of errorElement
     }); //end of validate

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
         var ratio = window.devicePixelRatio || 1;
         canvas.width = canvas.offsetWidth * ratio;
         canvas.height = canvas.offsetHeight * ratio;
         canvas.getContext("2d").scale(ratio, ratio);
     }

     window.onresize = resizeCanvas;
     resizeCanvas();
     signaturePad = new SignaturePad(canvas);
     clearButton.addEventListener("click", function(event) {
         signaturePad.clear();
         document.getElementById("siginput").value = "";
     });

     var form = document.getElementById("sigform"),
         input = document.getElementById("siginput")

     saveButton.addEventListener("click", function(event) {
         if (signaturePad.isEmpty()) {
             swal({
                 title: 'Error',
                 text: "note: please provide a signature",
                 type: 'error',
                 confirmButtonText: 'Ok',
                 confirmButtonClass: 'btn waves-effect green darken-2',
                 buttonsStyling: false
             })
         } //end of if
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
         } //end of else
     }); //end of saveButton



 }); //end of document.ready

 //////////////Functions////////////
 function select_department(model_url, html_class_OR_id) {
     $.ajax({
             url: model_url,
             method: "GET",
             success: function(Result) {
                     //push the result on id or class
                     $(html_class_OR_id).html(Result);
                 } //end of success function
         }) //end of ajax
 } //end of select_department

 function update_admin_info(model_url, form_name) {
     $.ajax({
             url: model_url,
             method: "POST",
             data: $(form_name).serialize(),
             dataType: "text",
             success: function(Result) {
                     if (Result == "error") {
                         alert("error");
                     } else if (Result == "success") {
                         location.reload();
                     }
                 } //end of success function
         }) //end of ajax
 } //end of update_admin_info

 function update_admin_signature(model_url, form_name) {
     $.ajax({
             url: model_url,
             method: "POST",
             data: $(form_name).serialize(),
             dataType: "text",
             success: function(Result) {
                     if (Result == "error") {
                         alert("error");
                     } else if (Result == "success") {
                         location.reload(true);
                     }
                 } //end of success function
         }) //end of ajax
 } //end of update_admin_signature

 function update_admin_password(model_url, form_name) {
     $.ajax({
             url: model_url,
             method: "POST",
             data: $(form_name).serialize(),
             dataType: "text",
             success: function(Result) {
                     if (Result == "error") {
                         alert("error");
                     } else if (Result == "success") {
                         $('#change_password_modal').modal('close');
                         Materialize.toast("Password successfully changed", 8000, 'green darken-2');
                     }
                 } //end of success function
         }) //end of ajax
 } //end of update_admin_password
    </script>

  </html>