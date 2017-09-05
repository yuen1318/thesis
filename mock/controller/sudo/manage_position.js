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