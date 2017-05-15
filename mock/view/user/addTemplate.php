<?php
  session_start();
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="..\..\assets\fa\css\font-awesome.min.css">
    <link rel="stylesheet" href="..\..\assets\materialize\css\materialize.min.css">
    <link rel="stylesheet" href="..\..\assets\materialize\css\myStyle.css">
    <link rel="stylesheet" href="..\..\assets\sweetalert2\sweetalert2.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title></title>
  </head>
  <body class="grey lighten-3">

    <?php require 'nav.php'; ?>

    <div class="row">

      <form id="frm_add_template">

        <div class="col s12 m3 l3">
          <h4>Create Template</h4>
        </div>

        <div class="col s12 m7 l7">
          <div class="input-field">
            <label for="">Template Name</label>
            <input type="text" name="name" id="name">
          </div>
        </div>

        <div class="col s12 m2 l2"><br>
          <button type="button" class="waves-effect btn right green darken-2" id="btn_submit">Submit</button>
        </div>

        <div class="col s12 m12 l12 bgcolor"><br>
          <textarea class="tinymce" name="content" id="id_content"></textarea>
        </div>

      </form>


    </div>

  </body>

  <script src="..\..\assets\jquery\jquery.min.js" charset="utf-8"></script>
  <script src="..\..\assets\jquery\jquery.validate.min.js" charset="utf-8"></script>
  <script src="..\..\assets\jquery\jquery.additionalMethod.min.js" charset="utf-8"></script>
  <script src="..\..\assets\materialize\js\materialize.min.js" charset="utf-8"></script>

<script src="..\..\assets\tinymce\tinymce.min.js" charset="utf-8"></script>
  <script src="..\..\assets\sweetalert2\sweetalert2.min.js" charset="utf-8"></script>
  <script src="..\..\controller\user\fetch_notif.js" charset="utf-8"></script>
  <script src="..\..\controller\user\addTemplate.js" charset="utf-8"></script>

</html>
