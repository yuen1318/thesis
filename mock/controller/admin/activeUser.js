 $(document).ready(function(){

  

    select_department("../../model/tbl_department/select/select_department.php", "#select_department")

    select_active_user("../../model/tbl_user/select/select_active_user.php", "#tbl_active_user");

    $(document).on('click', '.delete_active_user', function () {
      //bind html5 data attributes to variables
      var delete_id = $(this).attr('data-delete-active-id');
      var delete_status = $(this).attr('data-delete-active-status');

      //set values to id
      $('#delete_id').val(delete_id);
      $('#delete_status').val(delete_status);

      //show modal
      $('.trgr_delete_active_user').trigger('click');
    }); //end of onclick


    $('#btn_delete_active_user').on('click', function (event) {
      delete_active_user("../../model/tbl_user/update/delete_pending_user.php", "#frm_delete_active_user");
    }); //end of onclick

    $(document).on('click', '.edit_active_user', function () {
      //bind html5 data attributes to variables
      var edit_id = $(this).attr('data-edit-active-id');
      //set values to id
      $('#edit_id').val(edit_id);
      //show modal
      $('.trgr_edit_active_user').trigger('click');
    }); //end of onclick

    $('#btn_edit_active_user').on('click', function (event) {
      if ($("#frm_edit_active_user").valid()) { //check if all field is valid
         edit_active_user("../../model/tbl_user/update/edit_active_user.php","#frm_edit_active_user");
        $('#edit_active_user_modal').modal('close');
       
      } else {
        $('.val').addClass('animated bounceIn');
        $('.val').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
        $('.val').removeClass('animated');
        });
      } //end of else
    }); //end of onclick


    $("#frm_edit_active_user").validate({ //form validation
    rules: {
      department: {
        required: true
      }
    }, //end of rules
    messages: {
      department: {
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
    function select_department(model_url, html_class_OR_id) {
      $.ajax({
        url: model_url,
        method: "GET",
        success: function (Result) {
          //push the result on id or class
          $(html_class_OR_id).html(Result);
        } //end of success function
      }) //end of ajax
    } //end of select_department


    function select_active_user(model_url, html_class_OR_id) {
      $.ajax({
        url: model_url,
        method: "GET",
        success: function (Result) {
          //push the result on id or class
          $(html_class_OR_id).html(Result);
        }, //end of success function
        complete: function () {
          //initialize pagination after data loaded
          var monkeyList = new List('list_active_user', {
            valueNames: ['id', 'name', 'gender', 'email', 'mobile', 'access', 'status'],
            page: 10,
            plugins: [ListPagination({})]
          });
        } //end of complete function

      })
    } //end of select_active_user

    function delete_active_user(model_url, form_name) {
      $.ajax({
        url: model_url,
        method: "POST",
        data: $(form_name).serialize(),
        dataType: "text",
        success: function (Result) {
          if (Result == "error") {
            Materialize.toast("Sorry an error occured", 8000, 'red');
          } else if (Result == "success") {
            Materialize.toast("User successfully deleted", 8000, 'green darken-2');
          }
        }, //end of success function

        complete: function () {
          select_active_user("../../model/tbl_user/select/select_active_user.php", "#tbl_active_user");
        } //end of complete function

      }) //end of ajax
    } //end of delete_pending_user


    function edit_active_user(model_url, form_name) {
      $.ajax({
        url: model_url,
        method: "POST",
        data: $(form_name).serialize(),
        dataType: "text",
        success: function (Result) {
          if (Result == "error") {
            Materialize.toast("Sorry an error occured", 8000, 'red');
          } else if (Result == "success") {
            Materialize.toast("User successfully editd", 8000, 'green darken-2');
          }
        }, //end of success function

        complete: function () {
          select_active_user("../../model/tbl_user/select/select_active_user.php", "#tbl_active_user");
        } //end of complete function

      }) //end of ajax
    } //end of edit_pending_user