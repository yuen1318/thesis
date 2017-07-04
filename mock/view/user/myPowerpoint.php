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
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title></title>
  </head>

  <body class="grey lighten-3">

    <?php require 'nav.php'; ?>

    <div class="row">

      <div class="col s12 m12 l12" id="list_my_powerpoint">
        <!--Table-->
        <div class="row">
          <div class="col s12 m6 l6">
            <h5>My Presentations</h5>
          </div>
          <div class="col s12 m6 l6">
            <label>Search </label>
            <input type="text" class="search">
          </div>
        </div>


        <table class="bordered centered responsive-table striped">
          <thead>
            <tr>
              <th class="hide">ID</th>
              <th>File ID</th>
              <th>File Type</th>
              <th>Name</th>
              <th>Signatories</th>
              <th>Created by</th>
              <th>Created on</th>
              <th>Published on</th>
              <th>Action</th>

            </tr>
          </thead>
          <!--end of thead-->

          <tbody class="list" id="tbl_my_powerpoint"></tbody>
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
        <a href="uploadPowerpoint.php" class="btn-floating btn-large green darken-2 btn tooltipped waves-effect fa fa-plus fa-lg"
          data-position="left" data-delay="50" data-tooltip="Upload Presentation"></a>
      </div>
    </div>

  </body>
  <script src="../../assets/jquery/jquery.min.js" charset="utf-8"></script>
  <script src="../../assets/materialize/js/materialize.min.js" charset="utf-8"></script>
  <script src="../../assets/listjs/list.min.js" charset="utf-8"></script>
  <script src="../../assets/listjs/list.pagination.min.js" charset="utf-8"></script>
  <script src="../../controller/user/fetch_user_notif.js" charset="utf-8"></script>
  <script src="../../controller/user/myPowerpoint.js" charset="utf-8"></script>

  </html>