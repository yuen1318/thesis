<?php
  session_start();
  require 'session.php';

 ?>

  <!DOCTYPE html>
  <html>

  <head>
    <meta charset="utf-8">

    <link rel="stylesheet" href="../../assets/fa/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../assets/materialize/css/materialize.min.css">
    <link rel="stylesheet" href="../../assets/materialize/css/myStyle.css">
    <link rel="stylesheet" href="../../assets/sweetalert2/sweetalert2.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title></title>
  </head>

  <body class="grey lighten-3">



    <?php require 'nav.php'; ?>

    <form id="frm_restore" enctype="multipart/form-data">

      <div class="row" id="step1"><br>
        <div class="col s12 m12 l12 step1">

          <div class="row">
            <div class="col s12 m6 l6">
              <h4>Restore Database</h4>
            </div>

            <div class="col s12 m6 l6">
              <h6 class="red-text right">Warning do not restore files unless its necessary</h6>
            </div>

          </div>


          <div class="row">

            <div class="col s12 m6 l6">
              <div class="file-field input-field">
                <div class="btn green darken-2">
                  <icon class="fa fa-upload fa-lg"></icon>
                  <span> File</span>
                  <input type="file" name="restore" id="restore">
                </div>
                <div class="file-path-wrapper">
                  <input class="file-path validate" type="text" name="file_proxy" id="file_proxy" placeholder=".sql">
                </div>
              </div>
            </div>
            <!--col s12 m7 l7-->



            <div class="col s12 m6 l6"><br>
              <button type="button" class="waves-effect btn right green darken-2" id="btn_send">Next</button>
            </div>
            <!--end of col s12 m2 l2-->

          </div>
          <!--end of row-->




        </div>
        <!--end of col s12 m12 l12-->
      </div>
      <!--end of row-->
   </form>

    

  </body>


  <script src="../../assets/jquery/jquery.min.js" charset="utf-8"></script>
  <script src="../../assets/jquery/jquery.validate.min.js" charset="utf-8"></script>
  <script src="../../assets/jquery/jquery.additionalMethod.min.js" charset="utf-8"></script>
  <script src="../../assets/materialize/js/materialize.min.js" charset="utf-8"></script>

  <script src="../../assets/sweetalert2/sweetalert2.min.js" charset="utf-8"></script>
    <script src="../../controller/admin/fetch_admin_notif.js" charset="utf-8"></script>
  <script charset="utf-8">
   $(document).ready(function() {

   
     //disable enter key
     $('.input-field').keypress(function(event) {
         if (event.keyCode == 13) {
             event.preventDefault();
         }
     });


     //validate step 1
     $('#btn_send').on('click', function() { //validate on btn click

         if ($('#file_proxy').valid()) {
             var file_name = $('#restore').val();
             var file_extension = file_name.split('.')[1];
             var final_extension = file_extension.toLowerCase();

             if (final_extension == "sql") {

                alert("ok");
             } //end of if
             else {
                 swal({
                     title: 'Error',
                     text: "note: Document type must not be empty and only sql extensions are allowed",
                     type: 'error',
                     confirmButtonText: 'Ok',
                     confirmButtonClass: 'btn waves-effect green darken-2',
                     buttonsStyling: false
                 }); //end of swal
             } //end of else

         } else {
             swal({
                 title: 'Error',
                 text: "note: Document type must not be empty and only sql extensions are allowed",
                 type: 'error',
                 confirmButtonText: 'Ok',
                 confirmButtonClass: 'btn waves-effect green darken-2',
                 buttonsStyling: false
             }); //end of swal
         } //end of else
     }); //end of btn click

     


     $("#frm_restore").validate({ //form validation
         rules: {
             file_proxy: {
                 required: true
             }
         }, //end of rules
         messages: {
             file_proxy: {
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

 }); //end of document.ready

 </script>

  </html>