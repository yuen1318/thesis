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
        <li class="tab col s4"><a class="active" href="#tab1">Pending Videos</a></li>
        <li class="tab col s4"><a href="#tab2">Rejected Videos</a></li>
        <li class="tab col s4"><a href="#tab3">Publish Videos</a></li>
      </ul>
    </div>


    <div id="tab1" class="col s12"><br>
      <!--Pending Signature-->
      <div class="row">

        <div class="col s12 m12 l12" id="list_pending_video">
          <!--Table-->
          <div class="row">
            <div class="col s12 m6 l6">
              <h5>Pending Videos</h5>
            </div>
            <div class="col s12 m6 l6">
              <label>Search </label>
              <input type="text" class="search">
            </div>
          </div>


          <table class="bordered centered responsive-table striped">
            <thead>
              <tr>
                <th>File ID</th>
                <th>File Name</th>
                <th>Sender</th>
                <th>Signatories</th>
                <th colspan="3">Action</th>

              </tr>
            </thead>
            <!--end of thead-->

            <tbody class="list" id="tbl_pending_video"></tbody>
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

      <a href="#approve_video_modal" class="hide btn modal-trigger trgr_approve_video ">Approve video</a>
      <form id="frm_approve_video">
        <div class="modal" id="approve_video_modal">
          <div class="modal-content">
            <h5 class="center">Are you sure you want to approve this video?</h5><br>

            <div class="row hide">
              <div class="col s4">
                <input type="text" name="approve_id" id="approve_id">
              </div>
            </div>

          </div>
          <!--end of modal-content-->
          <div class="modal-footer">
            <button type="button" class="btn waves-effect modal-action modal-close green darken-2" id="btn_approve_video">Approve</button>
          </div>
        </div>
        <!--end of modal-->
      </form>

      <a href="#reject_video_modal" class="hide btn modal-trigger trgr_reject_video ">Reject video</a>
      <form id="frm_reject_video">
        <div class="modal" id="reject_video_modal">
          <div class="modal-content">
            <h5 class="center">Are you sure you want to reject this video?</h5><br>

            <div class="row hide">
              <div class="col s4">
                <input type="text" name="reject_id" id="reject_id">
              </div>
            </div>

            <div class="row">
              <div class="col s12 l12 m12">
                <label>Reason of rejection</label>
                <textarea name="comment" style="height:200px; resize:none;" maxlength="100"></textarea>
              </div>
            </div>

          </div>
          <!--end of modal-content-->
          <div class="modal-footer">
            <button type="button" class="btn waves-effect modal-action modal-close green darken-2" id="btn_reject_video">Reject</button>
          </div>
        </div>
        <!--end of modal-->
      </form>
    </div>
    <!--end of tab1-->

    <div id="tab2" class="col s12"><br>
      <!--Rejected Efile-->
      <div class="row">

        <div class="col s12 m12 l12" id="list_rejected_video">
          <!--Table-->
          <div class="row">
            <div class="col s12 m6 l6">
              <h5>Rejected Video</h5>
            </div>
            <div class="col s12 m6 l6">
              <label>Search </label>
              <input type="text" class="search">
            </div>
          </div>


          <table class="bordered centered responsive-table striped">
            <thead>
              <tr>

                <th>File ID</th>
                <th>File Name</th>
                <th>Rejected by</th>
                <th>Reason</th>
                <th colspan="2">Action</th>

              </tr>
            </thead>
            <!--end of thead-->

            <tbody class="list" id="tbl_rejected_video"></tbody>
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

      <a href="#delete_video_modal" class="hide btn modal-trigger trgr_delete_video ">Reject video</a>
      <form id="frm_delete_video">
        <div class="modal" id="delete_video_modal">
          <div class="modal-content">
            <h5 class="center">Are you sure you want to delete this video?</h5><br>

            <div class="row hide">
              <div class="col s4">
                <input type="text" name="delete_id" id="delete_id">
              </div>
            </div>


          </div>
          <!--end of modal-content-->
          <div class="modal-footer">
            <button type="button" class="btn waves-effect modal-action modal-close green darken-2" id="btn_delete_video">Delete</button>
          </div>
        </div>
        <!--end of modal-->
      </form>


      <a href="#edit_video_modal" class="hide btn modal-trigger trgr_edit_video ">Reject video</a>
      <form id="frm_edit_video" enctype="multipart/form-data">
        <div class="modal" id="edit_video_modal">
          <div class="modal-content">
            <h5 class="center">Are you sure you want to edit this video?</h5><br>

            <div class="row hide">
              <div class="col s4">
                <input type="text" name="edit_id" id="edit_id">
              </div>
            </div>

            <div class="input-field">
              <input type="text" name="video" id="video">
            </div>



          </div>
          <!--end of modal-content-->
          <div class="modal-footer">
            <button type="button" class="btn waves-effect modal-action modal-close green darken-2" id="btn_edit_video">Resend</button>
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
              <h5>Publish Video</h5>
            </div>
            <div class="col s12 m6 l6">
              <label>Search </label>
              <input type="text" class="search">
            </div>
          </div>


          <table class="bordered centered responsive-table striped">
            <thead>
              <tr>

                <th>File ID</th>
                <th>File Name</th>
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

      <a href="#publish_video_modal" class="hide btn modal-trigger trgr_publish_video ">Reject video</a>
      <form id="frm_publish_video">
        <div class="modal" id="publish_video_modal">
          <div class="modal-content">
            <h5 class="center">Are you sure you want to publish this video?</h5><br>

            <div class="row hide">
              <div class="col s4">
                <input type="text" name="publish_id" id="publish_id">
              </div>
            </div>


          </div>
          <!--end of modal-content-->
          <div class="modal-footer">
            <button type="button" class="btn waves-effect modal-action modal-close green darken-2" id="btn_publish_video">Publish</button>
          </div>
        </div>
        <!--end of modal-->
      </form>

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
  <script src="../../controller/user/notifVideo.js" charset="utf-8"></script>

  </html>