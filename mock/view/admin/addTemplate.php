<?php
  session_start();
  require 'session.php';
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

    <div class="row">

      <form id="frm_add_template">

        <div class="col s12 m3 l3">
          <h4>Create Template</h4>
        </div>

        <div class="input-field col s12 m3 l3 ">
          <label for="select_department" class="active">Department</label>
          <select  name="department"  class="browser-default grey lighten-3" id="select_department">
            <!--content from database-->
          </select>
        </div>


        <div class="col s12 m4 l4">
          <div class="input-field">
            <label for="">Template Name</label>
            <input type="text" name="name" id="name">
          </div>
        </div>

        <div class="col s12 m2 l2"><br>
          <button type="button" class="waves-effect btn right green darken-2" id="btn_submit">Submit</button>
        </div>

        <div class="col s12 m12 l12 bgcolor"><br>
          <textarea class="ckeditor" name="content" id="id_content"></textarea>
        </div>

      </form>


    </div>

  </body>

  <script src="../../assets/jquery/jquery.min.js" charset="utf-8"></script>
  <script src="../../assets/jquery/jquery.validate.min.js" charset="utf-8"></script>
  <script src="../../assets/jquery/jquery.additionalMethod.min.js" charset="utf-8"></script>
  <script src="../../assets/materialize/js/materialize.min.js" charset="utf-8"></script>

  <script src="../../assets/ckeditor/ckeditor.js" charset="utf-8"></script>
  <script src="../../assets/sweetalert2/sweetalert2.min.js" charset="utf-8"></script>
  <script src="../../controller/user/fetch_user_notif.js" charset="utf-8"></script>
  <script type="text/javascript">
  $(document).ready(function(){

    select_department("../../model/tbl_department/select/select_department.php", "#select_department");

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

      else if ($("#frm_add_template").valid() == false) {//validate form
        swal({
        title: 'Error',
        text: "note: Department, Template-Name and Template-Content is required",
        type: 'error',
        confirmButtonText: 'Ok',
        confirmButtonClass: 'btn waves-effect green darken-2',
        buttonsStyling: false
        });//end of swal
      }//end of else if

      else {
        //finalize the content
        var ckeditor_content = CKEDITOR.instances.id_content.getData();
        $("#id_content").val(ckeditor_content);
        add_global_template("../../model/tbl_template/insert/add_global_template.php", "#frm_add_template");
      }//end of else
    });//end of btn click



    $("#frm_add_template").validate({//form validation
      rules:{
        name: {required: true},
        department: {required: true}
      },//end of rules

      messages: {
        name: {required: "<small class='right val red-text'>This field is required</small>"},
        department: {required: "<small class='right val red-text'>This field is required</small>"}
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
  function select_department(model_url, html_class_OR_id){
  $.ajax({
      url:  model_url,
      method: "GET",
      success:function(Result){
      //push the result on id or class
        $(html_class_OR_id).html(Result);
      }
    });
  }//end of select_department

  function add_global_template(model_url,form_name){
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
          $(form_name)[0].reset();

          Materialize.toast("Template saved", 8000, 'green darken-2');
        }
      }//end of success function

    })//end of ajax
  }//end of add_template

  </script>
</html>
