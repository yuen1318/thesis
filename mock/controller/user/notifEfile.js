  $(document).ready(function() {
      //init tabs
      $('ul.tabs').tabs();

      select_pending_signatures("../../model/tbl_efile/select/select_pending_efile.php", "#tbl_pending_signatures");
      select_rejected_efile("../../model/tbl_efile/select/select_rejected_efile.php", "#tbl_rejected_efile");
      select_publish_efile("../../model/tbl_efile/select/select_publish_efile.php", "#tbl_publish_efile")

      /////////////////approve efile
      $(document).on('click', '.approve_efile', function() {
          //bind html5 data attributes to variables
          var approve_id = $(this).attr('data-approve-id');
          //set values to id
          $('#approve_id').val(approve_id);
          //show modal
          $('.trgr_approve_efile').trigger('click');
      }); //end of onclick

      $('#btn_approve_efile').on('click', function(event) {
          approve_efile("../../model/tbl_efile/update/approve_efile.php", "#frm_approve_efile");
      }); //end of onclick
      /////////////////end of approve efile

      /////////////////reject efile
      $(document).on('click', '.reject_efile', function() {
          //bind html5 data attributes to variables
          var reject_id = $(this).attr('data-reject-id');
          //set values to id
          $('#reject_id').val(reject_id);
          //show modal
          $('.trgr_reject_efile').trigger('click');
      }); //end of onclick

      $('#btn_reject_efile').on('click', function(event) {
          reject_efile("../../model/tbl_efile/update/reject_efile.php", "#frm_reject_efile");
      }); //end of onclick
      /////////////////end of reject efile

      /////////////////view reason of rejection
      $(document).on('click', '.btn_reason', function() {
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
      $(document).on('click', '.delete_efile', function() {
          //bind html5 data attributes to variables
          var delete_id = $(this).attr('data-delete-id');
          //set values to id
          $('#delete_id').val(delete_id);
          //show modal
          $('.trgr_delete_efile').trigger('click');
      }); //end of onclick

      $('#btn_delete_efile').on('click', function(event) {
          delete_efile("../../model/tbl_efile/delete/delete_efile.php", "#frm_delete_efile");
      }); //end of onclick
      /////////////////end delete efile
  }); //end of document.ready


  //////////////////////Functions///////////////////////
  function select_pending_signatures(model_url, html_class_OR_id) {
      $.ajax({
              url: model_url,
              method: "GET",
              success: function(Result) {
                  //push the result on id or class
                  $(html_class_OR_id).html(Result);
              }, //end of success function
              complete: function() {
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
              success: function(Result) {
                  //push the result on id or class
                  $(html_class_OR_id).html(Result);
              }, //end of success function
              complete: function() {
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
              success: function(Result) {
                  //push the result on id or class
                  $(html_class_OR_id).html(Result);
              }, //end of success function
              complete: function() {
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
              success: function(Result) {
                  if (Result == "error") {
                      Materialize.toast("Sorry an error occured", 8000, 'red');
                  } else if (Result == "success") {
                      Materialize.toast("Efile Approved", 8000, 'green darken-2');
                  }
              }, //end of success function
              complete: function() {
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
              success: function(Result) {
                  if (Result == "error") {
                      Materialize.toast("Sorry an error occured", 8000, 'red');
                  } else if (Result == "success") {
                      Materialize.toast("Efile Rejected", 8000, 'green darken-2');
                  }
              }, //end of success function
              complete: function() {
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
              success: function(Result) {
                  if (Result == "error") {
                      Materialize.toast("Sorry an error occured", 8000, 'red');
                  } else if (Result == "success") {
                      Materialize.toast("Efile Deleted", 8000, 'green darken-2');
                  }
              }, //end of success function
              complete: function() {
                      select_rejected_efile("../../model/tbl_efile/select/select_rejected_efile.php", "#tbl_rejected_efile");
                  } //end of complete function
          }) //end of ajax
  } //end of delete_efile