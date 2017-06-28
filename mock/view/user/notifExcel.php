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
    <link rel="stylesheet" href="..\..\assets\sweetalert2\sweetalert2.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <style media="screen">
        /*Black color to the text*/
      .tabs .tab a{color:#2e7d32 ;}
        /*Text color on hover*/
      .tabs .tab a:hover {color:#2e7d32 ;}
        /*Background and text color when a tab is active*/
      .tabs .tab a.active {color:#2e7d32 ;}
        /*Color of underline*/
      .tabs .indicator {background-color:#2e7d32;}
    </style>
    <title></title>
  </head>
  <body class="grey lighten-3">

    <?php require 'nav.php'; ?>



  <div class="col s12">
    <ul class="tabs row  grey lighten-4">
      <li class="tab col s4"><a class="active" href="#tab1">Pending Spreadsheets</a></li>
      <li class="tab col s4"><a href="#tab2">Rejected Spreadsheets</a></li>
      <li class="tab col s4"><a href="#tab3">Publish Spreadsheets</a></li>
    </ul>
  </div>


  <div id="tab1" class="col s12"><br>
    <!--Pending Signature-->
        <div class="row">

          <div class="col s12 m12 l12" id="list_pending_excel" ><!--Table-->
            <div class="row">
              <div class="col s12 m6 l6">
                <h5>Pending Spreadsheets</h5>
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
              </thead><!--end of thead-->

              <tbody class="list" id="tbl_pending_excel"></tbody><!--end of tbody-->
            </table><!--end of table-->

            <tfoot>
              <tr>
                <td><ul class="pagination center"></ul></td>
              </tr>
            </tfoot><!--end of tfoot-->
          </div><!--end of col s12-->

        </div><!--end of row-->

        <a href="#approve_excel_modal" class="hide btn modal-trigger trgr_approve_excel ">Approve excel</a>
        <form id="frm_approve_excel">
          <div class="modal" id="approve_excel_modal">
            <div class="modal-content">
              <h5 class="center">Are you sure you want to approve this excel?</h5><br>

              <div class="row hide">
                <div class="col s4">
                  <input type="text" name="approve_id" id="approve_id">
                </div>
              </div>

            </div><!--end of modal-content-->
            <div class="modal-footer">
              <button type="button" class="btn waves-effect modal-action modal-close green darken-2" id="btn_approve_excel">Approve</button>
            </div>
          </div><!--end of modal-->
        </form>

        <a href="#reject_excel_modal" class="hide btn modal-trigger trgr_reject_excel ">Reject excel</a>
        <form id="frm_reject_excel">
          <div class="modal" id="reject_excel_modal">
            <div class="modal-content">
              <h5 class="center">Are you sure you want to reject this excel?</h5><br>

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

            </div><!--end of modal-content-->
            <div class="modal-footer">
              <button type="button" class="btn waves-effect modal-action modal-close green darken-2" id="btn_reject_excel">Reject</button>
            </div>
          </div><!--end of modal-->
        </form>
  </div><!--end of tab1-->

  <div id="tab2" class="col s12"><br>
    <!--Rejected Efile-->
        <div class="row">

          <div class="col s12 m12 l12" id="list_rejected_excel" ><!--Table-->
            <div class="row">
              <div class="col s12 m6 l6">
                <h5>Rejected Spreadsheet</h5>
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
              </thead><!--end of thead-->

              <tbody class="list" id="tbl_rejected_excel"></tbody><!--end of tbody-->
            </table><!--end of table-->

            <tfoot>
              <tr>
                <td><ul class="pagination center"></ul></td>
              </tr>
            </tfoot><!--end of tfoot-->
          </div><!--end of col s12-->

        </div><!--end of row-->

        <a href="#delete_excel_modal" class="hide btn modal-trigger trgr_delete_excel ">Reject excel</a>
        <form id="frm_delete_excel">
          <div class="modal" id="delete_excel_modal">
            <div class="modal-content">
              <h5 class="center">Are you sure you want to delete this excel?</h5><br>

              <div class="row hide">
                <div class="col s4">
                  <input type="text" name="delete_id" id="delete_id">
                </div>
              </div>


            </div><!--end of modal-content-->
            <div class="modal-footer">
              <button type="button" class="btn waves-effect modal-action modal-close green darken-2" id="btn_delete_excel">Delete</button>
            </div>
          </div><!--end of modal-->
        </form>


        <a href="#edit_excel_modal" class="hide btn modal-trigger trgr_edit_excel ">Reject excel</a>
        <form id="frm_edit_excel" enctype="multipart/form-data">
          <div class="modal" id="edit_excel_modal">
            <div class="modal-content">
              <h5 class="center">Are you sure you want to edit this excel?</h5><br>

              <div class="row hide">
                <div class="col s4">
                  <input type="text" name="edit_id" id="edit_id">
                </div>
              </div>

              <div class="file-field input-field">
                 <div class="btn green darken-2">
                   <icon class="fa fa-upload fa-lg"></icon>
                   <span> File</span>
                   <input type="file" name="excel" id="excel">
                 </div>
                 <div class="file-path-wrapper">
                   <input class="file-path validate" type="text" name="file_proxy" id="file_proxy" placeholder=".xlsx, .xlsm, xlsx, .xltx, .xltm">
                 </div>
              </div>



            </div><!--end of modal-content-->
            <div class="modal-footer">
              <button type="button" class="btn waves-effect modal-action modal-close green darken-2" id="btn_edit_excel">Resend</button>
            </div>
          </div><!--end of modal-->
        </form>
  </div><!--end of tab2-->

  <div id="tab3" class="col s12"><br>
    <!--Publish Efile-->
        <div class="row">

          <div class="col s12 m12 l12" id="list_publish_efile" ><!--Table-->
            <div class="row">
              <div class="col s12 m6 l6">
                <h5>Publish Spreadsheet</h5>
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
              </thead><!--end of thead-->

              <tbody class="list" id="tbl_publish_efile"></tbody><!--end of tbody-->
            </table><!--end of table-->

            <tfoot>
              <tr>
                <td><ul class="pagination center"></ul></td>
              </tr>
            </tfoot><!--end of tfoot-->
          </div><!--end of col s12-->

        </div><!--end of row-->

        <a href="#publish_excel_modal" class="hide btn modal-trigger trgr_publish_excel ">Reject excel</a>
        <form id="frm_publish_excel">
          <div class="modal" id="publish_excel_modal">
            <div class="modal-content">
              <h5 class="center">Are you sure you want to publish this excel?</h5><br>

              <div class="row hide">
                <div class="col s4">
                  <input type="text" name="publish_id" id="publish_id">
                </div>
              </div>


            </div><!--end of modal-content-->
            <div class="modal-footer">
              <button type="button" class="btn waves-effect modal-action modal-close green darken-2" id="btn_publish_excel">Publish</button>
            </div>
          </div><!--end of modal-->
        </form>

  </div>









  </body>
  <script src="..\..\assets\jquery\jquery.min.js" charset="utf-8"></script>
  <script src="..\..\assets\jquery\jquery.validate.min.js" charset="utf-8"></script>
  <script src="..\..\assets\jquery\jquery.additionalMethod.min.js" charset="utf-8"></script>
  <script src="..\..\assets\materialize\js\materialize.min.js" charset="utf-8"></script>
  <script src="..\..\assets\listjs\list.min.js" charset="utf-8"></script>
  <script src="..\..\assets\listjs\list.pagination.min.js" charset="utf-8"></script>
  <script src="..\..\assets\sweetalert2\sweetalert2.min.js" charset="utf-8"></script>
  <script src="..\..\controller\user\fetch_user_notif.js" charset="utf-8"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      $('.button-collapse').sideNav({menuWidth: 255});
      $('.modal').modal();
      $('ul.tabs').tabs();

      select_pending_excel("../../model/tbl_file/select/select_pending_excel.php", "#tbl_pending_excel");
      select_rejected_excel("../../model/tbl_file/select/select_rejected_excel.php", "#tbl_rejected_excel");
      select_publish_excel("../../model/tbl_file/select/select_publish_excel.php", "#tbl_publish_efile")
      /////////////////////////////
      $(document).on('click', '.approve_excel', function() {
       //bind html5 data attributes to variables
       var approve_id = $(this).attr('data-approve-id');
        //set values to id
        $('#approve_id').val(approve_id);
        //show modal
        $('.trgr_approve_excel').trigger('click');
       });//end of onclick



      //reject_excel
      $(document).on('click', '.reject_excel', function() {
       //bind html5 data attributes to variables
       var reject_id = $(this).attr('data-reject-id');
        //set values to id
        $('#reject_id').val(reject_id);
        //show modal
        $('.trgr_reject_excel').trigger('click');
       });//end of onclick

       //publish_excel
       $(document).on('click', '.publish_excel', function() {
        //bind html5 data attributes to variables
        var publish_id = $(this).attr('data-publish-id');
         //set values to id
         $('#publish_id').val(publish_id);
         //show modal
         $('.trgr_publish_excel').trigger('click');
        });//end of onclick

       //edit_excel
       $(document).on('click', '.edit_excel', function() {
        //bind html5 data attributes to variables
        var edit_id = $(this).attr('data-edit-id');
         //set values to id
         $('#edit_id').val(edit_id);
         //show modal
         $('.trgr_edit_excel').trigger('click');
        });//end of onclick


        $('#btn_approve_excel').on('click', function(event) {
          approve_excel("../../model/tbl_file/update/approve_excel.php","#frm_approve_excel");
        });//end of onclick

        $('#btn_publish_excel').on('click', function(event) {
          publish_excel("../../model/tbl_file/update/publish_excel.php","#frm_publish_excel");
        });//end of onclick

        $('#btn_edit_excel').on('click', function(event) {
          //if file_proxy isi empty

            if ($('#file_proxy').valid() ) {
              var file_name = $('#file_proxy').val();
              var file_extension  = file_name.split('.')[1];
              var final_extension = file_extension.toLowerCase();

              if (final_extension == "xlsx" ||
                  final_extension == "xlsm" ||
                  final_extension == "xlsx" ||
                  final_extension == "xltx" ||
                  final_extension == "xltm" ) {
                    var formData = new FormData($("#frm_edit_excel")[0]);

                    $.ajax({
                        url: '../../model/tbl_file/update/edit_excel.php',
                        type: 'POST',
                        data: formData,
                        async: false,
                        success: function (Result) {
                          if(Result == "error"){
                              Materialize.toast("Sorry an error occured", 8000, 'red');
                          }
                          else if(Result == "success") {
                            Materialize.toast("Spreadsheet resend", 8000, 'green darken-2');
                          }
                        },
                        complete: function (Result) {
                          select_rejected_excel("../../model/tbl_file/select/select_rejected_excel.php", "#tbl_rejected_excel");
                        },
                        cache: false,
                        contentType: false,
                        processData: false
                    });//end of ajax

                    return false;
              }//end of if

              else {
                swal({
                title: 'Error',
                text: "note: Wrong file extension",
                type: 'error',
                confirmButtonText: 'Ok',
                confirmButtonClass: 'btn waves-effect green darken-2',
                buttonsStyling: false
                });//end of swal
              }//end of else

            }//end of if

            else {
              swal({
              title: 'Error',
              text: "note: File cannot be empty",
              type: 'error',
              confirmButtonText: 'Ok',
              confirmButtonClass: 'btn waves-effect green darken-2',
              buttonsStyling: false
              });//end of swal
            }




       });//end of onclick



       $('#btn_reject_excel').on('click', function(event) {
        reject_excel("../../model/tbl_file/update/reject_excel.php","#frm_reject_excel");
      });//end of onclick


      //view reason content
      $(document).on('click', '.btn_reason', function() {
        var comment = $(this).attr('data-comment');

        swal({
          title: 'Reason',
          text: comment,
          type: 'info',
          confirmButtonText: 'Ok',
          confirmButtonClass: 'btn waves-effect green darken-2',
          buttonsStyling: false
        })

      });//end of onclick

      //delete_excel
      $(document).on('click', '.delete_excel', function() {
       //bind html5 data attributes to variables
       var delete_id = $(this).attr('data-delete-id');
        //set values to id
        $('#delete_id').val(delete_id);
        //show modal
        $('.trgr_delete_excel').trigger('click');
       });//end of onclick


       $('#btn_delete_excel').on('click', function(event) {
        delete_excel("../../model/tbl_file/delete/delete_excel.php", "#frm_delete_excel");
      });//end of onclick

    });//end of document.ready

    $("#frm_edit_excel").validate({//form validation
      rules:{
        file_proxy: {required: true}
      },//end of rules

      messages: {
        file_proxy: {required: "<small class='right val red-text'>This field is required</small>"}
        },//end of messages

      errorElement : 'div',
      errorPlacement: function(error, element) {
        var placement = $(element).data('error');
        if (placement) {
          $(placement).append(error)
        } else {
          error.insertAfter(element);
        }
      }//end of errorElement
    });//end of validate


    //////////////////////Functions///////////////////////
    function select_pending_excel(model_url, html_class_OR_id){
      $.ajax({
        url:  model_url,
        method: "GET",
        success:function(Result){
        //push the result on id or class
          $(html_class_OR_id).html(Result);
        },//end of success function
        complete:function(){
          //initialize pagination after data loaded
          var monkeyList = new List('list_pending_excel', {
            valueNames: ['excel','name','sender','signatories'],
            page: 7,
            plugins: [ ListPagination({}) ]
          });
        }//end of complete function

      })
    }//end of select_pending_user

    function select_rejected_excel(model_url, html_class_OR_id){
      $.ajax({
        url:  model_url,
        method: "GET",
        success:function(Result){
        //push the result on id or class
          $(html_class_OR_id).html(Result);
        },//end of success function
        complete:function(){
          //initialize pagination after data loaded
          var monkeyList = new List('list_rejected_excel', {
            valueNames: ['doc_id','name','disapproved'],
            page: 7,
            plugins: [ ListPagination({}) ]
          });
        }//end of complete function

      })
    }//end of select_pending_user


    function select_publish_excel(model_url, html_class_OR_id){
      $.ajax({
        url:  model_url,
        method: "GET",
        success:function(Result){
        //push the result on id or class
          $(html_class_OR_id).html(Result);
        },//end of success function
        complete:function(){
          //initialize pagination after data loaded
          var monkeyList = new List('list_publish_excel', {
            valueNames: ['doc_id','name','disapproved'],
            page: 7,
            plugins: [ ListPagination({}) ]
          });
        }//end of complete function

      })
    }//end of select_pending_user

    function approve_excel(model_url,form_name){
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
            Materialize.toast("Efile Approved", 8000, 'green darken-2');
          }
        },//end of success function

        complete:function( ){
          select_pending_excel("../../model/tbl_file/select/select_pending_excel.php", "#tbl_pending_excel");
        }//end of complete function
      })//end of ajax
    }//end of delete_template

    function reject_excel(model_url,form_name){
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
            Materialize.toast("Efile Rejected", 8000, 'green darken-2');
          }
        },//end of success function

        complete:function( ){
          select_pending_excel("../../model/tbl_file/select/select_pending_excel.php", "#tbl_pending_excel");
        }//end of complete function
      })//end of ajax
    }//end of delete_template

    function delete_excel(model_url,form_name){
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
            Materialize.toast("Efile Deleted", 8000, 'green darken-2');
          }
        },//end of success function

        complete:function( ){
            select_rejected_excel("../../model/tbl_file/select/select_rejected_excel.php", "#tbl_rejected_excel");
        }//end of complete function
      })//end of ajax
    }//end of delete_template

    function publish_excel(model_url,form_name){
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
            Materialize.toast("Spreadsheet published successfully", 8000, 'green darken-2');
          }
        },//end of success function

        complete:function( ){
          select_publish_excel("../../model/tbl_file/select/select_publish_excel.php", "#tbl_publish_efile")
        }//end of complete function
      })//end of ajax
    }//end of delete_template



  </script>
</html>
