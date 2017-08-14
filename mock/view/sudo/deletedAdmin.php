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
    <link rel="stylesheet" href="../../assets/fa/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

  </head>
  <body class="grey lighten-3">

    <?php require 'nav.php'; ?><br>

        <div class="row">

          <div class="col s12 m12 l12" id="list_deleted_admin" ><!--Table-->
            <div class="row">
              <div class="col s12 m6 l6">
                <h5>Deleted Admins</h5>
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

              <tbody class="list" id="tbl_deleted_admin"></tbody><!--end of tbody-->
            </table><!--end of table-->

            <tfoot>
              <tr>
                <td><ul class="pagination center"></ul></td>
              </tr>
            </tfoot><!--end of tfoot-->
          </div><!--end of col s12-->

        </div><!--end of row-->

      <a href="#delete_deleted_admin_modal" class="hide btn modal-trigger trgr_delete_deleted_admin ">activedel</a>
      <form id="frm_delete_deleted_admin">
        <div class="modal" id="delete_deleted_admin_modal">
          <div class="modal-content">
            <h5 class="center">Are you sure you want to permanently delete this admin?</h5><br>

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
            <button type="button" class="btn waves-effect modal-action modal-close blue-grey darken-3" id="btn_delete_deleted_admin">Permanently Delete admin</button>
          </div>
        </div><!--end of modal-->
      </form>

      <a href="#restore_deleted_admin_modal" class="hide btn modal-trigger trgr_restore_deleted_admin ">activedel</a>
      <form id="frm_restore_deleted_admin">
        <div class="modal" id="restore_deleted_admin_modal">
          <div class="modal-content">
            <h5 class="center">Are you sure you want to restore this admin an access?</h5><br>

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
            <button type="button" class="btn waves-effect modal-action modal-close blue-grey darken-3" id="btn_restore_deleted_admin">Restore Admin Access</button>
          </div>
        </div><!--end of modal-->
      </form>




  </body>

  <script src="../../assets/jquery/jquery.min.js" charset="utf-8"></script>
  <script src="../../assets/materialize/js/materialize.min.js" charset="utf-8"></script>
  <script src="../../assets/listjs/list.min.js" charset="utf-8"></script>
  <script src="../../assets/listjs/list.pagination.min.js" charset="utf-8"></script>
  <script src="../../controller/sudo/fetch_sudo_notif.js" charset="utf-8"></script>
 <script src="../../controller/sudo/deletedAdmin.js" charset="utf-8"></script>


</html>