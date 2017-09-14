     $(document).ready(function() {
 

     $('#btn_frm_change_password').on('click', function() { //validate on btn click
         if ($("#frm_change_password").valid()) { //check if all field is valid
             update_admin_password("../../model/tbl_sudo/update/update_sudo_password.php", "#frm_change_password");
         } else {
             $('.val').addClass('animated bounceIn');
             $('.val').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
                 $('.val').removeClass('animated');
             });
         } //end of else
     }); //end of btn click

 

     $("#frm_change_password").validate({ //form validation
         rules: {
             password: {
                 required: true,
                 nowhitespace: true,
                 minlength: 6
             },
             rpassword: {
                 required: true,
                 nowhitespace: true,
                 equalTo: "#password"
             }

         }, //end of rules
         messages: {
             password: {
                 required: "<small class='right val red-text'>This field is required</small>",
                 nowhitespace: "<small class='right val red-text'>White spaces are invalid</small>",
                 minlength: "<small class='right val red-text'>Minimum password character is 6</small>"
             },
             rpassword: {
                 required: "<small class='right val red-text'>This field is required</small>",
                 nowhitespace: "<small class='right val red-text'>White spaces are invalid</small>",
                 equalTo: "<small class='right val red-text'>Password didn't match</small>"
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

 //////////////Functions////////////
 
 
 
 function update_admin_password(model_url, form_name) {
     $.ajax({
             url: model_url,
             method: "POST",
             data: $(form_name).serialize(),
             dataType: "text",
             success: function(Result) {
                     if (Result == "error") {
                         alert("error");
                     } else if (Result == "success") {
                         Materialize.toast("Password successfully changed", 8000, 'blue-grey darken-3');
                     }
                 } //end of success function
         }) //end of ajax
 } //end of update_admin_password