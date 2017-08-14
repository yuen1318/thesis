$(document).ready(function(){

  


  select_pending_admin("../../model/tbl_admin/select/select_pending_admin.php", "#tbl_pending_admin");

  $(document).on('click', '.delete_pending_admin', function() {
   //bind html5 data attributes to variables
   var delete_id = $(this).attr('data-delete-pending-id');
   var delete_access = $(this).attr('data-delete-pending-access');
   var delete_status = $(this).attr('data-delete-pending-status');

    //set values to id
    $('#delete_id').val(delete_id);
    $('#delete_access').val(delete_access);
    $('#delete_status').val(delete_status);

    //show modal
    $('.trgr_delete_pending_admin').trigger('click');
   });//end of onclick

   $(document).on('click', '.approve_pending_admin', function() {
    //bind html5 data attributes to variables
    var approve_id = $(this).attr('data-approve-pending-id');
    var approve_access = $(this).attr('data-approve-pending-access');
    var approve_status = $(this).attr('data-approve-pending-status');

     //set values to id
     $('#approve_id').val(approve_id);
     $('#approve_access').val(approve_access);
     $('#approve_status').val(approve_status);

     //show modal
     $('.trgr_approve_pending_admin').trigger('click');
    });//end of onclick


   $('#btn_delete_pending_admin').on('click', function(event) {
    delete_pending_admin("../../model/tbl_admin/update/delete_pending_admin.php","#frm_delete_pending_admin");
  });//end of onclick

  $('#btn_approve_pending_admin').on('click', function(event) {
   approve_pending_admin("../../model/tbl_admin/update/approve_pending_admin.php","#frm_approve_pending_admin");
 });//end of onclick




});//end of document.ready


//////////////////////Functions///////////////////////
function select_pending_admin(model_url, html_class_OR_id){
  $.ajax({
    url:  model_url,
    method: "GET",
    success:function(Result){
    //push the result on id or class
      $(html_class_OR_id).html(Result);
    },//end of success function
    complete:function(){
      //initialize pagination after data loaded
      var monkeyList = new List('list_pending_admin', {
        valueNames: ['id','name','gender','email','mobile','access','status'],
        page: 10,
        plugins: [ ListPagination({}) ]
      });
    }//end of complete function

  })
}//end of select_pending_admin

function delete_pending_admin(model_url,form_name){
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
        Materialize.toast("Admin successfully deleted", 8000, 'blue-grey darken-3');
      }
    },//end of success function

    complete:function( ){
      select_pending_admin("../../model/tbl_admin/select/select_pending_admin.php", "#tbl_pending_admin");
    }//end of complete function

  })//end of ajax
}//end of delete_pending_admin

function approve_pending_admin(model_url,form_name){
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
        Materialize.toast("Admin access Granted", 8000, 'blue-grey darken-3');
      }
    },//end of success function

    complete:function( ){
      select_pending_admin("../../model/tbl_admin/select/select_pending_admin.php", "#tbl_pending_admin");
    }//end of complete function

  })//end of ajax
}//end of delete_pending_admin