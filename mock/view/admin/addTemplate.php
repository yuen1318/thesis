<?php
  session_start();
  require 'session.php';
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../../assets/fa/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../assets/materialize/css/animate.css">
    <link rel="stylesheet" href="../../assets/materialize/css/materialize.min.css">
    <link rel="stylesheet" href="../../assets/materialize/css/admin.css">
    <link rel="stylesheet" href="../../assets/sweetalert2/sweetalert2.min.css">
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
 
        <div class="input-field col s12 m3 l3 ">
          <label for="select_department" class="active">Department</label>
          <select  name="department"  class="browser-default grey lighten-3" id="select_department">
            <option value='<?php echo $_SESSION['admin_department'] ?>'><?php echo $_SESSION['admin_department'] ?></option>;
          </select>
        </div>


        <div class="col s12 m4 l4">
          <div class="input-field">
            <label for="">Template Name</label>
            <input type="text" name="name" id="name">
          </div>
        </div>

        <div class="col s12 m2 l2"><br>
          <button type="button" class="waves-effect btn right teal lighten-1" id="btn_submit">Submit</button>
        </div>

    
          <div class="col s12 m12 l12 bgcolor"><br>
            <textarea class="ckeditor" name="content" id="id_content"></textarea>
          </div> 
      </form>

    </div>

    <div class="row">
      <div class="col s12 m12 l12">
       <a href="#helper_modal" class="modal-trigger right btn btn-floating btn-large pulse teal lighten-1"><span class=" fa fa-question fa-lg"></span></a>
      </div>
    </div>


  

  <!-- Modal Structure -->
  <div id="helper_modal" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h4>Helpers</h4><br>

      <h5>Header</h5>
      <blockquote style="border-left-color:#26a69a !important;">
        for creating a header copy the code below :<br>
        <b>width: 100%; height: 200px; top: 0px !important; left: 0px !important ; z-index: -20 !important; position: absolute !important;</b>
        <br>
        and paste it in the Image Properties > Advanced > Style <br>
        <img src="img/1.png" alt="">
      </blockquote><br>

      <h5>Page Size: Letter</h5>
      <blockquote style="border-left-color:#26a69a !important;">
        In embbeding photos according to letter size, unlock the scaling of image, then set the<br>
        <b>Width : 100% <br> Height : 900</b><br>
        <img src="img/2.png" alt="">
       </blockquote><br>

      <h5>Page Size: Legal</h5>
      <blockquote style="border-left-color:#26a69a !important;">
        In embbeding photos according to legal size, unlock the scaling of image, then set the<br>
        <b>Width : 100% <br> Height : 1200</b><br>
        <img src="img/4.png" alt="">
       </blockquote><br>

      <h5>Page Size: A4</h5>
      <blockquote style="border-left-color:#26a69a !important;">
        In embbeding photos according to a4 size, unlock the scaling of image, then set the<br>
        <b>Width : 100% <br> Height : 1000</b><br>
        <img src="img/3.png" alt="">
       </blockquote><br>

    </div><!--end of modal content-->
    <div class="modal-footer">
      <a href="#!" class="modal-action modal-close waves-effect waves-teal btn-flat ">OK</a>
    </div><!--end of modal footer-->
  </div><!--end of modal-->
  </body>

  <script src="../../assets/jquery/jquery.min.js" charset="utf-8"></script>
  <script src="../../assets/jquery/jquery.validate.min.js" charset="utf-8"></script>
  <script src="../../assets/jquery/jquery.additionalMethod.min.js" charset="utf-8"></script>
  <script src="../../assets/materialize/js/materialize.min.js" charset="utf-8"></script>

  <script src="../../assets/ckeditor/ckeditor.js" charset="utf-8"></script>
  <script src="../../assets/sweetalert2/sweetalert2.min.js" charset="utf-8"></script>
  <script src="../../controller/user/fetch_user_notif.js" charset="utf-8"></script>
  <script src="../../controller/admin/fetch_admin_notif.js" charset="utf-8"></script>
 <script src="../../controller/admin/addTemplate.js" charset="utf-8"></script>

</html>
