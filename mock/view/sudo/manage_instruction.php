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

      <div class="col s12 m12 l12" id="list_instruction" ><!--Table-->
        <div class="row">
          <div class="col s12 m6 l6">
            <h5>Manage Instructions</h5>
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
                <th>Name</th>
                <th>Access</th>
                <th colspan="2">Action</th>

            </tr>
          </thead><!--end of thead-->

          <tbody class="list" id="tbl_instruction"></tbody><!--end of tbody-->
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
      <a href="#add_instruction_modal" class="btn-floating btn-large blue-grey darken-3 btn tooltipped waves-effect fa fa-plus fa-lg" data-position="left" data-delay="50" data-tooltip="Add position"></a>
      </div>
    </div>

  <!-- Modal Structure -->
 
  <form id="frm_add_instruction">
    <div id="add_instruction_modal" class="modal">
        <div class="modal-content">
        <h4>Add Instruction</h4><br>

        <div class="row">
            <div class="input-field col s12 m12 l12">
                <label for="name">Instruction Name</label>
                <input type="text" name="name" id="name">
            </div>
        </div>

        <div class="row">
            <div class="input-field col s6 m6 l6">
                <label for="url">Video Url</label>
                <input type="text" name="url" id="url">
            </div>

            <div class="input-field col s6 m6 l6">
                <label class="active">Access</label>
                    <select  name="access"  class="browser-default">
                        <option disabled selected>Select Access</option>
                        <option value="user">User</option>
                        <option value="admin">Admin</option>
                </select>
            </div><!--end of access-->

        </div>

  

            
        </div><!--end of modal content-->

        <div class="modal-footer">
            <button type="button" class="waves-effect blue-grey darken-3 btn-flat white-text" id="btn_add_instruction">Add</button>
        </div>
    </div>
  </form>


<a href="#delete_position_modal" class="hide trgr_delete_position blue-grey darken-3 btn waves-effect fa fa-trash fa-lg"></a>
    <form id="frm_delete_position">
    <div id="delete_position_modal" class="modal">
        <div class="modal-content">
        <h4>Delete Position</h4><br>
            <p>Are you sure you want to delete this position?</p>

            <div class="input-field hide ">
                <label for="delete_id">ID</label>
                <input type="text" name="delete_id" id="delete_id">
            </div>
        </div><!--end of modal content-->

        <div class="modal-footer">
            <button type="button" class="waves-effect blue-grey darken-3 btn-flat white-text" id="btn_delete_position">Delete</button>
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
    
    manage_instruction("../../model/tbl_instruction/select/manage_instruction.php", "#tbl_instruction");
    
       

       $(document).on('click', '.delete_position', function () {
           //bind html5 data attributes to variables
           var delete_id = $(this).attr('data-delete-position-id');
           //set values to id
           $('#delete_id').val(delete_id);
           //show modal
           $('.trgr_delete_position').trigger('click');
       }); //end of onclick


       $('#btn_delete_position').on('click', function (event) {
            delete_position("../../model/tbl_position/delete/delete_position.php", "#frm_delete_position");
       }); //end of onclick

 


       $('#btn_add_instruction').on('click', function () { //validate on btn click
           if ($("#frm_add_instruction").valid()) { //check if all field is valid
              add_instruction("../../model/tbl_instruction/insert/add_instruction.php", "#frm_add_instruction");
            } 
       }); //end of btn click



       ///////////////////////Form Validation////////////////////
       $("#frm_add_instruction").validate({ //form validation
           rules: {
               name: {
                   required: true
               },
               url:{
                required: true,
                url : true
               },
               access: {
                   required: true
               }
           }, //end of rules

           messages: {
               name: {
                   required: "<small class='animated bounceIn right val red-text'>This field is required</small>"
               },
               url: {
                   required: "<small class='animated bounceIn right val red-text'>This field is required</small>",
                   url: "<small class='animated bounceIn right val red-text'>Must be a valid url</small>"
               },
               access: {
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


 function manage_instruction(model_url, html_class_OR_id) {
     $.ajax({
             url: model_url,
             method: "GET",
             success: function(Result) {
                 //push the result on id or class
                 $(html_class_OR_id).html(Result);
      
             }, //end of success function
             complete: function() {
                     //initialize pagination after data loaded
                     var monkeyList = new List('list_instruction', {
                         valueNames: ['id', 'name', 'access'],
                         page: 8,
                         plugins: [ListPagination({})]
                     });
                 } //end of complete function
                 
         }) //end of ajax
 } //end of select_template


   function add_instruction(model_url, form_name) {
       $.ajax({
           url: model_url,
           method: "POST",
           data: $(form_name).serialize(),
           dataType: "text",
           success: function (Result) {
               if (Result == "error") {
                   Materialize.toast("Sorry an error occured", 8000, 'red');
               } else if (Result == "success") {
                   Materialize.toast("Instruction successfully added", 8000, 'blue-grey darken-3');
                  
               }
           }, //end of success function

           complete: function () {   
             $(form_name)[0].reset();
              $('#add_instruction_modal').modal('close');
              manage_instruction("../../model/tbl_instruction/select/manage_instruction.php", "#tbl_instruction");
            } //end of complete function

       }) //end of ajax
   } //end of delete_department


   

   function delete_position(model_url, form_name) {
       $.ajax({
           url: model_url,
           method: "POST",
           data: $(form_name).serialize(),
           dataType: "text",
           success: function (Result) {
               if (Result == "error") {
                   Materialize.toast("Sorry an error occured", 8000, 'red');
               } else if (Result == "success") {
                   Materialize.toast("Position successfully deleted", 8000, 'blue-grey darken-3');
               }
           }, //end of success function

           complete: function () {
            $(form_name)[0].reset();
              $('#delete_position_modal').modal('close');
              manage_position("../../model/tbl_position/select/manage_position.php", "#tbl_position");
            } //end of complete function

       }) //end of ajax
   } //end of delete_department

   

  </script>


</html>
