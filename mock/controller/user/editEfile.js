 $(document).ready(function() {

     $(document).on('click', '#btn_resend', function() {
         var ckeditor_content = CKEDITOR.instances.id_content.getData();
         $("#id_content").val(ckeditor_content);
         var ckeditor_content_length = ckeditor_content.length;

         if (ckeditor_content_length < 1) { //validate textarea//check if textarea is empty or containes whitespaces
             swal({
                 title: 'Error',
                 text: "note: efile cannot be empty",
                 type: 'error',
                 confirmButtonText: 'Ok',
                 confirmButtonClass: 'btn waves-effect green darken-2',
                 buttonsStyling: false
             }); //end of swal
         } else {
             var ckeditor_content = CKEDITOR.instances.id_content.getData();
             $("#id_content").val(ckeditor_content);
             edit_efile("../../model/tbl_efile/update/edit_efile.php", "#frm_edit_efile");
      
         } //end of else
     }); //end of onclick
 }); //end of document.ready

 ////////////////Functions//////////////////////
 function edit_efile(model_url, form_name) {
     $.ajax({
         url: model_url,
         method: "POST",
         data: $(form_name).serialize(),
         dataType: "text",
         success: function(Result) {
             if (Result == "error") {
                 Materialize.toast("Sorry an error occured", 8000, 'red');
             } else if (Result == "success") {
                    swal({
                        title: 'Success',
                        text: "Efile successfully edited",
                        type: 'success',
                        confirmButtonText: 'Ok',
                        confirmButtonClass: 'btn waves-effect green darken-2',
                        buttonsStyling: false,
                        allowOutsideClick: false
                    }).then(function() {
                        // Redirect the user
                        window.location.href = "index.php";
                    }); //end of swal
                    
             }
         }, //end of success function
     }); //end of ajax
 } //end of edit_efile