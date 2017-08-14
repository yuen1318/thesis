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
    <link rel="stylesheet" href="../../assets/materialize/css/sudo.css">
    <link rel="stylesheet" href="../../assets/materialize/css/animate.css">
    <link rel="stylesheet" href="../../assets/fa/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

  </head>
  <body class="grey lighten-3">

    <?php require 'nav.php'; ?><br>

        <div class="row">

          <div class="col s12 m12 l12" id="list_active_admin" ><!--Table-->
            <div class="row">
              <div class="col s12 m6 l6">
                <h5>Active Admins</h5>
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
                    <th>Position</th>
                    <th>Status</th>
                    <th colspan="2">Action</th>
                </tr>
              </thead><!--end of thead-->

              <tbody class="list" id="tbl_active_admin"></tbody><!--end of tbody-->
            </table><!--end of table-->

            <tfoot>
              <tr>
                <td><ul class="pagination center"></ul></td>
              </tr>
            </tfoot><!--end of tfoot-->
          </div><!--end of col s12-->

        </div><!--end of row-->

      <a href="#delete_active_admin_modal" class="hide btn modal-trigger trgr_delete_active_admin ">activedel</a>
      <form id="frm_delete_active_admin">
        <div class="modal" id="delete_active_admin_modal">
          <div class="modal-content">
            <h5 class="center">Are you sure you want to delete this admin?</h5><br>

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
            <button type="button" class="btn waves-effect modal-action modal-close blue-grey darken-3" id="btn_delete_active_admin">Delete Admin</button>
          </div>
        </div><!--end of modal-->
      </form>

      <a href="#edit_active_admin_modal" class="hide btn modal-trigger trgr_edit_active_admin ">activeedit</a>
      <form id="frm_edit_active_admin">
        <div class="modal" id="edit_active_admin_modal">
          <div class="modal-content">
            <h5 class="center">Are you sure you want to edit this admin?</h5><br>

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

            <div class="row">
              <div class="input-field col s12 m12 l12">
                  <label  class="active">Position</label>
                    <select name="title" class="transparent browser-default" id="select_position">
                                  <!--content from database-->
                    </select>
              </div>
            </div>
            

          </div><!--end of modal-content-->
          <div class="modal-footer">
            <button type="button" class="btn waves-effect  blue-grey darken-3" id="btn_edit_active_admin">Edit Admin</button>
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
  <script src="../../controller/sudo/fetch_sudo_notif.js" charset="utf-8"></script>
 <script src="../../controller/sudo/activeAdmin.js" charset="utf-8"></script>
 
</html>
