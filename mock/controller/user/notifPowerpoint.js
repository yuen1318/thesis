 $(document).ready(function () {

     //init tabs
     $('ul.tabs').tabs();

     select_pending_powerpoint("../../model/tbl_file/select/select_pending_powerpoint.php", "#tbl_pending_powerpoint");
     select_rejected_powerpoint("../../model/tbl_file/select/select_rejected_powerpoint.php", "#tbl_rejected_powerpoint");
     select_publish_powerpoint("../../model/tbl_file/select/select_publish_powerpoint.php", "#tbl_publish_efile")

     $("#notif_pending_powerpoint").load("../../model/tbl_efile/select/notif_pending_powerpoint.php");
     $("#notif_rejected_powerpoint").load("../../model/tbl_efile/select/notif_rejected_powerpoint.php");
     $("#notif_publish_powerpoint").load("../../model/tbl_efile/select/notif_publish_powerpoint.php");

     //refresh every 3sec to fetch data
     setInterval(function () {
         $("#notif_pending_powerpoint").load("../../model/tbl_efile/select/notif_pending_powerpoint.php");
         $("#notif_rejected_powerpoint").load("../../model/tbl_efile/select/notif_rejected_powerpoint.php");
         $("#notif_publish_powerpoint").load("../../model/tbl_efile/select/notif_publish_powerpoint.php");
     }, 3000);


     /////////////////approve powerpoint
     $(document).on('click', '.approve_powerpoint', function () {
         //bind html5 data attributes to variables
         var approve_id = $(this).attr('data-approve-id');
         //set values to id
         $('#approve_id').val(approve_id);
         //show modal
         $('.trgr_approve_powerpoint').trigger('click');
     }); //end of onclick

     $('#btn_approve_powerpoint').on('click', function (event) {
         approve_powerpoint("../../model/tbl_file/update/approve_powerpoint.php", "#frm_approve_powerpoint");
         $("#notif_pending_powerpoint").load("../../model/tbl_efile/select/notif_pending_powerpoint.php");
     }); //end of onclick
     /////////////////end of approve powerpoint

     /////////////////reject powerpoint
     $(document).on('click', '.reject_powerpoint', function () {
         //bind html5 data attributes to variables
         var reject_id = $(this).attr('data-reject-id');
         //set values to id
         $('#reject_id').val(reject_id);
         //show modal
         $('.trgr_reject_powerpoint').trigger('click');
     }); //end of onclick

     $('#btn_reject_powerpoint').on('click', function (event) {
         reject_powerpoint("../../model/tbl_file/update/reject_powerpoint.php", "#frm_reject_powerpoint");
         $("#notif_rejected_powerpoint").load("../../model/tbl_efile/select/notif_rejected_powerpoint.php");
     }); //end of onclick
     /////////////////end of reject powerpoint

     /////////////////publish powerpoint
     $(document).on('click', '.publish_powerpoint', function () {
         //bind html5 data attributes to variables
         var publish_id = $(this).attr('data-publish-id');
         //set values to id
         $('#publish_id').val(publish_id);
         //show modal
         $('.trgr_publish_powerpoint').trigger('click');
     }); //end of onclick

     $('#btn_publish_powerpoint').on('click', function (event) {
         publish_powerpoint("../../model/tbl_file/update/publish_powerpoint.php", "#frm_publish_powerpoint");
         $("#notif_publish_powerpoint").load("../../model/tbl_efile/select/notif_publish_powerpoint.php");
     }); //end of onclick
     /////////////////end of publish powerpoint

     /////////////////delete powerpoint
     $(document).on('click', '.delete_powerpoint', function () {
         //bind html5 data attributes to variables
         var delete_id = $(this).attr('data-delete-id');
         //set values to id
         $('#delete_id').val(delete_id);
         //show modal
         $('.trgr_delete_powerpoint').trigger('click');
     }); //end of onclick

     $('#btn_delete_powerpoint').on('click', function (event) {
         delete_powerpoint("../../model/tbl_file/delete/delete_powerpoint.php", "#frm_delete_powerpoint");
         $("#notif_rejected_powerpoint").load("../../model/tbl_efile/select/notif_rejected_powerpoint.php");
     }); //end of onclick
     /////////////////end of delete powerpoint

     /////////////////view reason of rejection
     $(document).on('click', '.btn_reason', function () {
         var comment = $(this).attr('data-comment');
         swal({
             title: 'Reason',
             text: comment,
             type: 'info',
             confirmButtonText: 'Ok',
             confirmButtonClass: 'btn waves-effect green darken-2',
             buttonsStyling: false
         }) //end of swal
     }); //end of onclick
     /////////////////end of view reason of rejection

     /////////////////edit powerpoint 
     $(document).on('click', '.edit_powerpoint', function () {
         //bind html5 data attributes to variables
         var edit_id = $(this).attr('data-edit-id');
         //set values to id
         $('#edit_id').val(edit_id);
         //show modal
         $('.trgr_edit_powerpoint').trigger('click');
     }); //end of onclick

     $('#btn_edit_powerpoint').on('click', function (event) {
         //if file_proxy isi empty

         if ($('#file_proxy').valid()) {
             var file_name = $('#file_proxy').val();
             var file_extension = file_name.split('.')[1];
             var final_extension = file_extension.toLowerCase();

             if (final_extension == "pptx" ||
                 final_extension == "pptm" ||
                 final_extension == "ppt") {
                 var formData = new FormData($("#frm_edit_powerpoint")[0]);

                 $.ajax({
                     url: '../../model/tbl_file/update/edit_powerpoint.php',
                     type: 'POST',
                     data: formData,
                     async: false,
                     success: function (Result) {
                         if (Result == "error") {
                             Materialize.toast("Sorry an error occured", 8000, 'red');
                         } else if (Result == "success") {
                             Materialize.toast("Presentation resend", 8000, 'green darken-2');
                         }
                     },
                     complete: function (Result) {
                         select_rejected_powerpoint("../../model/tbl_file/select/select_rejected_powerpoint.php", "#tbl_rejected_powerpoint");
                     },
                     cache: false,
                     contentType: false,
                     processData: false
                 }); //end of ajax

                 return false;
             } //end of if
             else {
                 swal({
                     title: 'Error',
                     text: "note: Wrong file extension",
                     type: 'error',
                     confirmButtonText: 'Ok',
                     confirmButtonClass: 'btn waves-effect green darken-2',
                     buttonsStyling: false
                 }); //end of swal
             } //end of else

         } //end of if
         else {
             swal({
                 title: 'Error',
                 text: "note: File cannot be empty",
                 type: 'error',
                 confirmButtonText: 'Ok',
                 confirmButtonClass: 'btn waves-effect green darken-2',
                 buttonsStyling: false
             }); //end of swal
         } //end of else
     }); //end of onclick
     /////////////////end of edit powerpoint 

     $("#frm_edit_powerpoint").validate({ //form validation
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
 function select_pending_powerpoint(model_url, html_class_OR_id) {
     $.ajax({
         url: model_url,
         method: "GET",
         success: function (Result) {
             //push the result on id or class
             $(html_class_OR_id).html(Result);
         }, //end of success function
         complete: function () {
             //initialize pagination after data loaded
             var monkeyList = new List('list_pending_powerpoint', {
                 valueNames: ['powerpoint', 'name', 'sender', 'signatories'],
                 page: 7,
                 plugins: [ListPagination({})]
             });
         } //end of complete function
     }) //end of ajax
 } //end of select_pending_powerpoint 

 function select_rejected_powerpoint(model_url, html_class_OR_id) {
     $.ajax({
         url: model_url,
         method: "GET",
         success: function (Result) {
             //push the result on id or class
             $(html_class_OR_id).html(Result);
         }, //end of success function
         complete: function () {
             //initialize pagination after data loaded
             var monkeyList = new List('list_rejected_powerpoint', {
                 valueNames: ['doc_id', 'name', 'disapproved'],
                 page: 7,
                 plugins: [ListPagination({})]
             });
         } //end of complete function
     }) //end of ajax
 } //end of select_rejected_powerpoint

 function select_publish_powerpoint(model_url, html_class_OR_id) {
     $.ajax({
         url: model_url,
         method: "GET",
         success: function (Result) {
             //push the result on id or class
             $(html_class_OR_id).html(Result);
         }, //end of success function
         complete: function () {
             //initialize pagination after data loaded
             var monkeyList = new List('list_publish_powerpoint', {
                 valueNames: ['doc_id', 'name', 'disapproved'],
                 page: 7,
                 plugins: [ListPagination({})]
             });
         } //end of complete function
     }) //end of ajax
 } //end of select_publish_powerpoint

 function approve_powerpoint(model_url, form_name) {
     $.ajax({
         url: model_url,
         method: "POST",
         data: $(form_name).serialize(),
         dataType: "text",
         success: function (Result) {
             if (Result == "error") {
                 Materialize.toast("Sorry an error occured", 8000, 'red');
             } else if (Result == "success") {
                 Materialize.toast("Efile Approved", 8000, 'green darken-2');
             }
         }, //end of success function
         complete: function () {
             select_pending_powerpoint("../../model/tbl_file/select/select_pending_powerpoint.php", "#tbl_pending_powerpoint");
         } //end of complete function
     }) //end of ajax
 } //end of apporve_powerpoint

 function reject_powerpoint(model_url, form_name) {
     $.ajax({
         url: model_url,
         method: "POST",
         data: $(form_name).serialize(),
         dataType: "text",
         success: function (Result) {
             if (Result == "error") {
                 Materialize.toast("Sorry an error occured", 8000, 'red');
             } else if (Result == "success") {
                 Materialize.toast("Efile Rejected", 8000, 'green darken-2');
             }
         }, //end of success function
         complete: function () {
             select_pending_powerpoint("../../model/tbl_file/select/select_pending_powerpoint.php", "#tbl_pending_powerpoint");
         } //end of complete function
     }) //end of ajax
 } //end of reject_powerpoint

 function delete_powerpoint(model_url, form_name) {
     $.ajax({
         url: model_url,
         method: "POST",
         data: $(form_name).serialize(),
         dataType: "text",
         success: function (Result) {
             if (Result == "error") {
                 Materialize.toast("Sorry an error occured", 8000, 'red');
             } else if (Result == "success") {
                 Materialize.toast("Efile Deleted", 8000, 'green darken-2');
             }
         }, //end of success function
         complete: function () {
             select_rejected_powerpoint("../../model/tbl_file/select/select_rejected_powerpoint.php", "#tbl_rejected_powerpoint");
         } //end of complete function
     }) //end of ajax
 } //end of delete_powerpoint

 function publish_powerpoint(model_url, form_name) {
     $.ajax({
         url: model_url,
         method: "POST",
         data: $(form_name).serialize(),
         dataType: "text",
         success: function (Result) {
             if (Result == "error") {
                 Materialize.toast("Sorry an error occured", 8000, 'red');
             } else if (Result == "success") {
                 Materialize.toast("Presentation published successfully", 8000, 'green darken-2');
             }
         }, //end of success function
         complete: function () {
             select_publish_powerpoint("../../model/tbl_file/select/select_publish_powerpoint.php", "#tbl_publish_efile")
         } //end of complete function
     }) //end of ajax
 } //end of publish_powerpoint