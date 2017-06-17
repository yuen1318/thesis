<?php
  session_start();
  require 'session.php';
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="..\..\assets\fa\css\font-awesome.min.css">
    <link rel="stylesheet" href="..\..\assets\materialize\css\materialize.min.css">
    <link rel="stylesheet" href="..\..\assets\materialize\css\myStyle.css">
    <link rel="stylesheet" href="..\..\assets\fa\css\font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

  </head>
  <body class="grey lighten-3">

    <?php require 'nav.php'; ?><br>

        <div class="row">

          <div class="col s12 m12 l12" id="list_deleted_user" ><!--Table-->
            <div class="row">
              <div class="col s12 m6 l6">
                <h5>Deleted Users</h5>
              </div>
              <div class="col s12 m6 l6">
                <label>Search </label>
                <input type="text" class="search">
              </div>
            </div>


            <table class="bordered centered responsive-table striped">
              <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>Mobile</th>
                    <th>Department</th>
                    <th>Title</th>
                    <th>Access</th>
                    <th>Status</th>
                    <th colspan="2">Action</th>
                </tr>
              </thead><!--end of thead-->

              <tbody class="list" id="tbl_deleted_user"></tbody><!--end of tbody-->
            </table><!--end of table-->

            <tfoot>
              <tr>
                <td><ul class="pagination center"></ul></td>
              </tr>
            </tfoot><!--end of tfoot-->
          </div><!--end of col s12-->

        </div><!--end of row-->

      <a href="#delete_deleted_user_modal" class="hide btn modal-trigger trgr_delete_deleted_user ">activedel</a>
      <form id="frm_delete_deleted_user">
        <div class="modal" id="delete_deleted_user_modal">
          <div class="modal-content">
            <h5 class="center">Are you sure you want to permanently delete this user?</h5><br>

            <div class="row hide">
              <div class="col s4">
                <input type="text" name="delete_id" id="delete_id">
              </div>

              <div class="col s4">
                <input type="text" name="delete_access" id="delete_access">
              </div>

              <div class="col s4">
                <input type="text" name="delete_status" id="delete_status">
              </div>
            </div>

          </div><!--end of modal-content-->
          <div class="modal-footer">
            <button type="button" class="btn waves-effect modal-action modal-close green darken-2" id="btn_delete_deleted_user">Permanently Delete User</button>
          </div>
        </div><!--end of modal-->
      </form>

      <a href="#restore_deleted_user_modal" class="hide btn modal-trigger trgr_restore_deleted_user ">activedel</a>
      <form id="frm_restore_deleted_user">
        <div class="modal" id="restore_deleted_user_modal">
          <div class="modal-content">
            <h5 class="center">Are you sure you want to restore this user an access?</h5><br>

            <div class="row hide">
              <div class="col s4">
                <input type="text" name="restore_id" id="restore_id">
              </div>

              <div class="col s4">
                <input type="text" name="restore_access" id="restore_access">
              </div>

              <div class="col s4">
                <input type="text" name="restore_status" id="restore_status">
              </div>
            </div>

          </div><!--end of modal-content-->
          <div class="modal-footer">
            <button type="button" class="btn waves-effect modal-action modal-close green darken-2" id="btn_restore_deleted_user">Restore User Access</button>
          </div>
        </div><!--end of modal-->
      </form>




  </body>

  <script src="..\..\assets\jquery\jquery.min.js" charset="utf-8"></script>
  <script src="..\..\assets\materialize\js\materialize.min.js" charset="utf-8"></script>
  <script src="..\..\assets\listjs\list.min.js" charset="utf-8"></script>
  <script src="..\..\assets\listjs\list.pagination.min.js" charset="utf-8"></script>
  <script type="text/javascript">
  $(document).ready(function(){
    $('.button-collapse').sideNav({menuWidth: 255});
    $('.modal').modal();

    select_deleted_user("../../model/tbl_user/select/select_deleted_user.php", "#tbl_deleted_user");

    $(document).on('click', '.delete_deleted_user', function() {
     //bind html5 data attributes to variables
     var delete_id = $(this).attr('data-delete-deleted-id');
     var delete_access = $(this).attr('data-delete-deleted-access');
     var delete_status = $(this).attr('data-delete-deleted-status');

      //set values to id
      $('#delete_id').val(delete_id);
      $('#delete_access').val(delete_access);
      $('#delete_status').val(delete_status);

      //show modal
      $('.trgr_delete_deleted_user').trigger('click');
     });//end of onclick

     $(document).on('click', '.restore_deleted_user', function() {
      //bind html5 data attributes to variables
      var restore_id = $(this).attr('data-restore-deleted-id');
      var restore_access = $(this).attr('data-restore-deleted-access');
      var restore_status = $(this).attr('data-restore-deleted-status');

       //set values to id
       $('#restore_id').val(restore_id);
       $('#restore_access').val(restore_access);
       $('#restore_status').val(restore_status);

       //show modal
       $('.trgr_restore_deleted_user').trigger('click');
      });//end of onclick


     $('#btn_delete_deleted_user').on('click', function(event) {
       delete_deleted_user("../../model/tbl_user/delete/delete_deleted_user.php", "#frm_delete_deleted_user");
    });//end of onclick

    $('#btn_restore_deleted_user').on('click', function(event) {
      restore_deleted_user("../../model/tbl_user/update/restore_deleted_user.php" , "#frm_restore_deleted_user");
   });//end of onclick




  });//end of document.ready


  //////////////////////Functions///////////////////////
  function select_deleted_user(model_url, html_class_OR_id){
    $.ajax({
      url:  model_url,
      method: "GET",
      success:function(Result){
      //push the result on id or class
        $(html_class_OR_id).html(Result);
      },//end of success function
      complete:function(){
        //initialize pagination after data loaded
        var monkeyList = new List('list_deleted_user', {
          valueNames: ['id','name','gender','email','mobile','access','status'],
          page: 10,
          plugins: [ ListPagination({}) ]
        });
      }//end of complete function

    })
  }//end of select_pending_user

  function delete_deleted_user(model_url,form_name){
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
          Materialize.toast("User permanently deleted", 8000, 'green darken-2');
        }
      },//end of success function

      complete:function( ){
        select_deleted_user("../../model/tbl_user/select/select_deleted_user.php", "#tbl_deleted_user");
      }//end of complete function

    })//end of ajax
  }//end of delete_pending_user

  function restore_deleted_user(model_url,form_name){
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
          Materialize.toast("User restored successfully", 8000, 'green darken-2');
        }
      },//end of success function

      complete:function( ){
        select_deleted_user("../../model/tbl_user/select/select_deleted_user.php", "#tbl_deleted_user");
      }//end of complete function

    })//end of ajax
  }//end of delete_pending_user

  </script>
</html>
