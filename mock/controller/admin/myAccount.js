     $(document).ready(function() {

        
     //get department
   
     $('#btn_frm_info').on('click', function() { //validate on btn click
         if ($("#frm_info").valid()) { //check if all field is valid
             update_admin_info("../../model/tbl_admin/update/update_admin_info.php", "#frm_info");
         } else {
             $('.val').addClass('animated bounceIn');
             $('.val').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
                 $('.val').removeClass('animated');
             });
         } //end of else
     }); //end of btn click

     $('#frm_update_profile_picture').on('submit', function(e) { //validate on btn click
         e.preventDefault();

         var file_name = $('.file-path').val();
         var file_extension = file_name.split('.')[1];

         if (file_extension.toLowerCase() == 'jpg' || file_extension.toLowerCase() == 'jpeg') {
             $.ajax({
                     url: "../../model/tbl_admin/update/update_admin_profile_picture.php",
                     method: "POST",
                     data: new FormData(this),
                     contentType: false,
                     processData: false,
                     success: function(Result) {
                             if (Result == "big") {
                                 swal({
                                     title: 'Error',
                                     text: "File size to big, 2mb is the allowed size",
                                     type: 'error',
                                     confirmButtonText: 'Ok',
                                     confirmButtonClass: 'btn waves-effect teal lighten-1',
                                     buttonsStyling: false
                                 })
                             } //end of if
                             else if (Result == "success") {
                                 location.reload(true);
                             } //end of else if
                             else {
                                 swal({
                                     title: 'Error',
                                     text: "An error has occured",
                                     type: 'error',
                                     confirmButtonText: 'Ok',
                                     confirmButtonClass: 'btn waves-effect teal lighten-1',
                                     buttonsStyling: false
                                 })
                             } //end of else
                         } //end of success function
                 }) //end of ajax
         } //end of if
         else {
             swal({
                     title: 'Error',
                     text: "Only jpg files are allowed",
                     type: 'error',
                     confirmButtonText: 'Ok',
                     confirmButtonClass: 'btn waves-effect teal lighten-1',
                     buttonsStyling: false
                 }) //end of swal
         } //end of else
     }); //end of btn click

     $('#btn_frm_signature').on('click', function() { //validate on btn click
         if ($("#frm_signature").valid()) { //check if all field is valid
             update_admin_signature("../../model/tbl_admin/update/update_admin_signature.php", "#frm_signature");
         } else {
             $('.val').addClass('animated bounceIn');
             $('.val').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
                 $('.val').removeClass('animated');
             });
         } //end of else
     }); //end of btn click

     $('#btn_frm_change_password').on('click', function() { //validate on btn click
         if ($("#frm_change_password").valid()) { //check if all field is valid
             update_admin_password("../../model/tbl_admin/update/update_admin_password.php", "#frm_change_password");
         } else {
             $('.val').addClass('animated bounceIn');
             $('.val').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
                 $('.val').removeClass('animated');
             });
         } //end of else
     }); //end of btn click

     $("#frm_info").validate({ //form validation
         rules: {
             fn: {
                 required: true
             },
             ln: {
                 required: true
             },
             mn: {
                 required: true
             },
             mobile: {
                 required: true,
                 number: true
             },
             title: {
                 required: true
             },
         }, //end of rules
         messages: {
             fn: {
                 required: "<small class='right val red-text'>This field is required</small>"
             },
             ln: {
                 required: "<small class='right val red-text'>This field is required</small>"
             },
             mn: {
                 required: "<small class='right val red-text'>This field is required</small>"
             },
             mobile: {
                 required: "<small class='right val red-text'>This field is required</small>",
                 number: "<small class='right val red-text'>Numbers Only</small>"
             },
             title: {
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

     $("#frm_signature").validate({ //form validation
         rules: {
             siginput: {
                 required: true
             }
         }, //end of rules
         messages: {
             siginput: {
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

     $("#frm_change_password").validate({ //form validation
         rules: {
             email: {
                 required: true,
                 email: true
             },
             password: {
                 required: true,
                 nowhitespace: true
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
                 nowhitespace: "<small class='right val red-text'>White spaces are invalid</small>"
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

     ///////////////////////////Signature Pad//////////////////////////////////
     var wrapper = document.getElementById("signature-pad"),
         clearButton = wrapper.querySelector("[data-action=clear]"),
         saveButton = wrapper.querySelector("[data-action=save]"),
         canvas = wrapper.querySelector("canvas"),
         signaturePad;

     // Adjust canvas coordinate space taking into account pixel ratio,
     // to make it look crisp on mobile devices.
     // This also causes canvas to be cleared.
     function resizeCanvas() {
         var ratio = window.devicePixelRatio || 1;
         canvas.width = canvas.offsetWidth * ratio;
         canvas.height = canvas.offsetHeight * ratio;
         canvas.getContext("2d").scale(ratio, ratio);
     }

     window.onresize = resizeCanvas;
     resizeCanvas();
     signaturePad = new SignaturePad(canvas);
     clearButton.addEventListener("click", function(event) {
         signaturePad.clear();
         document.getElementById("siginput").value = "";
     });

     var form = document.getElementById("sigform"),
         input = document.getElementById("siginput")

     saveButton.addEventListener("click", function(event) {
         if (signaturePad.isEmpty()) {
             swal({
                 title: 'Error',
                 text: "note: please provide a signature",
                 type: 'error',
                 confirmButtonText: 'Ok',
                 confirmButtonClass: 'btn waves-effect teal lighten-1',
                 buttonsStyling: false
             })
         } //end of if
         else {
             swal({
                 title: 'Signature Selected',
                 text: "note: this will not be saved unless you submit the form",
                 type: 'success',
                 confirmButtonText: 'Ok',
                 confirmButtonClass: 'btn waves-effect teal lighten-1',
                 buttonsStyling: false
             })
             input.value = signaturePad.toDataURL();
         } //end of else
     }); //end of saveButton



 }); //end of document.ready

 //////////////Functions////////////
 function select_department(model_url, html_class_OR_id) {
     $.ajax({
             url: model_url,
             method: "GET",
             success: function(Result) {
                     //push the result on id or class
                     $(html_class_OR_id).html(Result);
                 } //end of success function
         }) //end of ajax
 } //end of select_department

 function update_admin_info(model_url, form_name) {
     $.ajax({
             url: model_url,
             method: "POST",
             data: $(form_name).serialize(),
             dataType: "text",
             success: function(Result) {
                     if (Result == "error") {
                         alert("error");
                     } else if (Result == "success") {
                         location.reload();
                     }
                 } //end of success function
         }) //end of ajax
 } //end of update_admin_info

 function update_admin_signature(model_url, form_name) {
     $.ajax({
             url: model_url,
             method: "POST",
             data: $(form_name).serialize(),
             dataType: "text",
             success: function(Result) {
                     if (Result == "error") {
                         alert("error");
                     } else if (Result == "success") {
                         location.reload(true);
                     }
                 } //end of success function
         }) //end of ajax
 } //end of update_admin_signature

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
                         $('#change_password_modal').modal('close');
                         Materialize.toast("Password successfully changed", 8000, 'teal lighten-1');
                     }
                 } //end of success function
         }) //end of ajax
 } //end of update_admin_password