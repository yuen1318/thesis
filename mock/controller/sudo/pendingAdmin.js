$(document).ready(function(){

  
 

  select_pending_admin("../../model/tbl_admin/select/select_pending_admin.php", "#tbl_pending_admin");

  $(document).on('click', '.delete_pending_admin', function() {
   //bind html5 data attributes to variables
   var delete_id = $(this).attr('data-delete-pending-id');
    //set values to id
    $('#delete_id').val(delete_id);

    //show modal
    $('.trgr_delete_pending_admin').trigger('click');
   });//end of onclick

   $(document).on('click', '.approve_pending_admin', function() {
    //bind html5 data attributes to variables
    var approve_id = $(this).attr('data-approve-pending-id');
     //set values to id
     $('#approve_id').val(approve_id);
     //show modal
     $('.trgr_approve_pending_admin').trigger('click');
    });//end of onclick


   $('#btn_delete_pending_admin').on('click', function(event) {
    

    if ($("#frm_delete_pending_admin").valid()) { //check if all field is valid
      delete_pending_admin("../../model/tbl_admin/update/delete_pending_admin.php","#frm_delete_pending_admin");
      $('#delete_pending_admin_modal').modal('close');
      $('#delete_pw').val("");

    } else {
      $('.val').addClass('animated bounceIn');
      $('.val').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
      $('.val').removeClass('animated');
      });
    } //end of else

 
  });//end of onclick

  $('#btn_approve_pending_admin').on('click', function(event) {
    if ($("#frm_approve_pending_admin").valid()) { //check if all field is valid
      approve_pending_admin("../../model/tbl_admin/update/approve_pending_admin.php","#frm_approve_pending_admin");  
      $('#approve_pending_admin_modal').modal('close');
      $('#approve_pw').val("");
    } else {
      $('.val').addClass('animated bounceIn');
      $('.val').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
      $('.val').removeClass('animated');
      });
    } //end of else
   
 });//end of onclick



 $("#frm_approve_pending_admin").validate({ //form validation
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
  errorPlacement: function (error, element) {
    var placement = $(element).data('error');
    if (placement) {
      $(placement).append(error)
    } else {
      error.insertAfter(element);
    }
  } //end of errorElement
}); //end of validate


$("#frm_delete_pending_admin").validate({ //form validation
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
  errorPlacement: function (error, element) {
    var placement = $(element).data('error');
    if (placement) {
      $(placement).append(error)
    } else {
      error.insertAfter(element);
    }
  } //end of errorElement
}); //end of validate




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
  var options = {
    theme:"sk-bounce",
    message:"Processing request....",
    backgroundColor:"#212121",
    textColor:"white"
};   

HoldOn.open(options);

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
        HoldOn.close();
      }
    },//end of success function

    complete:function( ){
      select_pending_admin("../../model/tbl_admin/select/select_pending_admin.php", "#tbl_pending_admin");
    }//end of complete function

  })//end of ajax
}//end of delete_pending_admin
