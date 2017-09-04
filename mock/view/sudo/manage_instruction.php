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
                <th colspan="3">Action</th>

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


<a href="#delete_instruction_modal" class="hide trgr_delete_instruction blue-grey darken-3 btn waves-effect fa fa-trash fa-lg"></a>
    <form id="frm_delete_instruction">
    <div id="delete_instruction_modal" class="modal">
        <div class="modal-content">
        <h4>Delete Instruction</h4><br>
            <p>Are you sure you want to delete this instruction?</p>

            <div class="row hide">
                <div class="col s6">
                    <input type="text" name="delete_id" id="delete_id">
                </div>    

                <div class="col s6">
                    <input type="text" name="delete_rpw" id="delete_rpw" value="<?php echo $_SESSION['sudo_pw']?>">
                </div> 
            </div>

            <div class="row">
              <div class="col s12">
                <label for="delete_pw">Authenticate</label>
                <input type="password" class="active" name="delete_pw" id="delete_pw" placeholder="Password">
              </div>
            </div>

        </div><!--end of modal content-->

        <div class="modal-footer">
            <button type="button" class="waves-effect blue-grey darken-3 btn-flat white-text" id="btn_delete_instruction">Delete</button>
        </div>
    </div>
  </form>

  <a href="#edit_instruction_modal" class="hide trgr_edit_instruction blue-grey darken-3 btn waves-effect fa fa-trash fa-lg"></a>
    <form id="frm_edit_instruction">
    <div id="edit_instruction_modal" class="modal">
        <div class="modal-content">
        <h4>Edit Instruction</h4><br>
            <p>Are you sure you want to edit this instruction?</p>

            <div class="row hide">
                <div class="col s6">
                    <input type="text" name="edit_id" id="edit_id">
                </div>   

                <div class="col s6">
                    <input type="text" name="edit_rpw" id="edit_rpw" value="<?php echo $_SESSION['sudo_pw']?>">
                </div>  
            </div>

            <div class="row">
                <div class=" col s12 m12 l12">
                    <label  for="edit_name">Instruction Name</label>
                    <input  type="text" name="edit_name" id="edit_name">
                </div>
            </div>

            <div class="row">
                <div class=" col s6 m6 l6">
                    <label  for="edit_url">Video Url</label>
                    <input type="text" name="edit_url" id="edit_url">
                </div>

                <div class="input-field col s6 m6 l6">
                    <label class="active">Access</label>
                        <select  name="edit_access"  class="browser-default">
                            <option disabled selected>Select Access</option>
                            <option value="user">User</option>
                            <option value="admin">Admin</option>
                    </select>
                </div><!--end of access-->

            </div>

            <div class="row">
              <div class="col s12">
                <label for="edit_pw">Authenticate</label>
                <input type="password" class="active" name="edit_pw" id="edit_pw" placeholder="Password">
              </div>
            </div>
            
        </div><!--end of modal content-->

        <div class="modal-footer">
            <button type="button" class="waves-effect blue-grey darken-3 btn-flat white-text" id="btn_edit_instruction">Edit</button>
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
    
       

       $(document).on('click', '.delete_instruction', function () {
           //bind html5 data attributes to variables
           var delete_id = $(this).attr('data-delete-instruction-id');
           //set values to id
           $('#delete_id').val(delete_id);
           //show modal
           $('.trgr_delete_instruction').trigger('click');
       }); //end of onclick


       $('#btn_delete_instruction').on('click', function (event) {

        if ($("#frm_delete_instruction").valid()) { //check if all field is valid
            delete_instruction("../../model/tbl_instruction/delete/delete_instruction.php", "#frm_delete_instruction");
            $('#delete_instruction_modal').modal('close');
            $('#delete_pw').val("");

          } else {
            $('.val').addClass('animated bounceIn');
            $('.val').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
            $('.val').removeClass('animated');
            });
          } //end of else
        
       }); //end of onclick


       $(document).on('click', '.edit_instruction', function () {
           //bind html5 data attributes to variables
           var edit_id = $(this).attr('data-edit-instruction-id');
           var edit_name = $(this).attr('data-edit-instruction-name');
           
           var edit_url = $(this).attr('data-edit-instruction-url');
           //set values to id
           $('#edit_id').val(edit_id);
           $('#edit_name').val(edit_name);
           
           $('#edit_url').val(edit_url);
           //show modal
           $('.trgr_edit_instruction').trigger('click');
       }); //end of onclick


       $('#btn_edit_instruction').on('click', function (event) {
        if ($("#frm_edit_instruction").valid()) { //check if all field is valid
            edit_instruction("../../model/tbl_instruction/update/edit_instruction.php", "#frm_edit_instruction");
            $('#edit_instruction_modal').modal('close');
            $('#edit_pw').val("");
            $('#edit_url').val("");
            $('#edit_name').val("");

          } else {
            $('.val').addClass('animated bounceIn');
            $('.val').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
            $('.val').removeClass('animated');
            });
          } //end of else
            
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


       $("#frm_delete_instruction").validate({ //form validation
          rules: {
            delete_pw: {
              required: true,
              equalTo: "#delete_rpw"
            }
          }, //end of rules
          messages: {
            delete_pw: {
              required: "<small class='right val red-text'>This field is required</small>",
              equalTo: "<small class='right val red-text'>Wrong password!</small>"
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


        $("#frm_edit_instruction").validate({ //form validation
           rules: {
            edit_pw: {
              required: true,
              equalTo: "#edit_rpw"
            },
               edit_name: {
                   required: true
               },
               edit_url:{
                required: true,
                url : true
               },
               edit_access: {
                   required: true
               }
           }, //end of rules

           messages: {
            edit_pw: {
              required: "<small class='right val red-text'>This field is required</small>",
              equalTo: "<small class='right val red-text'>Wrong password!</small>"
            },
            edit_name: {
                   required: "<small class='animated bounceIn right val red-text'>This field is required</small>"
               },
               edit_url: {
                   required: "<small class='animated bounceIn right val red-text'>This field is required</small>",
                   url: "<small class='animated bounceIn right val red-text'>Must be a valid url</small>"
               },
               edit_access: {
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


   

   function delete_instruction(model_url, form_name) {
       $.ajax({
           url: model_url,
           method: "POST",
           data: $(form_name).serialize(),
           dataType: "text",
           success: function (Result) {
               if (Result == "error") {
                   Materialize.toast("Sorry an error occured", 8000, 'red');
               } else if (Result == "success") {
                   Materialize.toast("Instruction successfully deleted", 8000, 'blue-grey darken-3');
               }
           }, //end of success function

           complete: function () {
            $(form_name)[0].reset();
              $('#delete_instruction_modal').modal('close');
              manage_instruction("../../model/tbl_instruction/select/manage_instruction.php", "#tbl_instruction");
            } //end of complete function

       }) //end of ajax
   } //end of delete_department


   function edit_instruction(model_url, form_name) {
       $.ajax({
           url: model_url,
           method: "POST",
           data: $(form_name).serialize(),
           dataType: "text",
           success: function (Result) {
               if (Result == "error") {
                   Materialize.toast("Sorry an error occured", 8000, 'red');
               } else if (Result == "success") {
                   Materialize.toast("Instruction successfully edited", 8000, 'blue-grey darken-3');
               }
           }, //end of success function

           complete: function () {
            $(form_name)[0].reset();
              $('#edit_instruction_modal').modal('close');
              manage_instruction("../../model/tbl_instruction/select/manage_instruction.php", "#tbl_instruction");
            } //end of complete function

       }) //end of ajax
   } //end of delete_department
   

  </script>


</html>
