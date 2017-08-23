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
    <link rel="stylesheet" href="../../assets/materialize/css/animate.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <style media="screen">
      /*Black color to the text*/

      .tabs .tab a {
        color: #2e7d32;
      }
      /*Text color on hover*/

      .tabs .tab a:hover {
        color: #2e7d32;
      }
      /*Background and text color when a tab is active*/

      .tabs .tab a.active {
        color: #2e7d32;
      }
      /*Color of underline*/

      .tabs .indicator {
        background-color: #2e7d32;
      }
    </style>
    <title></title>
  </head>

  <body class="grey lighten-3">

    <?php require 'nav.php'; ?>



    <div class="col s12">
      <ul class="tabs row  grey lighten-4">
        <li class="tab col s4"><a class="active" href="#tab1"><span id="notif_pending_efile" class="red white-text"></span> Pending Signatures</a></li>
        <li class="tab col s4"><a href="#tab2"><span id="notif_rejected_efile" class="red white-text"></span> Rejected Efile</a></li>
        <li class="tab col s4"><a href="#tab3"><span id="notif_publish_efile" class="red white-text"></span> Publish Efile</a></li>
      </ul>
    </div>


    <div id="tab1" class="col s12"><br>
      <!--Pending Signature-->
      <div class="row">

        <div class="col s12 m12 l12" id="list_pending_signatures">
          <!--Table-->
          <div class="row">
            <div class="col s12 m6 l6">
              <h5>Pending Signature</h5>
            </div>
            <div class="col s12 m6 l6">
              <label>Search </label>
              <input type="text" class="search">
            </div>
          </div>


          <table class="bordered centered responsive-table striped">
            <thead>
              <tr>
                <th>Efile ID</th>
                <th>Efile Name</th>
                <th>Sender</th>
                <th>Signatories</th>
                <th colspan="3">Action</th>

              </tr>
            </thead>
            <!--end of thead-->

            <tbody class="list" id="tbl_pending_signatures"></tbody>
            <!--end of tbody-->
          </table>
          <!--end of table-->

          <tfoot>
            <tr>
              <td>
                <ul class="pagination center"></ul>
              </td>
            </tr>
          </tfoot>
          <!--end of tfoot-->
        </div>
        <!--end of col s12-->

      </div>
      <!--end of row-->

      <a href="#approve_efile_modal" class="hide btn modal-trigger trgr_approve_efile ">Approve efile</a>
      <form id="frm_approve_efile">
        <div class="modal" id="approve_efile_modal">
          <div class="modal-content">
            <h5 class="center">Are you sure you want to approve this efile?</h5><br>

            <div class="row hide">
              <div class="col s6">
                <input type="text" name="approve_id" id="approve_id">
              </div>

              <div class="col s6">
                <input type="text" name="approve_rpw" id="approve_rpw" value="<?php echo $_SESSION['user_pw']?>">
              </div>
            </div>

            <div class="row ">
              <div class="col s12">
                <label for="approve_pw">Authenticate</label>
                <input type="text" class="active" name="approve_pw" id="approve_pw" placeholder="Password">
              </div>
            </div>

          </div>
          <!--end of modal-content-->
          <div class="modal-footer">
            <button type="button" class="btn waves-effect green darken-2" id="btn_approve_efile">Approve</button>
          </div>
        </div>
        <!--end of modal-->
      </form>

      <a href="#reject_efile_modal" class="hide btn modal-trigger trgr_reject_efile ">Reject efile</a>
      <form id="frm_reject_efile">
        <div class="modal" id="reject_efile_modal">
          <div class="modal-content">
            <h5 class="center">Are you sure you want to reject this efile?</h5><br>

            <div class="row hide">
              <div class="col s6">
                <input type="text" name="reject_id" id="reject_id">
              </div>

              <div class="col s6">
                <input type="text" name="reject_rpw" id="reject_rpw" value="<?php echo $_SESSION['user_pw']?>">
              </div>
            </div>

            <div class="row">
              <div class="col s12 l12 m12">
                          
              <label>Reason:</label>
                <select  name="comment"  class="browser-default" id="comment">
                  <option disabled selected>Choose reason for rejection</option>
                  <option value='Duplicate Filing :	The exact document has already been filed'>Duplicate Filing</option>
                  <option value='Late Submission'>Late Submission</option>
                  <option value='Document Issue: Check if the document is not dated; the document contains incomplete files; the attached image is not legible; etc'>Document Issue</option>
                </select>
                              
              </div>
            </div>

            <div class="row ">
              <div class="col s12">
                <label for="reject_pw">Authenticate</label>
                <input type="text" class="active" name="reject_pw" id="reject_pw" placeholder="Password">
              </div>
            </div>

          </div>
          <!--end of modal-content-->
          <div class="modal-footer">
            <button type="button" class="btn waves-effect green darken-2" id="btn_reject_efile">Reject</button>
          </div>
        </div>
        <!--end of modal-->
      </form>
    </div>
    <!--end of tab1-->

    <div id="tab2" class="col s12"><br>
      <!--Rejected Efile-->
      <div class="row">

        <div class="col s12 m12 l12" id="list_rejected_efile">
          <!--Table-->
          <div class="row">
            <div class="col s12 m6 l6">
              <h5>Rejected Efile</h5>
            </div>
            <div class="col s12 m6 l6">
              <label>Search </label>
              <input type="text" class="search">
            </div>
          </div>


          <table class="bordered centered responsive-table striped">
            <thead>
              <tr>

                <th>Efile ID</th>
                <th>Efile Name</th>
                <th>Rejected by</th>
                <th>Reason</th>
                <th colspan="2">Action</th>

              </tr>
            </thead>
            <!--end of thead-->

            <tbody class="list" id="tbl_rejected_efile"></tbody>
            <!--end of tbody-->
          </table>
          <!--end of table-->

          <tfoot>
            <tr>
              <td>
                <ul class="pagination center"></ul>
              </td>
            </tr>
          </tfoot>
          <!--end of tfoot-->
        </div>
        <!--end of col s12-->

      </div>
      <!--end of row-->

      <a href="#delete_efile_modal" class="hide btn modal-trigger trgr_delete_efile ">Reject efile</a>
      <form id="frm_delete_efile">
        <div class="modal" id="delete_efile_modal">
          <div class="modal-content">
            <h5 class="center">Are you sure you want to delete this efile?</h5><br>

            <div class="row hide">
              <div class="col s6">
                <input type="text" name="delete_id" id="delete_id">
              </div>

              <div class="col s6">
                <input type="text" name="delete_rpw" id="delete_rpw" value="<?php echo $_SESSION['user_pw']?>">
              </div>

            </div>

            <div class="row ">
              <div class="col s12">
                <label for="delete_pw">Authenticate</label>
                <input type="text" class="active" name="delete_pw" id="delete_pw" placeholder="Password">
              </div>
            </div>


          </div>
          <!--end of modal-content-->
          <div class="modal-footer">
            <button type="button" class="btn waves-effect  green darken-2" id="btn_delete_efile">Delete</button>
          </div>
        </div>
        <!--end of modal-->
      </form>
    </div>
    <!--end of tab2-->

    <div id="tab3" class="col s12"><br>
      <!--Publish Efile-->
      <div class="row">

        <div class="col s12 m12 l12" id="list_publish_efile">
          <!--Table-->
          <div class="row">
            <div class="col s12 m6 l6">
              <h5>Publish Efile</h5>
            </div>
            <div class="col s12 m6 l6">
              <label>Search </label>
              <input type="text" class="search">
            </div>
          </div>


          <table class="bordered centered responsive-table striped">
            <thead>
              <tr>

                <th>Efile ID</th>
                <th>Efile Name</th>
                <th>Approved by</th>
                <th>Action</th>

              </tr>
            </thead>
            <!--end of thead-->

            <tbody class="list" id="tbl_publish_efile"></tbody>
            <!--end of tbody-->
          </table>
          <!--end of table-->

          <tfoot>
            <tr>
              <td>
                <ul class="pagination center"></ul>
              </td>
            </tr>
          </tfoot>
          <!--end of tfoot-->
        </div>
        <!--end of col s12-->

      </div>
      <!--end of row-->
    </div>









  </body>
  <script src="../../assets/jquery/jquery.min.js" charset="utf-8"></script>
  <script src="../../assets/jquery/jquery.validate.min.js" charset="utf-8"></script>
  <script src="../../assets/jquery/jquery.additionalMethod.min.js" charset="utf-8"></script>
  <script src="../../assets/materialize/js/materialize.min.js" charset="utf-8"></script>
  <script src="../../assets/listjs/list.min.js" charset="utf-8"></script>
  <script src="../../assets/listjs/list.pagination.min.js" charset="utf-8"></script>
  <script src="../../assets/sweetalert2/sweetalert2.min.js" charset="utf-8"></script>
  <script src="../../controller/user/fetch_user_notif.js" charset="utf-8"></script>
  <script src="../../controller/user/notifEfile.js" charset="utf-8"></script>

  </html>