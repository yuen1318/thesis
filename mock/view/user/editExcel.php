<?php
  session_start();
  require 'session.php';
  require '..\..\model\dbConfig.php';
  #get the template id from url
  $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
  $validURL = str_replace("&","&amp;",$url);
  $file_id = parse_url($validURL, PHP_URL_QUERY);

  if($file_id == ""){
    $content = "";
  }#end of if

  else{
    $sql ="SELECT * FROM tbl_file WHERE file_id=?";
      if (!empty($dbConn)) {
        $stmt =  $dbConn->prepare($sql);
        $stmt->bindValue(1, $file_id);
        $stmt ->  execute();

        if ($stmt) {
          $row = $stmt->fetch(PDO::FETCH_ASSOC);

          $name =  $row['orig_name'];
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
        <h5>Edit Spreadsheet : <?php echo $name;?> </h5>
      </div><!--end of col s12 m12 l12-->

      <div class="col s12 m6 l6">
        <h5 class="center">Document ID: <?php echo $file_id;?> </h5>
      </div><!--end of col s12 m12 l12-->

     </div><!--end of row-->


     <div class="row" id="step1"><br>
       <div class="col s12 m12 l12 step1" >

         <div class="row">
           <div class="col s12 m12 l12">
             <h4>Upload Spreadsheet</h4>
           </div><!--s12 m3 l3-->
         </div>


         <div class="row">



           <div class="col s12 m4 l4">
             <div class="file-field input-field">
                <div class="btn green darken-2">
                  <icon class="fa fa-upload fa-lg"></icon>
                  <span> File</span>
                  <input type="file" name="excel" id="excel">
                </div>
                <div class="file-path-wrapper">
                  <input class="file-path validate" type="text" name="file_proxy" id="file_proxy" placeholder=".xlsx, .xlsm, xlsx, .xltx, .xltm">
                </div>
              </div>
           </div><!--col s12 m7 l7-->



           <div class="col s12 m2 l2"><br>
             <button type="button" class="waves-effect btn right green darken-2" id="btn_step1">Next</button>
           </div><!--end of col s12 m2 l2-->

         </div><!--end of row-->




         </div><!--end of col s12 m12 l12-->
     </div><!--end of row-->


   </body>

   <script src="..\..\assets\jquery\jquery.min.js" charset="utf-8"></script>
   <script src="..\..\assets\materialize\js\materialize.min.js" charset="utf-8"></script>
   <script src="..\..\assets\sweetalert2\sweetalert2.min.js" charset="utf-8"></script>
   <script src="..\..\controller\user\fetch_user_notif.js" charset="utf-8"></script>
   <script type="text/javascript">
   $(document).ready(function(){

    $('.button-collapse').sideNav({menuWidth: 255});

    $(document).on('click', '#btn_resend', function() {

      var ckeditor_content = CKEDITOR.instances.id_content.getData();
      $("#id_content").val(ckeditor_content);
      var ckeditor_content_length = ckeditor_content.length;

      if (  ckeditor_content_length < 1 ) {//validate textarea//check if textarea is empty or containes whitespaces
        swal({
        title: 'Error',
        text: "note: efile cannot be empty",
        type: 'error',
        confirmButtonText: 'Ok',
        confirmButtonClass: 'btn waves-effect green darken-2',
        buttonsStyling: false
        });//end of swal
      }

      else{
        var ckeditor_content = CKEDITOR.instances.id_content.getData();
        $("#id_content").val(ckeditor_content);
       edit_efile("../../model/tbl_efile/update/edit_efile.php","#frm_edit_efile");
      }//end of else
     });//end of onclick

   });//end of document.ready



////////////////Functions//////////////////////

    function edit_efile(model_url,form_name){
      $.ajax({
        url:  model_url,
        method:"POST",
        data: $(form_name).serialize(),
        dataType:"text",

        success:function(Result){
          if(Result == "error"){
              Materialize.toast("Sorry an error occured", 8000, 'red');
          }
          else if(Result == "success") {
            swal({
            title: 'Success',
            text: "Efile edit and resend",
            type: 'success',
            confirmButtonText: 'Ok',
            confirmButtonClass: 'btn waves-effect green darken-2',
            buttonsStyling: false
            });//end of swal
          }
        },//end of success function
      });//end of ajax
    }//end of delete_template

   </script>
 </html>
