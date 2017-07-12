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
    <link rel="stylesheet" href="../../assets/fa/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

  </head>
  <body class="grey lighten-3">

    <?php require 'nav.php'; ?><br>

        <div class="row">

          <div class="col s12 m12 l12" id="list_pending_user" ><!--Table-->
            <div class="row">
              <div class="col s12 m6 l6">
                <h5>Pending Users</h5>
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

              <tbody class="list" id="tbl_pending_user"></tbody><!--end of tbody-->
            </table><!--end of table-->

            <tfoot>
              <tr>
                <td><ul class="pagination center"></ul></td>
              </tr>
            </tfoot><!--end of tfoot-->
          </div><!--end of col s12-->

        </div><!--end of row-->

      <a href="#delete_pending_user_modal" class="hide btn modal-trigger trgr_delete_pending_user ">activedel</a>
      <form id="frm_delete_pending_user">
        <div class="modal" id="delete_pending_user_modal">
          <div class="modal-content">
            <h5 class="center">Are you sure you want to delete this user?</h5><br>

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
            <button type="button" class="btn waves-effect modal-action modal-close green darken-2" id="btn_delete_pending_user">Delete User</button>
          </div>
        </div><!--end of modal-->
      </form>

      <a href="#approve_pending_user_modal" class="hide btn modal-trigger trgr_approve_pending_user ">activedel</a>
      <form id="frm_approve_pending_user">
        <div class="modal" id="approve_pending_user_modal">
          <div class="modal-content">
            <h5 class="center">Are you sure you want to grant this user an access?</h5><br>

            <div class="row hide">
              <div class="col s4">
                <input type="text" name="approve_id" id="approve_id">
              </div>

              <div class="col s4">
                <input type="text" name="approve_access" id="approve_access">
              </div>

              <div class="col s4">
                <input type="text" name="approve_status" id="approve_status">
              </div>
            </div>

          </div><!--end of modal-content-->
          <div class="modal-footer">
            <button type="button" class="btn waves-effect modal-action modal-close green darken-2" id="btn_approve_pending_user">Grant User Access</button>
          </div>
        </div><!--end of modal-->
      </form>




  </body>

  <script src="../../assets/jquery/jquery.min.js" charset="utf-8"></script>
  <script src="../../assets/materialize/js/materialize.min.js" charset="utf-8"></script>
  <script src="../../assets/listjs/list.min.js" charset="utf-8"></script>
  <script src="../../assets/listjs/list.pagination.min.js" charset="utf-8"></script>
  <script src="../../controller/admin/pendingUser.js" charset="utf-8"></script>
</html>
