 $(document).ready(function () {
     //init tabs
     $('ul.tabs').tabs();

     select_pending_video("../../model/tbl_file/select/select_pending_video.php", "#tbl_pending_video");
     select_rejected_video("../../model/tbl_file/select/select_rejected_video.php", "#tbl_rejected_video");
     select_publish_video("../../model/tbl_file/select/select_publish_video.php", "#tbl_publish_efile")

     $("#notif_pending_video").load("../../model/tbl_efile/select/notif_pending_video.php");
     $("#notif_rejected_video").load("../../model/tbl_efile/select/notif_rejected_video.php");
     $("#notif_publish_video").load("../../model/tbl_efile/select/notif_publish_video.php");

     //refresh every 3sec to fetch data
     setInterval(function () {
         $("#notif_pending_video").load("../../model/tbl_efile/select/notif_pending_video.php");
         $("#notif_rejected_video").load("../../model/tbl_efile/select/notif_rejected_video.php");
         $("#notif_publish_video").load("../../model/tbl_efile/select/notif_publish_video.php");
     }, 3000);


     /////////////////approve video
     $(document).on('click', '.approve_video', function () {
         //bind html5 data attributes to variables
         var approve_id = $(this).attr('data-approve-id');
         //set values to id
         $('#approve_id').val(approve_id);
         //show modal
         $('.trgr_approve_video').trigger('click');
     }); //end of onclick

     $('#btn_approve_video').on('click', function (event) {
         approve_video("../../model/tbl_file/update/approve_video.php", "#frm_approve_video");
         $("#notif_pending_video").load("../../model/tbl_efile/select/notif_pending_video.php");
     }); //end of onclick
     /////////////////end of approve video

     /////////////////reject video
     $(document).on('click', '.reject_video', function () {
         //bind html5 data attributes to variables
         var reject_id = $(this).attr('data-reject-id');
         //set values to id
         $('#reject_id').val(reject_id);
         //show modal
         $('.trgr_reject_video').trigger('click');
     }); //end of onclick

     $('#btn_reject_video').on('click', function (event) {
         reject_video("../../model/tbl_file/update/reject_video.php", "#frm_reject_video");
         $("#notif_rejected_video").load("../../model/tbl_efile/select/notif_rejected_video.php");
     }); //end of onclick
     /////////////////end of reject video

     /////////////////publish video
     $(document).on('click', '.publish_video', function () {
         //bind html5 data attributes to variables
         var publish_id = $(this).attr('data-publish-id');
         //set values to id
         $('#publish_id').val(publish_id);
         //show modal
         $('.trgr_publish_video').trigger('click');
     }); //end of onclick

     $('#btn_publish_video').on('click', function (event) {
         publish_video("../../model/tbl_file/update/publish_video.php", "#frm_publish_video");
         $("#notif_publish_video").load("../../model/tbl_efile/select/notif_publish_video.php");
     }); //end of onclick
     /////////////////end of publish video

     /////////////////delete video
     $(document).on('click', '.delete_video', function () {
         //bind html5 data attributes to variables
         var delete_id = $(this).attr('data-delete-id');
         //set values to id
         $('#delete_id').val(delete_id);
         //show modal
         $('.trgr_delete_video').trigger('click');
     }); //end of onclick

     $('#btn_delete_video').on('click', function (event) {
         delete_video("../../model/tbl_file/delete/delete_video.php", "#frm_delete_video");
         $("#notif_rejected_video").load("../../model/tbl_efile/select/notif_rejected_video.php");
     }); //end of onclick
     /////////////////end of delete video

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
     /////////////////end of view rejection

     /////////////////edit video
     $(document).on('click', '.edit_video', function () {
         //bind html5 data attributes to variables
         var edit_id = $(this).attr('data-edit-id');
         //set values to id
         $('#edit_id').val(edit_id);
         //show modal
         $('.trgr_edit_video').trigger('click');
     }); //end of onclick

     $('#btn_edit_video').on('click', function (event) {
         //if file_proxy isi empty

         if ($('#video').valid()) {

             $.ajax({
                 url: '../../model/tbl_file/update/edit_video.php',
                 type: 'POST',
                 data: $("#frm_edit_video").serialize(),
                 success: function (Result) {
                     if (Result == "error") {
                         Materialize.toast("Sorry an error occured", 8000, 'red');
                     } else if (Result == "success") {
                         Materialize.toast("Video resend", 8000, 'green darken-2');
                     }
                 },
                 complete: function (Result) {
                     select_rejected_video("../../model/tbl_file/select/select_rejected_video.php", "#tbl_rejected_video");
                 }
             }); //end of ajax
         } //end of if
         else {
             alert("not ok");
         } //end of else
     }); //end of onclick
     /////////////////end of edit video

     $("#frm_edit_video").validate({ //form validation
         rules: {
             video: {
                 required: true,
                 url: true
             }
         }, //end of rules
         messages: {
             video: {
                 required: "<small class='right val red-text'>This field is required</small>",
                 url: "<small class='right val red-text'>Must be a valid url</small>"
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
 function select_pending_video(model_url, html_class_OR_id) {
     $.ajax({
         url: model_url,
         method: "GET",
         success: function (Result) {
             //push the result on id or class
             $(html_class_OR_id).html(Result);
         }, //end of success function
         complete: function () {
             //initialize pagination after data loaded
             var monkeyList = new List('list_pending_video', {
                 valueNames: ['video', 'name', 'sender', 'signatories'],
                 page: 7,
                 plugins: [ListPagination({})]
             });
         } //end of complete function
     }) //end of ajax
 } //end of select_pending_video

 function select_rejected_video(model_url, html_class_OR_id) {
     $.ajax({
         url: model_url,
         method: "GET",
         success: function (Result) {
             //push the result on id or class
             $(html_class_OR_id).html(Result);
         }, //end of success function
         complete: function () {
             //initialize pagination after data loaded
             var monkeyList = new List('list_rejected_video', {
                 valueNames: ['doc_id', 'name', 'disapproved'],
                 page: 7,
                 plugins: [ListPagination({})]
             });
         } //end of complete function
     }) //end of ajax
 } //end of select_rejected_video

 function select_publish_video(model_url, html_class_OR_id) {
     $.ajax({
         url: model_url,
         method: "GET",
         success: function (Result) {
             //push the result on id or class
             $(html_class_OR_id).html(Result);
         }, //end of success function
         complete: function () {
             //initialize pagination after data loaded
             var monkeyList = new List('list_publish_video', {
                 valueNames: ['doc_id', 'name', 'disapproved'],
                 page: 7,
                 plugins: [ListPagination({})]
             });
         } //end of complete function
     }) //end of ajax
 } //end of select_publish_video

 function approve_video(model_url, form_name) {
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
             select_pending_video("../../model/tbl_file/select/select_pending_video.php", "#tbl_pending_video");
         } //end of complete function
     }) //end of ajax
 } //end of approve_video

 function reject_video(model_url, form_name) {
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
             select_pending_video("../../model/tbl_file/select/select_pending_video.php", "#tbl_pending_video");
         } //end of complete function
     }) //end of ajax
 } //end of reject_video

 function delete_video(model_url, form_name) {
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
             select_rejected_video("../../model/tbl_file/select/select_rejected_video.php", "#tbl_rejected_video");
         } //end of complete function
     }) //end of ajax
 } //end of delete_video

 function publish_video(model_url, form_name) {
     $.ajax({
         url: model_url,
         method: "POST",
         data: $(form_name).serialize(),
         dataType: "text",
         success: function (Result) {
             if (Result == "error") {
                 Materialize.toast("Sorry an error occured", 8000, 'red');
             } else if (Result == "success") {
                 Materialize.toast("Video published successfully", 8000, 'green darken-2');
             }
         }, //end of success function
         complete: function () {
             select_publish_video("../../model/tbl_file/select/select_publish_video.php", "#tbl_publish_efile")
         } //end of complete function
     }) //end of ajax
 } //end of publish_video