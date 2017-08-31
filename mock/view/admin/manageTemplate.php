<?php
  session_start();
  require 'session.php';
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../../assets/materialize/css/animate.css">
    <link rel="stylesheet" href="../../assets/fa/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../assets/materialize/css/materialize.min.css">
    <link rel="stylesheet" href="../../assets/materialize/css/admin.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title></title>
  </head>
  <body class="grey lighten-3">

    <?php require 'nav.php'; ?>

    <div class="row">

      <div class="col s12 m12 l12" id="list_template" ><!--Table-->
        <div class="row">
          <div class="col s12 m6 l6">
            <h5>Manage Templates</h5>
          </div>
          <div class="col s12 m6 l6">
            <label>Search </label>
            <input type="text" class="search">
          </div>
        </div>


        <table class="bordered centered responsive-table striped">
          <thead>
            <tr>
                <th class="hide">ID</th>
                <th>Template ID</th>
                <th>Name</th>
                <th>Department</th>
                <th colspan="2">Action</th>

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
            <div class="col s6">
              <input type="text" name="delete_id" id="delete_id">
            </div>
            <div class="col s6">
                <input type="text" name="delete_rpw" id="delete_rpw" value="<?php echo $_SESSION['admin_pw']?>">
            </div>
          </div>

          <div class="row ">
              <div class="col s12">
                <label for="delete_pw">Authenticate</label>
                <input type="password" class="active" name="delete_pw" id="delete_pw" placeholder="Password">
              </div>
            </div>

        </div><!--end of modal-content-->
        <div class="modal-footer">
          <button type="button" class="btn waves-effect  teal lighten-1" id="btn_delete_template">Permanently Delete Template</button>
        </div>
      </div><!--end of modal-->
    </form>


    <div class="row">
      <div class="fixed-action-btn vertical">
      <a href="addTemplate.php" class="btn-floating btn-large teal lighten-1 btn tooltipped waves-effect fa fa-plus fa-lg" data-position="left" data-delay="50" data-tooltip="Add template"></a>
      </div>
    </div>

  </body>
  <script src="../../assets/jquery/jquery.min.js" charset="utf-8"></script>
  <script src="../../assets/jquery/jquery.validate.min.js" charset="utf-8"></script>
  <script src="../../assets/jquery/jquery.additionalMethod.min.js" charset="utf-8"></script>
  <script src="../../assets/materialize/js/materialize.min.js" charset="utf-8"></script>
  <script src="../../assets/listjs/list.min.js" charset="utf-8"></script>
  <script src="../../assets/listjs/list.pagination.min.js" charset="utf-8"></script>
<script src="../../controller/admin/fetch_admin_notif.js" charset="utf-8"></script>
<script src="../../controller/admin/manageTemplate.js" charset="utf-8"></script>


</html>
