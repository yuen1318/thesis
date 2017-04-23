<?php
  session_start();
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

      <div class="col s12 m12 l12" id="list_pending_signatures" ><!--Table-->
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
                <th>Sender</th>
                <th>Signatories</th>
                <th colspan="3">Action</th>

            </tr>
          </thead><!--end of thead-->

          <tbody class="list" id="tbl_pending_signatures"></tbody><!--end of tbody-->
        </table><!--end of table-->

        <tfoot>
          <tr>
            <td><ul class="pagination center"></ul></td>
          </tr>
        </tfoot><!--end of tfoot-->
      </div><!--end of col s12-->

    </div><!--end of row-->

    <a href="#approve_efile_modal" class="hide btn modal-trigger trgr_approve_efile ">Approve efile</a>
    <form id="frm_approve_efile">
      <div class="modal" id="approve_efile_modal">
        <div class="modal-content">
          <h5 class="center">Are you sure you want to approve this efile?</h5><br>

          <div class="row hide">
            <div class="col s4">
              <input type="text" name="approve_id" id="approve_id">
            </div>
          </div>

        </div><!--end of modal-content-->
        <div class="modal-footer">
          <button type="button" class="btn waves-effect modal-action modal-close green darken-2" id="btn_approve_efile">Approve</button>
        </div>
      </div><!--end of modal-->
    </form>

    <a href="#reject_efile_modal" class="hide btn modal-trigger trgr_reject_efile ">Reject efile</a>
    <form id="frm_reject_efile">
      <div class="modal" id="reject_efile_modal">
        <div class="modal-content">
          <h5 class="center">Are you sure you want to reject this efile?</h5><br>

          <div class="row hide">
            <div class="col s4">
              <input type="text" name="reject_id" id="reject_id">
            </div>
          </div>

          <div class="row">
            <div class="col s12 l12 m12">
              <label>Reason of rejection</label>
              <textarea name="comment" style="height:200px; resize:none;"></textarea>
            </div>
          </div>

        </div><!--end of modal-content-->
        <div class="modal-footer">
          <button type="button" class="btn waves-effect modal-action modal-close green darken-2" id="btn_reject_efile">Reject</button>
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

      select_pending_signatures("../../model/tbl_efile/select/select_pending_efile.php", "#tbl_pending_signatures");

      $(document).on('click', '.approve_efile', function() {
       //bind html5 data attributes to variables
       var approve_id = $(this).attr('data-approve-id');
        //set values to id
        $('#approve_id').val(approve_id);
        //show modal
        $('.trgr_approve_efile').trigger('click');
       });//end of onclick


       $('#btn_approve_efile').on('click', function(event) {
        approve_efile("../../model/tbl_efile/update/approve_efile.php","#frm_approve_efile");
      });//end of onclick

      $(document).on('click', '.reject_efile', function() {
       //bind html5 data attributes to variables
       var reject_id = $(this).attr('data-reject-id');
        //set values to id
        $('#reject_id').val(reject_id);
        //show modal
        $('.trgr_reject_efile').trigger('click');
       });//end of onclick


       $('#btn_reject_efile').on('click', function(event) {
        alert("reject");
      });//end of onclick






    });//end of document.ready


    //////////////////////Functions///////////////////////
    function select_pending_signatures(model_url, html_class_OR_id){
      $.ajax({
        url:  model_url,
        method: "GET",
        success:function(Result){
        //push the result on id or class
          $(html_class_OR_id).html(Result);
        },//end of success function
        complete:function(){
          //initialize pagination after data loaded
          var monkeyList = new List('list_pending_signatures', {
            valueNames: ['efile','sender','signatories'],
            page: 3,
            plugins: [ ListPagination({}) ]
          });
        }//end of complete function

      })
    }//end of select_pending_user

    function approve_efile(model_url,form_name){
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
          select_pending_signatures("../../model/tbl_efile/select/select_pending_efile.php", "#tbl_pending_signatures");
        }//end of complete function
      })//end of ajax
    }//end of delete_template




  </script>
</html>