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

      <div class="col s12 m12 l12" id="list_position" ><!--Table-->
        <div class="row">
          <div class="col s12 m6 l6">
            <h5>Manage Position</h5>
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
                <th>Position</th>
                <th>Action</th>

            </tr>
          </thead><!--end of thead-->

          <tbody class="list" id="tbl_position"></tbody><!--end of tbody-->
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
      <a href="#add_position_modal" class="btn-floating btn-large blue-grey darken-3 btn tooltipped waves-effect fa fa-plus fa-lg" data-position="left" data-delay="50" data-tooltip="Add position"></a>
      </div>
    </div>

  <!-- Modal Structure -->
 
  <form id="frm_add_position">
    <div id="add_position_modal" class="modal">
        <div class="modal-content">
        <h4>Add Position</h4><br>
            <div class="input-field col s12 m3 l3">
                <label class="active">Department</label>
                <select name="department" class="transparent browser-default" id="select_department">
                 <!--content from database-->
                </select>
            </div>

            <div class="input-field col s12 m3 l3">
                <label for="position">Position</label>
                <input type="text" name="position" id="position">
            </div>

            
        </div><!--end of modal content-->

        <div class="modal-footer">
            <button type="button" class="waves-effect blue-grey darken-3 btn-flat white-text" id="btn_add_position">Add</button>
        </div>
    </div>
  </form>


<a href="#delete_position_modal" class="hide trgr_delete_position blue-grey darken-3 btn waves-effect fa fa-trash fa-lg"></a>
    <form id="frm_delete_position">
    <div id="delete_position_modal" class="modal">
        <div class="modal-content">
        <h4>Delete Position</h4><br>
            <p>Are you sure you want to delete this position?</p>

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
    manage_position("../../model/tbl_position/select/manage_position.php", "#tbl_position");
    select_department("../../model/tbl_department/select/select_department.php", "#select_department");
        

       $(document).on('click', '.delete_position', function () {
           //bind html5 data attributes to variables
           var delete_id = $(this).attr('data-delete-position-id');
           //set values to id
           $('#delete_id').val(delete_id);
           //show modal
           $('.trgr_delete_position').trigger('click');
       }); //end of onclick


       $('#btn_delete_position').on('click', function (event) {
            if ($("#frm_delete_position").valid()) { //check if all field is valid
            delete_position("../../model/tbl_position/delete/delete_position.php", "#frm_delete_position");
            $('#delete_position_modal').modal('close');
            $('#delete_pw').val("");

          } else {
            $('.val').addClass('animated bounceIn');
            $('.val').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
            $('.val').removeClass('animated');
            });
          } //end of else


       }); //end of onclick

  


       $('#btn_add_position').on('click', function () { //validate on btn click
           if ($("#frm_add_position").valid()) { //check if all field is valid
              add_position("../../model/tbl_position/insert/add_position.php", "#frm_add_position");
            } 
       }); //end of btn click



       ///////////////////////Form Validation////////////////////
       $("#frm_add_position").validate({ //form validation
           rules: {
               department: {
                   required: true
               },
               position:{
                required: true 
               }
           }, //end of rules

           messages: {
               department: {
                   required: "<small class='animated bounceIn right val red-text'>This field is required</small>"
               },
               position: {
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


       $("#frm_delete_position").validate({ //form validation
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

   }); //end of document.ready


   //////////////////////Functions///////////////////////

   function select_department(model_url, html_class_OR_id) {
     $.ajax({
             url: model_url,
             method: "GET",
             success: function(Result) {
                 //push the result on id or class
                 $(html_class_OR_id).html(Result);
             } //end of success function  
         }) //end of ajax
 } //end of select_template 

 function manage_position(model_url, html_class_OR_id) {
     $.ajax({
             url: model_url,
             method: "GET",
             success: function(Result) {
                 //push the result on id or class
                 $(html_class_OR_id).html(Result);
      
             }, //end of success function
             complete: function() {
                     //initialize pagination after data loaded
                     var monkeyList = new List('list_position', {
                         valueNames: ['id', 'department', 'position'],
                         page: 8,
                         plugins: [ListPagination({})]
                     });
                 } //end of complete function
                 
         }) //end of ajax
 } //end of select_template


   function add_position(model_url, form_name) {
       $.ajax({
           url: model_url,
           method: "POST",
           data: $(form_name).serialize(),
           dataType: "text",
           success: function (Result) {
               if (Result == "error") {
                   Materialize.toast("Sorry an error occured", 8000, 'red');
               } else if (Result == "success") {
                   Materialize.toast("Position successfully added", 8000, 'blue-grey darken-3');
                  
               }
           }, //end of success function

           complete: function () {   
             $(form_name)[0].reset();
              $('#add_position_modal').modal('close');
              manage_position("../../model/tbl_position/select/manage_position.php", "#tbl_position");
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
