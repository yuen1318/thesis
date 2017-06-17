<?php
  session_start();
  require 'session.php';
  require '..\..\model\dbConfig.php';
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
          $content = $row['content'];
          $name =  $row['name'];
          $signatures =  $row['signatures'];
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
      <div class="col s12 m6 l6">
        <h5>Edit Efile : <?php echo $name;?> </h5>
      </div><!--end of col s12 m12 l12-->

      <div class="col s12 m6 l6">
        <h5 class="center">Document ID: <?php echo $doc_id;?> </h5>
      </div><!--end of col s12 m12 l12-->

     </div><!--end of row-->

     <form id="frm_publish">

       <div class="row" id="tab1">

           <div class="col s12 m12 l12">
             <input class="hide" type="text" name="doc_id" value="<?php echo $doc_id?>">
             <textarea class="ckeditor" name="content" id="content" readonly="true">
                <?php echo $content; ?>
              </textarea>
          </div><!--end of col s12 m12 l12-->

          <div class="col s12 m12 l12"><br>
            <button  type="button" class="btn waves-effect green darken-2 right" id="btn_signatures">Arrange Signatures</button>
          </div>

       </div><!--end of row-->

       <div class="row hide" id="tab2">

        <div class="col s12 m12 l12">
           <textarea class="ckeditor" name="signatures" id="signatures">
              <?php echo $signatures; ?>
            </textarea>
        </div><!--end of col s12 m12 l12-->

        <div class="col s12 m6 l6 "><br>
          <button  type="button" class="btn waves-effect green darken-2 left" id="btn_back">View Content</button>
        </div>

        <div class="col s12 m6 l6"><br>
          <button  type="button" class="btn waves-effect green darken-2 right" id="btn_publish">Publish</button>
        </div>


       </div>

     </form>



   </body>

   <script src="..\..\assets\jquery\jquery.min.js" charset="utf-8"></script>
   <script src="..\..\assets\materialize\js\materialize.min.js" charset="utf-8"></script>
   <script src="..\..\assets\ckeditor\ckeditor.js" charset="utf-8"></script>
   <script src="..\..\assets\sweetalert2\sweetalert2.min.js" charset="utf-8"></script>
   <script src="..\..\controller\user\fetch_user_notif.js" charset="utf-8"></script>
   <script type="text/javascript">
   $(document).ready(function(){

    $('.button-collapse').sideNav({menuWidth: 255});


    $('#btn_signatures').on('click', function(event) {
      var content = CKEDITOR.instances.content.getData();
      $("#content").val(content);



      $("#tab2").removeClass("hide");
      $("#tab1").addClass("hide");
     });//end of onclick

    $('#btn_back').on('click', function(event) {
      $("#tab1").removeClass("hide");
      $("#tab2").addClass("hide");
    });//end of onclick


    $('#btn_publish').on('click', function(event) {
      var signatures = CKEDITOR.instances.signatures.getData();
      $("#signatures").val(signatures);

      publish_efile("../../model/tbl_efile/update/publish_efile.php","#frm_publish");
    });//end of onclick

   });//end of document.ready




////////////////Functions//////////////////////

    function publish_efile(model_url,form_name){
      $.ajax({
        url:  model_url,
        method:"POST",
        data: $(form_name).serialize(),
        dataType:"text",

        success:function(Result){
            swal({
            title: 'Success',
            text: "Efile successfully published",
            type: 'success',
            confirmButtonText: 'Ok',
            confirmButtonClass: 'btn waves-effect green darken-2',
            buttonsStyling: false
            });//end of swal

        },//end of success function

        error:function(Result){
          alert("Error");

        },//end of success function


      });//end of ajax
    }//end of delete_template

   </script>
 </html>
