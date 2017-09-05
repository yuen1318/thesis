$(document).ready(function() {
    
       
         //disable enter key
         $('.input-field').keypress(function(event) {
             if (event.keyCode == 13) {
                 event.preventDefault();
             }
         });
    
    
         //validate step 1
         $('#btn_send').on('click', function() { //validate on btn click
    
             if ($('#file_proxy').valid()) {
                 var file_name = $('#restore').val();
                 var file_extension = file_name.split('.')[1];
                 var final_extension = file_extension.toLowerCase();
    
                 var file_check = file_name.replace(/^.*[\\\/]/, '');
    
                 if (final_extension == "sql") {
                  if( file_check  == "mock.sql"){
                   $("#frm_restore").submit();
                  }
                  else{
    
                    swal({
                         title: 'Error',
                         text: "File name must be mock.sql" ,
                         type: 'error',
                         confirmButtonText: 'Ok',
                         confirmButtonClass: 'btn waves-effect teal lighten-1',
                         buttonsStyling: false
                     }); //end of swal
                  }
                    
                 } //end of if
                 else {
                     swal({
                         title: 'Error',
                         text: "note: Document type must not be empty and only sql extensions are allowed",
                         type: 'error',
                         confirmButtonText: 'Ok',
                         confirmButtonClass: 'btn waves-effect teal lighten-1',
                         buttonsStyling: false
                     }); //end of swal
                 } //end of else
    
             } else {
                 swal({
                     title: 'Error',
                     text: "note: Document type must not be empty and only sql extensions are allowed",
                     type: 'error',
                     confirmButtonText: 'Ok',
                     confirmButtonClass: 'btn waves-effect teal lighten-1',
                     buttonsStyling: false
                 }); //end of swal
             } //end of else
         }); //end of btn click
    
         
    
    
         $("#frm_restore").validate({ //form validation
             rules: {
                 file_proxy: {
                     required: true
                 }
             }, //end of rules
             messages: {
                 file_proxy: {
                     required: "<small class='right val red-text'>This field is required</small>"
                 }
             }, //end of messages
             errorElement: 'div',
             errorPlacement: function(error, element) {
                     var placement = $(element).data('error');
                     if (placement) {
                         $(placement).append(error)
                     } else {
                         error.insertAfter(element);
                     }
                 } //end of errorElement
         }); //end of validate
    
     }); //end of document.ready
    