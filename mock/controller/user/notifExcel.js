 $(document).ready(function () {
     //init tabas
     $('ul.tabs').tabs();

     select_pending_excel("../../model/tbl_file/select/select_pending_excel.php", "#tbl_pending_excel");
     select_rejected_excel("../../model/tbl_file/select/select_rejected_excel.php", "#tbl_rejected_excel");
     select_publish_excel("../../model/tbl_file/select/select_publish_excel.php", "#tbl_publish_efile")

     $("#notif_pending_excel").load("../../model/tbl_efile/select/notif_pending_excel.php");
     $("#notif_rejected_excel").load("../../model/tbl_efile/select/notif_rejected_excel.php");
     $("#notif_publish_excel").load("../../model/tbl_efile/select/notif_publish_excel.php");

     //refresh every 3sec to fetch data
     setInterval(function () {
         $("#notif_pending_excel").load("../../model/tbl_efile/select/notif_pending_excel.php");
         $("#notif_rejected_excel").load("../../model/tbl_efile/select/notif_rejected_excel.php");
         $("#notif_publish_excel").load("../../model/tbl_efile/select/notif_publish_excel.php");
     }, 3000);
        
     /////////////////approve excel
     $(document).on('click', '.approve_excel', function () {
         //bind html5 data attributes to variables
         var approve_id = $(this).attr('data-approve-id');
         //set values to id
         $('#approve_id').val(approve_id);
         //show modal
         $('.trgr_approve_excel').trigger('click');
     }); //end of onclick

     $('#btn_approve_excel').on('click', function (event) {
         approve_excel("../../model/tbl_file/update/approve_excel.php", "#frm_approve_excel");
         $("#notif_pending_excel").load("../../model/tbl_efile/select/notif_pending_excel.php");
     }); //end of onclick
     /////////////////end of approve excel

     /////////////////reject excel
     $(document).on('click', '.reject_excel', function () {
         //bind html5 data attributes to variables
         var reject_id = $(this).attr('data-reject-id');
         //set values to id
         $('#reject_id').val(reject_id);
         //show modal
         $('.trgr_reject_excel').trigger('click');
     }); //end of onclick

     $('#btn_reject_excel').on('click', function (event) {
         reject_excel("../../model/tbl_file/update/reject_excel.php", "#frm_reject_excel");
         $("#notif_rejected_excel").load("../../model/tbl_efile/select/notif_rejected_excel.php");

     }); //end of onclick
     /////////////////end of reject excel

     /////////////////publish excel
     $(document).on('click', '.publish_excel', function () {
         //bind html5 data attributes to variables
         var publish_id = $(this).attr('data-publish-id');
         //set values to id
         $('#publish_id').val(publish_id);
         //show modal
         $('.trgr_publish_excel').trigger('click');
     }); //end of onclick

     $('#btn_publish_excel').on('click', function (event) {
         publish_excel("../../model/tbl_file/update/publish_excel.php", "#frm_publish_excel");
         $("#notif_publish_excel").load("../../model/tbl_efile/select/notif_publish_excel.php");
     }); //end of onclick
     /////////////////end of publish excel

     /////////////////delete excel
     $(document).on('click', '.delete_excel', function () {
         //bind html5 data attributes to variables
         var delete_id = $(this).attr('data-delete-id');
         //set values to id
         $('#delete_id').val(delete_id);
         //show modal
         $('.trgr_delete_excel').trigger('click');
     }); //end of onclick

     $('#btn_delete_excel').on('click', function (event) {
         delete_excel("../../model/tbl_file/delete/delete_excel.php", "#frm_delete_excel");
         $("#notif_rejected_excel").load("../../model/tbl_efile/select/notif_rejected_excel.php");
     }); //end of onclick
     /////////////////end of delete excel

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

     /////////////////edit excel
     $(document).on('click', '.edit_excel', function () {
         //bind html5 data attributes to variables
         var edit_id = $(this).attr('data-edit-id');
         //set values to id
         $('#edit_id').val(edit_id);
         //show modal
         $('.trgr_edit_excel').trigger('click');
     }); //end of onclick

     $('#btn_edit_excel').on('click', function (event) {
         //if file_proxy isi empty

         if ($('#file_proxy').valid()) {
             var file_name = $('#file_proxy').val();
             var file_extension = file_name.split('.')[1];
             var final_extension = file_extension.toLowerCase();

             if (final_extension == "xlsx" ||
                 final_extension == "xlsm" ||
                 final_extension == "xlsx" ||
                 final_extension == "xltx" ||
                 final_extension == "xltm") {
                 var formData = new FormData($("#frm_edit_excel")[0]);

                 $.ajax({
                     url: '../../model/tbl_file/update/edit_excel.php',
                     type: 'POST',
                     data: formData,
                     async: false,
                     success: function (Result) {
                         if (Result == "error") {
                             Materialize.toast("Sorry an error occured", 8000, 'red');
                         } else if (Result == "success") {
                             Materialize.toast("Spreadsheet resend", 8000, 'green darken-2');
                         }
                     },
                     complete: function (Result) {
                         select_rejected_excel("../../model/tbl_file/select/select_rejected_excel.php", "#tbl_rejected_excel");
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
     /////////////////end of edit efile

     $("#frm_edit_excel").validate({ //form validation
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
 function select_pending_excel(model_url, html_class_OR_id) {
     $.ajax({
         url: model_url,
         method: "GET",
         success: function (Result) {
             //push the result on id or class
             $(html_class_OR_id).html(Result);
         }, //end of success function
         complete: function () {
             //initialize pagination after data loaded
             var monkeyList = new List('list_pending_excel', {
                 valueNames: ['excel', 'name', 'sender', 'signatories'],
                 page: 7,
                 plugins: [ListPagination({})]
             });
         } //end of complete function
     }) //end of ajax
 } //end of select_pending_excel

 function select_rejected_excel(model_url, html_class_OR_id) {
     $.ajax({
         url: model_url,
         method: "GET",
         success: function (Result) {
             //push the result on id or class
             $(html_class_OR_id).html(Result);
         }, //end of success function
         complete: function () {
             //initialize pagination after data loaded
             var monkeyList = new List('list_rejected_excel', {
                 valueNames: ['doc_id', 'name', 'disapproved'],
                 page: 7,
                 plugins: [ListPagination({})]
             });
         } //end of complete function
     }) //end of excel
 } //end of select_rejected_excel

 function select_publish_excel(model_url, html_class_OR_id) {
     $.ajax({
         url: model_url,
         method: "GET",
         success: function (Result) {
             //push the result on id or class
             $(html_class_OR_id).html(Result);
         }, //end of success function
         complete: function () {
             //initialize pagination after data loaded
             var monkeyList = new List('list_publish_excel', {
                 valueNames: ['doc_id', 'name', 'disapproved'],
                 page: 7,
                 plugins: [ListPagination({})]
             });
         } //end of complete function
     }) //end of ajax
 } //end of select_publish_excel

 function approve_excel(model_url, form_name) {
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
             select_pending_excel("../../model/tbl_file/select/select_pending_excel.php", "#tbl_pending_excel");
         } //end of complete function
     }) //end of ajax
 } //end of approve_excel

 function reject_excel(model_url, form_name) {
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
             select_pending_excel("../../model/tbl_file/select/select_pending_excel.php", "#tbl_pending_excel");
         } //end of complete function
     }) //end of ajax
 } //end of reject_efile

 function delete_excel(model_url, form_name) {
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
             select_rejected_excel("../../model/tbl_file/select/select_rejected_excel.php", "#tbl_rejected_excel");
         } //end of complete function
     }) //end of ajax
 } //end of delete_excel

 function publish_excel(model_url, form_name) {
     $.ajax({
         url: model_url,
         method: "POST",
         data: $(form_name).serialize(),
         dataType: "text",
         success: function (Result) {
             if (Result == "error") {
                 Materialize.toast("Sorry an error occured", 8000, 'red');
             } else if (Result == "success") {
                 Materialize.toast("Spreadsheet published successfully", 8000, 'green darken-2');
             }
         }, //end of success function
         complete: function () {
             select_publish_excel("../../model/tbl_file/select/select_publish_excel.php", "#tbl_publish_efile")
         } //end of complete function
     }) //end of ajax
 } //end of publish_excel