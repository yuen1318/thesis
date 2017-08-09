<?php
  session_start();
  require 'session.php';
  require '../../model/dbConfig.php';
  #get the template id from url
  $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
  $validURL = str_replace("&","&amp;",$url);
  $tmp_id = parse_url($validURL, PHP_URL_QUERY);

  if($tmp_id == ""){
    $content = "";
  }#end of if

  else{
    $sql ="SELECT * FROM tbl_template WHERE tmp_id=?";
      if (!empty($dbConn)) {
        $stmt =  $dbConn->prepare($sql);
        $stmt->bindValue(1, $tmp_id);
        $stmt ->  execute();

        if ($stmt) {
          $row = $stmt->fetch(PDO::FETCH_ASSOC);
          $content = $row['content'];
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
    <link rel="stylesheet" href="../../assets/materialize/css/myStyle.css">
    <link rel="stylesheet" href="../../assets/sweetalert2/sweetalert2.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title></title>
  </head>

  <body class="grey lighten-3">



    <?php require 'nav.php'; ?>
    

    <form id="frm_use_efile">

      <div class="row" id="step1"><br>
        <div class="col s12 m12 l12 step1">

          <div class="col s12 m3 l3">
            <h4>Create Efile</h4>
          </div>
          <!--s12 m3 l3-->


          <div class="input-field col s12 m3 l3">
            <label class="active">Document Type</label>
            <select id="doc_type" name="doc_type" class="browser-default grey lighten-3">
               <option disabled selected>Select Document Type</option>
               <option value="private">Private</option>
               <option value="public">Public</option>
             </select>
          </div>
          <!--end of gender-->


          <div class="col s12 m4 l4">
            <div class="input-field active">
              <label for="">Efile Name</label>
              <input type="text" name="name" id="name">
            </div>
          </div>
          <!--col s12 m7 l7-->

          <div class="col s12 m2 l2"><br>
            <button type="button" class="waves-effect btn right green darken-2" id="btn_step1">Next</button>
          </div>
          <!--end of col s12 m2 l2-->

          <div class="col s12 m12 l12"><br>
            <textarea class="ckeditor" name="content" id="id_content">
               <?php echo $content; ?>
             </textarea><br>
<a href="#helper_modal" class="modal-trigger right btn btn-floating btn-large pulse green darken-2"><span class=" fa fa-question fa-lg"></span></a>
          </div>

          
          
           
          <!--end of col s12 m12 l12-->

        </div>
        <!--end of col s12 m12 l12-->
        
      </div>
      <!--end of row-->


      <div class="row">

        <div class="col s12 m12 l12 hide step2" id="list_user">
          <!--Table-->
          <div class="row">
            <div class="col s12 m6 l6">
              <h5>Send Efile</h5>
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
                <th>Recipient</th>
                <th>Email</th>
                <th colspan="2">Name</th>
                <th>Title</th>
                <th>Department</th>

              </tr>
            </thead>
            <!--end of thead-->

            <tbody class="list" id="tbl_user"></tbody>
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


          <div class="col s12 m9 l9">
            <label>List of Recepients</label>

            <textarea name="signatories" style="height:60px !important; resize:none;" id="target" readonly>
                 </textarea>
          </div>

          <div class="col s12 m3 l3 right-align"><br><br>
            <button type="button" class="waves-effect btn green darken-2" id="btn_step2_back">Back</button>
            <button type="button" class="waves-effect btn green darken-2 " id="btn_submit">Submit</button>

          </div>
        </div>
        <!--end of col s12-->
      </div>
      <!--end of row-->
    </form>

<!-- Modal Structure -->
        <div id="helper_modal" class="modal modal-fixed-footer">
          <div class="modal-content">
            <h4>Helpers</h4><br>

            <h5>Header</h5>
            <blockquote style="border-left-color:#388e3c !important;">
              for creating a header copy the code below :<br>
              <b>width: 100%; height: 200px; top: 0px !important; left: 0px !important ; z-index: -20 !important; position: absolute !important;</b>
              <br>
              and paste it in the Image Properties > Advanced > Style <br>
              <img src="img/1.png" alt="">
            </blockquote><br>

            <h5>Page Size: Letter</h5>
            <blockquote style="border-left-color:#388e3c !important;">
              In embbeding photos according to letter size, unlock the scaling of image, then set the<br>
              <b>Width : 100% <br> Height : 900</b><br>
              <img src="img/2.png" alt="">
            </blockquote><br>

            <h5>Page Size: Legal</h5>
            <blockquote style="border-left-color:#388e3c !important;">
              In embbeding photos according to legal size, unlock the scaling of image, then set the<br>
              <b>Width : 100% <br> Height : 1200</b><br>
              <img src="img/4.png" alt="">
            </blockquote><br>

            <h5>Page Size: A4</h5>
            <blockquote style="border-left-color:#388e3c !important;">
              In embbeding photos according to a4 size, unlock the scaling of image, then set the<br>
              <b>Width : 100% <br> Height : 1000</b><br>
              <img src="img/3.png" alt="">
            </blockquote><br>

          </div><!--end of modal content-->
          <div class="modal-footer">
            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">OK</a>
          </div><!--end of modal footer-->
        </div><!--end of modal-->

  </body>


  <script src="../../assets/jquery/jquery.min.js" charset="utf-8"></script>
  <script src="../../assets/jquery/jquery.validate.min.js" charset="utf-8"></script>
  <script src="../../assets/jquery/jquery.additionalMethod.min.js" charset="utf-8"></script>
  <script src="../../assets/materialize/js/materialize.min.js" charset="utf-8"></script>
  <script src="../../assets/ckeditor/ckeditor.js" charset="utf-8"></script>


  <script src="../../assets/sweetalert2/sweetalert2.min.js" charset="utf-8"></script>
  <script src="../../assets/listjs/list.min.js" charset="utf-8"></script>
  <script src="../../assets/listjs/list.pagination.min.js" charset="utf-8"></script>
  <script src="../../controller/user/fetch_user_notif.js" charset="utf-8"></script>
  <script src="../../controller/user/useEfile.js" charset="utf-8"></script>


  </html>