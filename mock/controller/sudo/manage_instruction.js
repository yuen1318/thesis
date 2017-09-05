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
       
    