<?php
  session_start();
  require 'session.php';
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="..\..\assets\fa\css\font-awesome.min.css">
    <link rel="stylesheet" href="..\..\assets\materialize\css\materialize.min.css">
    <link rel="stylesheet" href="..\..\assets\materialize\css\myStyle.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title></title>
  </head>
  <body class="grey lighten-3">

    <?php require 'nav.php'; ?>

    <div class="row">

      <div class="col s12 m12 l12" id="list_template" ><!--Table-->
        <div class="row">
          <div class="col s12 m6 l6">
            <h5>Create Efile</h5>
          </div>
          <div class="col s12 m6 l6">
            <label>Search </label>
            <input type="text" class="search">
          </div>
        </div>


        <table class="bordered centered responsive-table striped">
          <thead>
            <tr>
                <th class="hide">Num</th>
                <th>Template ID</th>
                <th>Name</th>
                <th>Use Template</th>

            </tr>
          </thead><!--end of thead-->

          <tbody class="list" id="tbl_template"></tbody><!--end of tbody-->
        </table><!--end of table-->

        <tfoot>
          <tr>
            <td><ul class="pagination center"></ul></td>
          </tr>
        </tfoot><!--end of tfoot-->
      </div><!--end of col s12-->

    </div><!--end of row-->

    <a href="#delete_template_modal" class="hide btn modal-trigger trgr_delete_template ">activedel</a>
    <form id="frm_delete_template">
      <div class="modal" id="delete_template_modal">
        <div class="modal-content">
          <h5 class="center">Are you sure you want to permanently delete this template?</h5><br>

          <div class="row hide">
            <div class="col s4">
              <input type="text" name="delete_id" id="delete_id">
            </div>
          </div>

        </div><!--end of modal-content-->
        <div class="modal-footer">
          <button type="button" class="btn waves-effect modal-action modal-close green darken-2" id="btn_delete_template">Permanently Delete Template</button>
        </div>
      </div><!--end of modal-->
    </form>


    <div class="row">
      <div class="fixed-action-btn vertical">
      <a href="useEfile.php" target="_blank" class="btn-floating btn-large green darken-2 btn tooltipped waves-effect fa fa-plus fa-lg" data-position="left" data-delay="50" data-tooltip="Create blank efile"></a>
      </div>
    </div>

  </body>
  <script src="..\..\assets\jquery\jquery.min.js" charset="utf-8"></script>
  <script src="..\..\assets\materialize\js\materialize.min.js" charset="utf-8"></script>
  <script src="..\..\assets\listjs\list.min.js" charset="utf-8"></script>
  <script src="..\..\assets\listjs\list.pagination.min.js" charset="utf-8"></script>
  <script src="..\..\controller\user\fetch_user_notif.js" charset="utf-8"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      $('.button-collapse').sideNav({menuWidth: 255});
      $('.modal').modal();

      select_template("../../model/tbl_template/select/select_template.php", "#tbl_template");

      $(document).on('click', '.delete_template', function() {
       //bind html5 data attributes to variables
       var delete_id = $(this).attr('data-delete-template-id');
        //set values to id
        $('#delete_id').val(delete_id);
        //show modal
        $('.trgr_delete_template').trigger('click');
       });//end of onclick


       $('#btn_delete_template').on('click', function(event) {
        delete_template("../../model/tbl_template/delete/delete_template.php", "#frm_delete_template");
      });//end of onclick




    });//end of document.ready


    //////////////////////Functions///////////////////////
    function select_template(model_url, html_class_OR_id){
      $.ajax({
        url:  model_url,
        method: "GET",
        success:function(Result){
        //push the result on id or class
          $(html_class_OR_id).html(Result);
        },//end of success function
        complete:function(){
          //initialize pagination after data loaded
          var monkeyList = new List('list_template', {
            valueNames: ['tmp_id','name'],
            page: 8,
            plugins: [ ListPagination({}) ]
          });
        }//end of complete function

      })
    }//end of select_pending_user

    function delete_template(model_url,form_name){
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
            Materialize.toast("User successfully deleted", 8000, 'green darken-2');
          }
        },//end of success function

        complete:function( ){
          select_template("../../model/tbl_template/select/manage_template.php", "#tbl_template");
        }//end of complete function

      })//end of ajax
    }//end of delete_template




  </script>
</html>
