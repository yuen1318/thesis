<?php
  session_start();
  require 'session.php';
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="../../assets/fa/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../assets/materialize/css/materialize.min.css">
    <link rel="stylesheet" href="../../assets/materialize/css/myStyle.css">
        <link rel="stylesheet" href="../../assets/materialize/css/animate.css">
    <link rel="stylesheet" href="../../assets/fa/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

  </head>
  <body class="grey lighten-3">

    <?php require 'nav.php'; ?><br>

        <div class="row">

          <div class="col s12 m12 l12" id="list_active_user" ><!--Table-->
            <div class="row">
              <div class="col s12 m6 l6">
                <h5>Active Users</h5>
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
                    <th>Status</th>
                    <th colspan="2">Action</th>
                </tr>
              </thead><!--end of thead-->

              <tbody class="list" id="tbl_active_user"></tbody><!--end of tbody-->
            </table><!--end of table-->

            <tfoot>
              <tr>
                <td><ul class="pagination center"></ul></td>
              </tr>
            </tfoot><!--end of tfoot-->
          </div><!--end of col s12-->

        </div><!--end of row-->

      <a href="#delete_active_user_modal" class="hide btn modal-trigger trgr_delete_active_user ">activedel</a>
      <form id="frm_delete_active_user">
        <div class="modal" id="delete_active_user_modal">
          <div class="modal-content">
            <h5 class="center">Are you sure you want to delete this user?</h5><br>

            <div class="row hide">
              <div class="col s4">
                <input type="text" name="delete_id" id="delete_id">
              </div>

              <div class="col s4">
                <input type="text" name="delete_status" id="delete_status">
              </div>
            </div>

          </div><!--end of modal-content-->
          <div class="modal-footer">
            <button type="button" class="btn waves-effect modal-action modal-close green darken-2" id="btn_delete_active_user">Delete User</button>
          </div>
        </div><!--end of modal-->
      </form>

      <a href="#edit_active_user_modal" class="hide btn modal-trigger trgr_edit_active_user ">activeedit</a>
      <form id="frm_edit_active_user">
        <div class="modal" id="edit_active_user_modal">
          <div class="modal-content">
            <h5 class="center">Are you sure you want to edit this user?</h5><br>

            <div class="row hide">
              <div class="col s12 m12 l12">
                <input type="text" name="edit_id" id="edit_id">
              </div>
            </div>

            <div class="row">
                <div class="col s12 m12 l12 input-field">
                  <label for="department" class="active">Department</label>
                  <select name="department" class="browser-default" id="select_department">
                        <!--content from database-->
                  </select>
                </div>
            </div>

          </div><!--end of modal-content-->
          <div class="modal-footer">
            <button type="button" class="btn waves-effect  green darken-2" id="btn_edit_active_user">Edit User</button>
          </div>
        </div><!--end of modal-->
      </form>







  </body>

  <script src="../../assets/jquery/jquery.min.js" charset="utf-8"></script>
  <script src="../../assets/jquery/jquery.validate.min.js" charset="utf-8"></script>
  <script src="../../assets/jquery/jquery.additionalMethod.min.js" charset="utf-8"></script>
  <script src="../../assets/materialize/js/materialize.min.js" charset="utf-8"></script>
  <script src="../../assets/listjs/list.min.js" charset="utf-8"></script>
  <script src="../../assets/listjs/list.pagination.min.js" charset="utf-8"></script>
  <script type="text/javascript">
  $(document).ready(function(){
    $('.button-collapse').sideNav({
      menuWidth: 255
    });
    $('.modal').modal();

    select_department("../../model/tbl_department/select/select_department.php", "#select_department")

    select_active_user("../../model/tbl_user/select/select_active_user.php", "#tbl_active_user");

    $(document).on('click', '.delete_active_user', function () {
      //bind html5 data attributes to variables
      var delete_id = $(this).attr('data-delete-active-id');
      var delete_status = $(this).attr('data-delete-active-status');

      //set values to id
      $('#delete_id').val(delete_id);
      $('#delete_status').val(delete_status);

      //show modal
      $('.trgr_delete_active_user').trigger('click');
    }); //end of onclick


    $('#btn_delete_active_user').on('click', function (event) {
      delete_active_user("../../model/tbl_user/update/delete_pending_user.php", "#frm_delete_active_user");
    }); //end of onclick

    $(document).on('click', '.edit_active_user', function () {
      //bind html5 data attributes to variables
      var edit_id = $(this).attr('data-edit-active-id');
      //set values to id
      $('#edit_id').val(edit_id);
      //show modal
      $('.trgr_edit_active_user').trigger('click');
    }); //end of onclick

    $('#btn_edit_active_user').on('click', function (event) {
      if ($("#frm_edit_active_user").valid()) { //check if all field is valid
         edit_active_user("../../model/tbl_user/update/edit_active_user.php","#frm_edit_active_user");
        $('#edit_active_user_modal').modal('close');
       
      } else {
        $('.val').addClass('animated bounceIn');
        $('.val').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
        $('.val').removeClass('animated');
        });
      } //end of else
    }); //end of onclick


    $("#frm_edit_active_user").validate({ //form validation
    rules: {
      department: {
        required: true
      }
    }, //end of rules
    messages: {
      department: {
        required: "<small class='right val red-text'>This field is required</small>"
      }
    }, //end of messages
    errorElement: 'div',
    errorPlacement: function (error, element) {
      var placement = $(element).data('error');
      if (placement) {
        $(placement).append(error)
      } else {
        error.insertAfter(element);
      }
    } //end of errorElement
    }); //end of validate


    }); //end of document.ready


    //////////////////////Functions///////////////////////
    function select_department(model_url, html_class_OR_id) {
      $.ajax({
        url: model_url,
        method: "GET",
        success: function (Result) {
          //push the result on id or class
          $(html_class_OR_id).html(Result);
        } //end of success function
      }) //end of ajax
    } //end of select_department


    function select_active_user(model_url, html_class_OR_id) {
      $.ajax({
        url: model_url,
        method: "GET",
        success: function (Result) {
          //push the result on id or class
          $(html_class_OR_id).html(Result);
        }, //end of success function
        complete: function () {
          //initialize pagination after data loaded
          var monkeyList = new List('list_active_user', {
            valueNames: ['id', 'name', 'gender', 'email', 'mobile', 'access', 'status'],
            page: 10,
            plugins: [ListPagination({})]
          });
        } //end of complete function

      })
    } //end of select_active_user

    function delete_active_user(model_url, form_name) {
      $.ajax({
        url: model_url,
        method: "POST",
        data: $(form_name).serialize(),
        dataType: "text",
        success: function (Result) {
          if (Result == "error") {
            Materialize.toast("Sorry an error occured", 8000, 'red');
          } else if (Result == "success") {
            Materialize.toast("User successfully deleted", 8000, 'green darken-2');
          }
        }, //end of success function

        complete: function () {
          select_active_user("../../model/tbl_user/select/select_active_user.php", "#tbl_active_user");
        } //end of complete function

      }) //end of ajax
    } //end of delete_pending_user


    function edit_active_user(model_url, form_name) {
      $.ajax({
        url: model_url,
        method: "POST",
        data: $(form_name).serialize(),
        dataType: "text",
        success: function (Result) {
          if (Result == "error") {
            Materialize.toast("Sorry an error occured", 8000, 'red');
          } else if (Result == "success") {
            Materialize.toast("User successfully editd", 8000, 'green darken-2');
          }
        }, //end of success function

        complete: function () {
          select_active_user("../../model/tbl_user/select/select_active_user.php", "#tbl_active_user");
        } //end of complete function

      }) //end of ajax
    } //end of edit_pending_user
  </script>
</html>
