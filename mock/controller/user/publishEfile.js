 $(document).ready(function() {

     $('#btn_signatures').on('click', function(event) {
         var content = CKEDITOR.instances.content.getData();
         $("#content").val(content);
         $("#tab2").removeClass("hide");
         $("#tab1").addClass("hide");
     }); //end of onclick

     $('#btn_back').on('click', function(event) {
         $("#tab1").removeClass("hide");
         $("#tab2").addClass("hide");
     }); //end of onclick

     $('#btn_publish').on('click', function(event) {
         var signatures = CKEDITOR.instances.signatures.getData();
         $("#signatures").val(signatures);
         publish_efile("../../model/tbl_efile/update/publish_efile.php", "#frm_publish");
     }); //end of onclick
 }); //end of document.ready

 ////////////////Functions//////////////////////
 function publish_efile(model_url, form_name) {
     $.ajax({
         url: model_url,
         method: "POST",
         data: $(form_name).serialize(),
         dataType: "text",
         success: function(Result) {

                swal({
                    title: 'Success',
                    text: "Efile successfully published",
                    type: 'success',
                    confirmButtonText: 'Ok',
                    confirmButtonClass: 'btn waves-effect green darken-2',
                    buttonsStyling: false,
                    allowOutsideClick: false
                }).then(function() {
                    // Redirect the user
                    window.location.href = "index.php";
                }); //end of swal

         }, //end of success function
         error: function(Result) {
             alert("Error");
         }, //end of success function
     }); //end of ajax
 } //end of publish_efile