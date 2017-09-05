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
  
  <div class="container">
    <h4 > List of Instructions</h4>

    <div class="row"><br>
       <div class"col s12 m12 l12">

        <ul class="collapsible popout" data-collapsible="accordion" id="list_instruction">
          
        </ul>

       </div>

    </div><!--end of row-->
  </div><!--end of container-->




  </body>
  <script src="../../assets/jquery/jquery.min.js" charset="utf-8"></script>
  <script src="../../assets/materialize/js/materialize.min.js" charset="utf-8"></script>
  <script src="../../assets/listjs/list.min.js" charset="utf-8"></script>
  <script src="../../assets/listjs/list.pagination.min.js" charset="utf-8"></script>
  <script src="../../controller/user/fetch_user_notif.js" charset="utf-8"></script>
  <script src="../../controller/user/instruction.js" charset="utf-8"></script>
 

  </html>