<?php
session_start();
require 'session.php';
require '..\..\model\dbConfig.php';
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
    <link rel="stylesheet" href="..\..\assets\fa\css\font-awesome.min.css">
    <link rel="stylesheet" href="..\..\assets\materialize\css\materialize.min.css">
    <link rel="stylesheet" href="..\..\assets\materialize\css\myStyle.css">
    <link rel="stylesheet" href="..\..\assets\sweetalert2\sweetalert2.min.css">
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

          <div class="col s12 m7 l7">
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

  <script src="..\..\assets\jquery\jquery.min.js" charset="utf-8"></script>
  <script src="..\..\assets\jquery\jquery.validate.min.js" charset="utf-8"></script>
  <script src="..\..\assets\jquery\jquery.additionalMethod.min.js" charset="utf-8"></script>
  <script src="..\..\assets\materialize\js\materialize.min.js" charset="utf-8"></script>
  <script src="..\..\assets\ckeditor\ckeditor.js" charset="utf-8"></script>
  <script src="..\..\assets\sweetalert2\sweetalert2.min.js" charset="utf-8"></script>
  <script src="..\..\controller\user\fetch_notif.js" charset="utf-8"></script>
  <script type="text/javascript">
  $(document).ready(function(){
    $('.button-collapse').sideNav({menuWidth: 255});


    $('.input-field').keypress(function(event) {
        if (event.keyCode == 13) {
            event.preventDefault();
        }
    });

    $('#btn_submit').on('click', function() {//validate on btn click

      var ckeditor_content = CKEDITOR.instances.id_content.getData();
      $("#id_content").val(ckeditor_content);
      var ckeditor_content_length = ckeditor_content.length;

      if (  ckeditor_content_length < 1 ) {//validate textarea
        swal({//alert
        title: 'Error',
        text: "note: Template-Name and Template-Content is required",
        type: 'error',
        confirmButtonText: 'Ok',
        confirmButtonClass: 'btn waves-effect green darken-2',
        buttonsStyling: false
        });//end of swal
        return false;
      }//end of if

      else if ($("#name").valid() == false) {//validate form
        swal({
        title: 'Error',
        text: "note: Template-Name and Template-Content is required",
        type: 'error',
        confirmButtonText: 'Ok',
        confirmButtonClass: 'btn waves-effect green darken-2',
        buttonsStyling: false
        });//end of swal
      }//end of else if

      else {
        var ckeditor_content = CKEDITOR.instances.id_content.getData();
        $("#id_content").val(ckeditor_content);

        edit_template("../../model/tbl_template/update/edit_template.php", "#frm_edit_template");
      }//end of else
    });//end of btn click



    $("#frm_edit_template").validate({//form validation
      rules:{
        name: {required: true}
      },//end of rules

      messages: {
        name: {required: "<small class='right val red-text'>This field is required</small>"}
        },//end of messages

      errorElement : 'div',
      errorPlacement: function(error, element) {
        var placement = $(element).data('error');
        if (placement) {
          $(placement).append(error)
        } else {
          error.insertAfter(element);
        }
      }//end of errorElement
    });//end of validate


  });//end of document.ready



  //////////////////////////////////Functions/////////////////////////////
  function edit_template(model_url,form_name){
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

          Materialize.toast("Edited Template Saved", 8000, 'green darken-2');
        }
      }//end of success function

    })//end of ajax
  }//end of add_template

  </script>
</html>
