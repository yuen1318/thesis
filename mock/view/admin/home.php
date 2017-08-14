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
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  </head>
  <body class="grey lighten-3">

      <?php require 'nav.php'; ?>
    <div class="container">
      <div class="row">

        <div class="col s12 m12 l12" id="list_newsfeed">
          <!--Table-->
          <div class="row">
            <div class="col s12 m8 l8">
              <h5>Activity Log</h5>
            </div>
            <div class="col s12 m4 l4">
              <label>Search </label>
              <input type="text" class="search">
            </div>
          </div>

          <div class="row">
            <div class="col s12 m12 l12">
              <ul class="list collection" id="newsfeed"></ul>

              <ul class="pagination center"></ul>
            </div>
          </div>



        </div>
        <!--end of col s12-->

      </div>
      <!--end of row-->
    </div>
    <!--end of container-->


  </body>

  <script src="../../assets/jquery/jquery.min.js" charset="utf-8"></script>
  <script src="../../assets/materialize/js/materialize.min.js" charset="utf-8"></script>
  <script src="../../assets/listjs/list.min.js" charset="utf-8"></script>
  <script src="../../assets/listjs/list.pagination.min.js" charset="utf-8"></script>
  <script src="../../controller/admin/fetch_admin_notif.js" charset="utf-8"></script>
  <script src="../../controller/admin/home.js" charset="utf-8"></script>


</html>
