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
   <script src="../../controller/admin/fetch_admin_notif.js" charset="utf-8"></script>
<script src="../../controller/admin/myPhoto.js" charset="utf-8"></script>


  </html>