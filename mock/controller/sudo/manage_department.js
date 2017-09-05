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
                if ($("#frm_delete_department").valid()) { //check if all field is valid
                delete_department("../../model/tbl_department/delete/delete_department.php", "#frm_delete_department");
                $('#delete_department_modal').modal('close');
                $('#delete_pw').val("");
    
              } else {
                $('.val').addClass('animated bounceIn');
                $('.val').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
                $('.val').removeClass('animated');
                });
              } //end of else
    
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
    
            if ($("#frm_edit_department").valid()) { //check if all field is valid
                edit_department("../../model/tbl_department/update/edit_department.php", "#frm_edit_department");
                $('#edit_department_modal').modal('close');
                $('#edit_pw').val("");
    
              } else {
                $('.val').addClass('animated bounceIn');
                $('.val').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
                $('.val').removeClass('animated');
                });
              } //end of else
                
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
    
           $("#frm_delete_department").validate({ //form validation
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
    
            $("#frm_edit_department").validate({ //form validation
              rules: {
                department:{
                    required: true
                },
                edit_pw: {
                  required: true,
                  equalTo: "#edit_rpw"
                }
              }, //end of rules
              messages: {
                department: {
                  required: "<small class='right val red-text'>This field is required</small>"
                },
                edit_pw: {
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