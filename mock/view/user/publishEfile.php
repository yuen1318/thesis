<?php
  session_start();
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


     <div class="row" >
       <form id="frm_edit_efile">
         <div class="col s12 m12 l12">
           <input class="hide" type="text" name="doc_id" value="<?php echo $doc_id?>">
           <textarea class="tinymce" name="content" id="target">
              <?php echo $content; ?>
            </textarea>
        </div><!--end of col s12 m12 l12-->
       </form>


     </div><!--end of row-->

     <div class="row">
       <div class="col s12 m12 l12">
         <button  class="btn waves-effect green darken-2 right" id="btn_resend">Resend</button>
       </div>
      </div>



   </body>

   <script src="..\..\assets\jquery\jquery.min.js" charset="utf-8"></script>
   <script src="..\..\assets\materialize\js\materialize.min.js" charset="utf-8"></script>
   <script src="..\..\assets\tinymce\jquery.tinymce.min.js" charset="utf-8"></script>
   <script src="..\..\assets\tinymce\tinymce.min.js" charset="utf-8"></script>
   <script src="..\..\assets\sweetalert2\sweetalert2.min.js" charset="utf-8"></script>

   <script type="text/javascript">
   $(document).ready(function(){

    $('.button-collapse').sideNav({menuWidth: 255});

    $(document).on('click', '#btn_resend', function() {
      if ( !$.trim($("#target").val()) ){//check if textarea is empty or containes whitespaces
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
        tinymce.triggerSave();
       edit_efile("../../model/tbl_efile/update/edit_efile.php","#frm_edit_efile");
      }//end of else
     });//end of onclick

   });//end of document.ready


   //tinymce initialization
   tinymce.init({
     selector:"textarea.tinymce",
       height: 550,
       theme: 'modern',
       save_enablewhendirty: true,

       plugins: [
         'advlist autolink lists link image charmap  preview hr anchor pagebreak',
         'searchreplace wordcount visualblocks visualchars fullscreen',
         'insertdatetime  nonbreaking save table contextmenu directionality',
         'emoticons template paste textcolor colorpicker textpattern imagetools codesample   save'
       ],
       toolbar1: 'undo redo | insert  | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image preview media | forecolor backcolor',
       image_advtab: true,
       templates: [
         { title: 'Test template 1', content: 'Test 1' },
         { title: 'Test template 2', content: 'Test 2' }
       ],
       content_css: [
         'http://fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
         'http://www.tinymce.com/css/codepen.min.css'
       ]
   });


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