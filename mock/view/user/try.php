<?php
  session_start();
  require '..\..\model\dbConfig.php';

$doc_id= "efile_591191674221e9.24317353";
    $sql ="SELECT * FROM tbl_efile WHERE doc_id=?";
      if (!empty($dbConn)) {
        $stmt =  $dbConn->prepare($sql);
        $stmt->bindValue(1, $doc_id);
        $stmt ->  execute();

        if ($stmt) {
          $row = $stmt->fetch(PDO::FETCH_ASSOC);
          $final_content = $row['final_content'];

        }#end of if

      }

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



     <div class="row" >

       <div class="col s12 m12 l12">
         <textarea class="tinymce" id="asd">
            <?php echo $final_content; ?>
          </textarea>
      </div><!--end of col s12 m12 l12-->

     </div><!--end of row-->




   </body>

   <script src="..\..\assets\jquery\jquery.min.js" charset="utf-8"></script>
   <script src="..\..\assets\materialize\js\materialize.min.js" charset="utf-8"></script>
   <script src="..\..\assets\tinymce\jquery.tinymce.min.js" charset="utf-8"></script>
   <script src="..\..\assets\tinymce\tinymce.min.js" charset="utf-8"></script>

   <script type="text/javascript">
   $(document).ready(function(){

    $('.button-collapse').sideNav({menuWidth: 255});

    //make tinymce editor readonly mode
    tinymce.activeEditor.setMode('readonly');
   });//end of document.readyt

   //tinymce initialization
   tinymce.init({
     selector:"textarea.tinymce",
       height: 670,
       theme: 'modern',
       save_enablewhendirty: true,
       menubar: false,

       plugins: [
         ' preview print',
       ],

       toolbar: 'preview print',
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



   </script>
 </html>
