<?php
  session_start();
  require 'session.php';
  require '../../model/dbConfig.php';
  #get the template id from url
  $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
  $validURL = str_replace("&","&amp;",$url);
  $doc_id = parse_url($validURL, PHP_URL_QUERY);

  if($doc_id == ""){
    $content = "";
  }#end of if

  else{
    $sql ="SELECT * FROM tbl_efile WHERE doc_id=?";
      if (!empty($dbConn)) {
        $stmt =  $dbConn->prepare($sql);
        $stmt->bindValue(1, $doc_id);
        $stmt ->  execute();

        if ($stmt) {
          $row = $stmt->fetch(PDO::FETCH_ASSOC);
          $final_content = $row['final_content'];
          $name =  $row['name'];
        }#end of if

        else {
          echo "error";
        }#end of else

      }#end of if

      else {
        echo "error";
      }#end of else
  }#end of else

 ?>

  <!DOCTYPE html>
  <html>

  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../../assets/fa/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../assets/materialize/css/materialize.min.css">
    <link rel="stylesheet" href="../../assets/materialize/css/sudo.css">
    <link rel="stylesheet" href="../../assets/sweetalert2/sweetalert2.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title></title>
  </head>

  <body class="grey lighten-3">



    <?php require 'nav.php'; ?>


    <div class="row">
      <div class="col s12 m6 l6">
        <h5>Print Efile :
          <?php echo $name;?> </h5>
      </div>
      <!--end of col s12 m12 l12-->

      <div class="col s12 m6 l6">
        <h5 class="center">Document ID:
          <?php echo $doc_id;?> </h5>
      </div>
      <!--end of col s12 m12 l12-->

    </div>
    <!--end of row-->


    <div class="row">

      <div class="col s12 m12 l12">
        <textarea class="ckeditor" id="asd" readonly="true">
            <?php echo $final_content; ?>
        </textarea>
      </div>
      <!--end of col s12 m12 l12-->

    </div>
    <!--end of row-->




  </body>

  <script src="../../assets/jquery/jquery.min.js" charset="utf-8"></script>
  <script src="../../assets/materialize/js/materialize.min.js" charset="utf-8"></script>
  <script src="../../assets/ckeditor/ckeditor.js" charset="utf-8"></script>
  <script src="../../controller/sudo/fetch_sudo_notif.js" charset="utf-8"></script>
  </html>