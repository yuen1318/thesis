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
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  </head>
  <body class="grey lighten-3">

      <?php require 'nav.php'; ?>
    <div class="container">
            <div class="row">

      <div class="col s12 m12 l12" id="list_department" ><!--Table-->
        <div class="row">
          <div class="col s12 m6 l6">
            <h5>Manage Department</h5>
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
                <th>Department Name</th>
                <th colspan="2">Action</th>

            </tr>
          </thead><!--end of thead-->

          <tbody class="list" id="tbl_department"></tbody><!--end of tbody-->
        </table><!--end of table-->

        <tfoot>
          <tr>
            <td><ul class="pagination center"></ul></td>
          </tr>
        </tfoot><!--end of tfoot-->
      </div><!--end of col s12-->

    </div><!--end of row-->



<!-- Modal Trigger -->
    <div class="row">
      <div class="fixed-action-btn vertical">
      <a href="#add_department_modal" class="btn-floating btn-large blue-grey darken-3 btn tooltipped waves-effect fa fa-plus fa-lg" data-position="left" data-delay="50" data-tooltip="Add department"></a>
      </div>
    </div>

  <!-- Modal Structure -->
 
  <form id="frm_add_department">
    <div id="add_department_modal" class="modal">
        <div class="modal-content">
        <h4>Add Department</h4><br>
            <div class="input-field col s12 m3 l3">
                <label for="department">Department</label>
                <input type="text" name="department" id="department">
            </div>
        </div><!--end of modal content-->

        <div class="modal-footer">
            <button type="button" class="waves-effect blue-grey darken-3 btn-flat white-text" id="btn_add_department">Add</button>
        </div>
    </div>
  </form>


<a href="#delete_department_modal" class="hide trgr_delete_department blue-grey darken-3 btn waves-effect fa fa-trash fa-lg"></a>
    <form id="frm_delete_department">
    <div id="delete_department_modal" class="modal">
        <div class="modal-content">
        <h4>Delete Department</h4><br>
            <p>Are you sure you want to delete this department?</p>

            <div class="input-field hide">
                <label for="delete_id">ID</label>
                <input type="text" name="delete_id" id="delete_id">
            </div>
        </div><!--end of modal content-->

        <div class="modal-footer">
            <button type="button" class="waves-effect blue-grey darken-3 btn-flat white-text" id="btn_delete_department">Delete</button>
        </div>
    </div>
  </form>

  <a href="#edit_department_modal" class="hide trgr_edit_department blue-grey darken-3 btn waves-effect fa fa-pencil fa-lg"></a>
    <form id="frm_edit_department">
    <div id="edit_department_modal" class="modal">
        <div class="modal-content">
        <h4>Edit Department</h4><br>

            <div class="input-field col s12 m12 l12 hide">
                <label for"edit_id">ID</label>
                <input class="active" type="text" name="edit_id" id="edit_id">
            </div>

            <div class="input-field col s12 m12 l12">
                <label for="edit_department">Department</label>
                <input type="text" name="department" id="edit_department">
            </div>
        </div><!--end of modal content-->

        <div class="modal-footer">
            <button type="button" class="waves-effect blue-grey darken-3 btn-flat white-text" id="btn_edit_department">Edit</button>
        </div>
    </div>
  </form>





