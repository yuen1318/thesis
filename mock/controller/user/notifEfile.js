  $(document).ready(function () {
      //init tabs
      $('ul.tabs').tabs();

      select_pending_signatures("../../model/tbl_efile/select/select_pending_efile.php", "#tbl_pending_signatures");
      select_rejected_efile("../../model/tbl_efile/select/select_rejected_efile.php", "#tbl_rejected_efile");
      select_publish_efile("../../model/tbl_efile/select/select_publish_efile.php", "#tbl_publish_efile")

      $("#notif_pending_efile").load("../../model/tbl_efile/select/notif_pending_efile.php");
      $("#notif_rejected_efile").load("../../model/tbl_efile/select/notif_rejected_efile.php");
      $("#notif_publish_efile").load("../../model/tbl_efile/select/notif_publish_efile.php");

      //refresh every 3sec to fetch data
      setInterval(function () {
          $("#notif_pending_efile").load("../../model/tbl_efile/select/notif_pending_efile.php");
          $("#notif_rejected_efile").load("../../model/tbl_efile/select/notif_rejected_efile.php");
          $("#notif_publish_efile").load("../../model/tbl_efile/select/notif_publish_efile.php");
      }, 3000);


      /////////////////approve efile
      $(document).on('click', '.approve_efile', function () {
          //bind html5 data attributes to variables
          var approve_id = $(this).attr('data-approve-id');
          //set values to id
          $('#approve_id').val(approve_id);
          //show modal
          $('.trgr_approve_efile').trigger('click');
      }); //end of onclick


      $('#btn_approve_efile').on('click', function (event) {

        if ($("#frm_approve_efile").valid()) { //check if all field is valid
             approve_efile("../../model/tbl_efile/update/approve_efile.php", "#frm_approve_efile");
             $("#notif_pending_efile").load("../../model/tbl_efile/select/notif_pending_efile.php");
             $('#approve_efile_modal').modal('close');
             $('#approve_pw').val("");
        } else {
            $('.val').addClass('animated bounceIn');
            $('.val').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
                $('.val').removeClass('animated');
            });
        } //end of else

         
      }); //end of onclick
      /////////////////end of approve efile

      /////////////////reject efile
      $(document).on('click', '.reject_efile', function () {
          //bind html5 data attributes to variables
          var reject_id = $(this).attr('data-reject-id');
          //set values to id
          $('#reject_id').val(reject_id);
          //show modal
          $('.trgr_reject_efile').trigger('click');
      }); //end of onclick

      $('#btn_reject_efile').on('click', function (event) {

        if ($("#frm_reject_efile").valid()) { //check if all field is valid
             reject_efile("../../model/tbl_efile/update/reject_efile.php", "#frm_reject_efile");
             $("#notif_rejected_efile").load("../../model/tbl_efile/select/notif_rejected_efile.php");
             $('#reject_efile_modal').modal('close');
             $('#comment').val("");
             $('#reject_pw').val("");
        } else {
            $('.val').addClass('animated bounceIn');
            $('.val').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
                $('.val').removeClass('animated');
            });
        } //end of else


          
      }); //end of onclick
      /////////////////end of reject efile

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

      /////////////////delete efile
      $(document).on('click', '.delete_efile', function () {
          //bind html5 data attributes to variables
          var delete_id = $(this).attr('data-delete-id');
          //set values to id
          $('#delete_id').val(delete_id);
          //show modal
          $('.trgr_delete_efile').trigger('click');
      }); //end of onclick
 
      $('#btn_delete_efile').on('click', function (event) {

        if ($("#frm_delete_efile").valid()) { //check if all field is valid
            delete_efile("../../model/tbl_efile/delete/delete_efile.php", "#frm_delete_efile");
            $("#notif_rejected_efile").load("../../model/tbl_efile/select/notif_rejected_efile.php");
            $('#delete_efile_modal').modal('close');
            $('#delete_pw').val("");
       } else {
           $('.val').addClass('animated bounceIn');
           $('.val').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
               $('.val').removeClass('animated');
           });
       } //end of else


          
      }); //end of onclick
      /////////////////end delete efile

/////////////////////////Form Validation//////////////////////
   $("#frm_approve_efile").validate({ //form validation
        rules: {
            approve_pw: {
                required: true,
                equalTo: "#approve_rpw"
            }
        }, //end of rules
        messages: {
            approve_pw: {
                required: "<small class='right val red-text'>This field is required</small>",
                equalTo: "<small class='right val red-text'>Wrong password!</small>"
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

       $("#frm_reject_efile").validate({ //form validation
        rules: {
            reject_pw: {
                required: true,
                equalTo: "#reject_rpw"
            },
            comment: {
                required: true
            }
        }, //end of rules
        messages: {
            reject_pw: {
                required: "<small class='right val red-text'>This field is required</small>",
                equalTo: "<small class='right val red-text'>Wrong password!</small>"
            },
            comment: {
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
 
    $("#frm_delete_efile").validate({ //form validation
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


  //////////////////////Functions///////////////////////
  function select_pending_signatures(model_url, html_class_OR_id) {
      $.ajax({
          url: model_url,
          method: "GET",
          success: function (Result) {
              //push the result on id or class
              $(html_class_OR_id).html(Result);
          }, //end of success function
          complete: function () {
              //initialize pagination after data loaded
              var monkeyList = new List('list_pending_signatures', {
                  valueNames: ['efile', 'name', 'sender', 'signatories'],
                  page: 7,
                  plugins: [ListPagination({})]
              });
          } //end of complete function
      }) //end of ajax
  } //end of select_pending_signature

  function select_rejected_efile(model_url, html_class_OR_id) {
      $.ajax({
          url: model_url,
          method: "GET",
          success: function (Result) {
              //push the result on id or class
              $(html_class_OR_id).html(Result);
          }, //end of success function
          complete: function () {
              //initialize pagination after data loaded
              var monkeyList = new List('list_rejected_efile', {
                  valueNames: ['doc_id', 'name', 'disapproved'],
                  page: 7,
                  plugins: [ListPagination({})]
              });
          } //end of complete function
      }) //end of ajax
  } //end of select_rejected_efile

  function select_publish_efile(model_url, html_class_OR_id) {
      $.ajax({
          url: model_url,
          method: "GET",
          success: function (Result) {
              //push the result on id or class
              $(html_class_OR_id).html(Result);
          }, //end of success function
          complete: function () {
              //initialize pagination after data loaded
              var monkeyList = new List('list_publish_efile', {
                  valueNames: ['doc_id', 'name', 'disapproved'],
                  page: 7,
                  plugins: [ListPagination({})]
              });
          } //end of complete function
      }) //end of ajax
  } //end of select_publish_efile

  function approve_efile(model_url, form_name) {
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
              select_pending_signatures("../../model/tbl_efile/select/select_pending_efile.php", "#tbl_pending_signatures");
          } //end of complete function
      }) //end of ajax
  } //end of approve_efile

  function reject_efile(model_url, form_name) {
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
              select_pending_signatures("../../model/tbl_efile/select/select_pending_efile.php", "#tbl_pending_signatures");
          } //end of complete function
      }) //end of ajax
  } //end of reject_efile

  function delete_efile(model_url, form_name) {
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
              select_rejected_efile("../../model/tbl_efile/select/select_rejected_efile.php", "#tbl_rejected_efile");
          } //end of complete function
      }) //end of ajax
  } //end of delete_efile