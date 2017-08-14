$(document).ready(function(){

  

    select_deleted_user("../../model/tbl_user/select/select_deleted_user.php", "#tbl_deleted_user");

    $(document).on('click', '.delete_deleted_user', function() {
     //bind html5 data attributes to variables
     var delete_id = $(this).attr('data-delete-deleted-id');
     var delete_access = $(this).attr('data-delete-deleted-access');
     var delete_status = $(this).attr('data-delete-deleted-status');

      //set values to id
      $('#delete_id').val(delete_id);
      $('#delete_access').val(delete_access);
      $('#delete_status').val(delete_status);

      //show modal
      $('.trgr_delete_deleted_user').trigger('click');
     });//end of onclick

     $(document).on('click', '.restore_deleted_user', function() {
      //bind html5 data attributes to variables
      var restore_id = $(this).attr('data-restore-deleted-id');
      var restore_access = $(this).attr('data-restore-deleted-access');
      var restore_status = $(this).attr('data-restore-deleted-status');

       //set values to id
       $('#restore_id').val(restore_id);
       $('#restore_access').val(restore_access);
       $('#restore_status').val(restore_status);

       //show modal
       $('.trgr_restore_deleted_user').trigger('click');
      });//end of onclick


     $('#btn_delete_deleted_user').on('click', function(event) {
       delete_deleted_user("../../model/tbl_user/delete/delete_deleted_user.php", "#frm_delete_deleted_user");
    });//end of onclick

    $('#btn_restore_deleted_user').on('click', function(event) {
      restore_deleted_user("../../model/tbl_user/update/restore_deleted_user.php" , "#frm_restore_deleted_user");
   });//end of onclick




  });//end of document.ready


  //////////////////////Functions///////////////////////
  function select_deleted_user(model_url, html_class_OR_id){
    $.ajax({
      url:  model_url,
      method: "GET",
      success:function(Result){
      //push the result on id or class
        $(html_class_OR_id).html(Result);
      },//end of success function
      complete:function(){
        //initialize pagination after data loaded
        var monkeyList = new List('list_deleted_user', {
          valueNames: ['id','name','gender','email','mobile','access','status'],
          page: 10,
          plugins: [ ListPagination({}) ]
        });
      }//end of complete function

    })
  }//end of select_pending_user

  function delete_deleted_user(model_url,form_name){
    $.ajax({
      url:  model_url,
      method:"POST",
      data: $(form_name).serialize(),
      dataType:"text",
      success:function(Result){
        if(Result == "error"){
            Materialize.toast("Sorry an error occured", 8000, 'red');
        }
        else if(Result == "success") {
          Materialize.toast("User permanently deleted", 8000, 'teal lighten-1');
        }
      },//end of success function

      complete:function( ){
        select_deleted_user("../../model/tbl_user/select/select_deleted_user.php", "#tbl_deleted_user");
      }//end of complete function

    })//end of ajax
  }//end of delete_pending_user

  function restore_deleted_user(model_url,form_name){
    $.ajax({
      url:  model_url,
      method:"POST",
      data: $(form_name).serialize(),
      dataType:"text",
      success:function(Result){
        if(Result == "error"){
            Materialize.toast("Sorry an error occured", 8000, 'red');
        }
        else if(Result == "success") {
          Materialize.toast("User restored successfully", 8000, 'teal lighten-1');
        }
      },//end of success function

      complete:function( ){
        select_deleted_user("../../model/tbl_user/select/select_deleted_user.php", "#tbl_deleted_user");
      }//end of complete function

    })//end of ajax
  }//end of delete_pending_user