</div><!--end of container-->


  </body>

  <script src="../../assets/jquery/jquery.min.js" charset="utf-8"></script>
  <script src="../../assets/jquery/jquery.validate.min.js" charset="utf-8"></script>
  <script src="../../assets/jquery/jquery.additionalMethod.min.js" charset="utf-8"></script>
  <script src="../../assets/materialize/js/materialize.min.js" charset="utf-8"></script>
  <script src="../../assets/listjs/list.min.js" charset="utf-8"></script>
  <script src="../../assets/listjs/list.pagination.min.js" charset="utf-8"></script>
  <script src="../../controller/sudo/fetch_sudo_notif.js" charset="utf-8"></script>
  <script charset="utf-8">
   $(document).ready(function () {

   $('.input-field').keypress(function(event) {
        if (event.keyCode == 13) {
            event.preventDefault();
        }
    });

      
       manage_department("../../model/tbl_department/select/manage_department.php", "#tbl_department");

       $(document).on('click', '.delete_department', function () {
           //bind html5 data attributes to variables
           var delete_id = $(this).attr('data-delete-department-id');
           //set values to id
           $('#delete_id').val(delete_id);
           //show modal
           $('.trgr_delete_department').trigger('click');
       }); //end of onclick


       $('#btn_delete_department').on('click', function (event) {
            delete_department("../../model/tbl_department/delete/delete_department.php", "#frm_delete_department");
       }); //end of onclick

       $(document).on('click', '.edit_department', function () {
           //bind html5 data attributes to variables
           var edit_id = $(this).attr('data-edit-department-id');
           //set values to id
           $('#edit_id').val(edit_id);
           //show modal
           $('.trgr_edit_department').trigger('click');
       }); //end of onclick


       $('#btn_edit_department').on('click', function (event) {
            edit_department("../../model/tbl_department/update/edit_department.php", "#frm_edit_department");
       }); 



       $('#btn_add_department').on('click', function () { //validate on btn click
           if ($("#frm_add_department").valid()) { //check if all field is valid
                add_department("../../model/tbl_department/insert/add_department.php", "#frm_add_department");        
           } 
       }); //end of btn click



       ///////////////////////Form Validation////////////////////
       $("#frm_add_department").validate({ //form validation
           rules: {
               department: {
                   required: true
               }
           }, //end of rules

           messages: {
               department: {
                   required: "<small class='animated bounceIn right val red-text'>This field is required</small>"
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
   function add_department(model_url, form_name) {
       $.ajax({
           url: model_url,
           method: "POST",
           data: $(form_name).serialize(),
           dataType: "text",
           success: function (Result) {
               if (Result == "error") {
                   Materialize.toast("Sorry an error occured", 8000, 'red');
               } else if (Result == "success") {
                   Materialize.toast("Department successfully added", 8000, 'blue-grey darken-3');
                  
               }
           }, //end of success function

           complete: function () {   
             $(form_name)[0].reset();
              $('#add_department_modal').modal('close');
              manage_department("../../model/tbl_department/select/manage_department.php", "#tbl_department");
           } //end of complete function

       }) //end of ajax
   } //end of delete_department

      function edit_department(model_url, form_name) {
       $.ajax({
           url: model_url,
           method: "POST",
           data: $(form_name).serialize(),
           dataType: "text",
           success: function (Result) {
               if (Result == "error") {
                   Materialize.toast("Sorry an error occured", 8000, 'red');
               } else if (Result == "success") {
                   Materialize.toast("Department successfully updated", 8000, 'blue-grey darken-3');
                  
               }
           }, //end of success function

           complete: function () {   
             $(form_name)[0].reset();
              $('#edit_department_modal').modal('close');
              manage_department("../../model/tbl_department/select/manage_department.php", "#tbl_department");
           } //end of complete function

       }) //end of ajax
   } //end of delete_department
   
   function manage_department(model_url, html_class_OR_id) {
       $.ajax({
           url: model_url,
           method: "GET",
           success: function (Result) {
               //push the result on id or class
               $(html_class_OR_id).html(Result);
           }, //end of success function
           complete: function () {
               //initialize pagination after data loaded
               var monkeyList = new List('list_department', {
                   valueNames: ['name'],
                   page: 8,
                   plugins: [ListPagination({})]
               });
           } //end of complete function

       })
   } //end of select_pending_user



   function delete_department(model_url, form_name) {
       $.ajax({
           url: model_url,
           method: "POST",
           data: $(form_name).serialize(),
           dataType: "text",
           success: function (Result) {
               if (Result == "error") {
                   Materialize.toast("Sorry an error occured", 8000, 'red');
               } else if (Result == "success") {
                   Materialize.toast("Department successfully deleted", 8000, 'blue-grey darken-3');
               }
           }, //end of success function

           complete: function () {
               $(form_name)[0].reset();
              $('#delete_department_modal').modal('close');
               manage_department("../../model/tbl_department/select/manage_department.php", "#tbl_department");
           } //end of complete function

       }) //end of ajax
   } //end of delete_department

  </script>


</html>
