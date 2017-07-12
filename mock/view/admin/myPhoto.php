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
     <div class="row">

      <div class="col s12 m12 l12" id="list_my_photo">
        <!--Table-->
        <div class="row">
          <div class="col s12 m6 l6">
            <h5>My Photos</h5>
          </div>
          <div class="col s12 m6 l6">
            <label>Search </label>
            <input type="text" class="search">
          </div>
        </div>


        <table class="bordered centered responsive-table striped">
          <thead>
            <tr>
              <th class="hide">Num</th>
              <th colspan="2">Photo ID</th>
              <th>Photo Name</th>
              <th>Created on</th>
              <th>Action</th>

            </tr>
          </thead>
          <!--end of thead-->

          <tbody class="list" id="tbl_my_photo"></tbody>
          <!--end of tbody-->
        </table>
        <!--end of table-->

        <tfoot>
          <tr>
            <td>
              <ul class="pagination center"></ul>
            </td>
          </tr>
        </tfoot>
        <!--end of tfoot-->
      </div>
      <!--end of col s12-->

    </div>
    <!--end of row-->



    <div class="row">
      <div class="fixed-action-btn vertical">
        <a href="#upload_photo_modal" class="modal-trigger btn-floating btn-large green darken-2 btn tooltipped waves-effect fa fa-plus fa-lg"
          data-position="left" data-delay="50" data-tooltip="Upload Photo"></a>
      </div>
    </div>

    <form id="frm_upload_photo">
      <div class="modal" id="upload_photo_modal">
        <div class="modal-content">

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
          <button type="submit" class="btn waves-effect modal-action modal-close green darken-2" id="btn_upload_photo">Upload</button>
        </div>
      </div>
      <!--end of modal-->
    </form>

    <a href="#delete_photo_modal" class="hide btn modal-trigger trgr_delete_photo ">activedel</a>
    <form id="frm_delete_photo">
      <div class="modal" id="delete_photo_modal">
        <div class="modal-content">
          <h5 class="center">Are you sure you want to delete this photo?</h5><br>

          <div class="row hide">
            <div class="col s4">
              <input type="text" name="delete_id" id="delete_id">
            </div>
          </div>

        </div>
        <!--end of modal-content-->
        <div class="modal-footer">
          <button type="button" class="btn waves-effect modal-action modal-close green darken-2" id="btn_delete_photo">Delete</button>
        </div>
      </div>
      <!--end of modal-->
    </form>

  </body>
  <script src="../../assets/sweetalert2/sweetalert2.min.js" charset="utf-8"></script>
  <script src="../../assets/jquery/jquery.min.js" charset="utf-8"></script>
  <script src="../../assets/materialize/js/materialize.min.js" charset="utf-8"></script>
  <script src="../../assets/listjs/list.min.js" charset="utf-8"></script>
  <script src="../../assets/listjs/list.pagination.min.js" charset="utf-8"></script>
   <script>
        $(document).ready(function () {
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
          //get photos
          select_my_photo("../../model/tbl_photo/select/select_my_photo.php", "#tbl_my_photo");

               //copy img url
          $(document).on('click', '.btn_copy_img', function () {
            var pathdb = $(this).attr('data-photo-path');
            var path = pathdb.replace('../../', '');
            var host = window.location.host + "/";
            final = host + path;  
               swal({
              title: 'Image url',
              input: 'text',
              inputValue: final,
              type: 'success',
              confirmButtonText: 'Ok',
              confirmButtonClass: 'btn waves-effect green darken-2',
              buttonsStyling: false
            })
          }); //end of onclick



          $(document).on('click', '.delete_photo', function () {
            //bind html5 data attributes to variables
            var delete_id = $(this).attr('data-delete-photo-id');
            //set values to id
            $('#delete_id').val(delete_id);
            //show modal
            $('.trgr_delete_photo').trigger('click');
          }); //end of onclick


          $('#btn_delete_photo').on('click', function (event) {
            delete_photo("../../model/tbl_photo/delete/delete_photo.php", "#frm_delete_photo");
          }); //end of onclick



          $('#frm_upload_photo').on('submit', function (e) { //validate on btn click
            e.preventDefault();

            var file_name = $('.file-path').val();
            var file_extension = file_name.split('.')[1];

            if (file_extension.toLowerCase() == 'jpg' || file_extension.toLowerCase() == 'jpeg'|| file_extension.toLowerCase() == 'png' ) {
              $.ajax({
                url: "../../model/tbl_photo/insert/upload_photo.php",
                method: "POST",
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function (Result) {
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
                    Materialize.toast("Photo successfully uploaded", 8000, 'green darken-2');
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
                }, //end of success function

                complete: function () {
                  select_my_photo("../../model/tbl_photo/select/select_my_photo.php", "#tbl_my_photo");
                }

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
        }); //end of document.ready

        //////////////////////Functions///////////////////////
        function select_my_photo(model_url, html_class_OR_id) {
          $.ajax({
            url: model_url,
            method: "GET",
            success: function (Result) {
              //push the result on id or class
              $(html_class_OR_id).html(Result);
            }, //end of success function
            complete: function () {
              //initialize pagination after data loaded
              $('.materialboxed').materialbox();
              var monkeyList = new List('list_my_photo', {
                valueNames: ['photo_id', 'photo_name', 'co'],
                page: 8,
                plugins: [ListPagination({})]
              });
            } //end of complete function
          }) //end of ajax
        } //end of select_my_photo

        function delete_photo(model_url, form_name) {
          $.ajax({
            url: model_url,
            method: "POST",
            data: $(form_name).serialize(),
            dataType: "text",
            success: function (Result) {
              if (Result == "error") {
                Materialize.toast("Sorry an error occured", 8000, 'red');
              } else if (Result == "success") {
                Materialize.toast("Photo successfully deleted", 8000, 'green darken-2');
              }
            }, //end of success function
            complete: function () {
              select_my_photo("../../model/tbl_photo/select/select_my_photo.php", "#tbl_my_photo");
            } //end of complete function
          }) //end of ajax
        } //end of delete_photo
   </script>

  </html>