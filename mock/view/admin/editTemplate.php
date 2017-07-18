<?php
session_start();
require 'session.php';
require '../../model/dbConfig.php';
#get the template id from url
$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
$validURL = str_replace("&","&amp;",$url);
$tmp_id = parse_url($validURL, PHP_URL_QUERY);

$sql ="SELECT * FROM tbl_template WHERE tmp_id=?";
  if (!empty($dbConn)) {
    $stmt =  $dbConn->prepare($sql);
    $stmt->bindValue(1, $tmp_id);
    $stmt ->  execute();

    if ($stmt) {
      $row = $stmt->fetch(PDO::FETCH_ASSOC);
      $content = $row['content'];
      $name = $row['name'];
      $department = $row['department'];
    }#end of if

    else {
      echo "error";
    }#end of else

  }#end of if

  else {
    echo "error";
  }#end of else
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../../assets/fa/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../assets/materialize/css/materialize.min.css">
    <link rel="stylesheet" href="../../assets/materialize/css/myStyle.css">
    <link rel="stylesheet" href="../../assets/sweetalert2/sweetalert2.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title></title>
  </head>
  <body class="grey lighten-3">

    <?php require 'nav.php'; ?>

    <div class="row"><br>
      <div class="col s12 m12 l12">

        <form id="frm_edit_template">

          <div class="col s12 m3 l3">
            <h4>Edit Template</h4>
          </div>

          <div class="input-field col s12 m3 l3 ">
            <label for="select_department" class="active">Department</label>
            <select  name="department"  class="browser-default grey lighten-3" id="select_department">
              <!--content from database-->
            </select>
          </div>


          <div class="col s12 m4 l4">
            <div class="input-field active">
              <label for="">Template Name</label>
              <input type="text" name="name" id="name" value='<?php echo $name;?>' >
            </div>
          </div>

          <div class="col s12 m2 l2"><br>
            <button type="button" class="waves-effect btn right green darken-2" id="btn_submit">Submit</button>
          </div>

          <div class="col s12 m12 l12"><br>
            <textarea class="ckeditor" name="content" id="id_content">
              <?php echo $content; ?>
            </textarea>
          </div>

          <input type="text" name="tmp_id" id="tmp_id" class="hide" value='<?php echo $tmp_id;?>' >
        </form>


      </div>
    </div>
  </body>

  <script src="../../assets/jquery/jquery.min.js" charset="utf-8"></script>
  <script src="../../assets/jquery/jquery.validate.min.js" charset="utf-8"></script>
  <script src="../../assets/jquery/jquery.additionalMethod.min.js" charset="utf-8"></script>
  <script src="../../assets/materialize/js/materialize.min.js" charset="utf-8"></script>
  <script src="../../assets/ckeditor/ckeditor.js" charset="utf-8"></script>
  <script src="../../assets/sweetalert2/sweetalert2.min.js" charset="utf-8"></script>
  <script src="../../controller/user/fetch_user_notif.js" charset="utf-8"></script>
  <script src="../../controller/admin/fetch_admin_notif.js" charset="utf-8"></script>
<script src="../../controller/admin/editTemplate.js" charset="utf-8"></script>


</html>
