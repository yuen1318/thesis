$(document).ready(function(){

   

    select_deleted_user("../../model/tbl_user/select/select_deleted_user.php", "#tbl_deleted_user");

    $(document).on('click', '.delete_deleted_user', function() {
     //bind html5 data attributes to variables
     var delete_id = $(this).attr('data-delete-deleted-id');
      //set values to id
      $('#delete_id').val(delete_id);
      //show modal
      $('.trgr_delete_deleted_user').trigger('click');
     });//end of onclick

     $(document).on('click', '.restore_deleted_user', function() {
      //bind html5 data attributes to variables
      var restore_id = $(this).attr('data-restore-deleted-id');
       //set values to id
       $('#restore_id').val(restore_id);

       //show modal
       $('.trgr_restore_deleted_user').trigger('click');
      });//end of onclick


     $('#btn_delete_deleted_user').on('click', function(event) {
       
       if ($("#frm_delete_deleted_user").valid()) { //check if all field is valid
        delete_deleted_user("../../model/tbl_user/delete/delete_deleted_user.php", "#frm_delete_deleted_user");        
        $('#delete_deleted_user_modal').modal('close');
        $('#delete_pw').val("");
 
      } else {
        $('.val').addClass('animated bounceIn');
        $('.val').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
          $('.val').removeClass('animated');
        });
      } //end of else

    });//end of onclick

    $('#btn_restore_deleted_user').on('click', function(event) {
      
      if ($("#frm_restore_deleted_user").valid()) { //check if all field is valid
        restore_deleted_user("../../model/tbl_user/update/restore_deleted_user.php" , "#frm_restore_deleted_user");        
        $('#restore_deleted_user_modal').modal('close');
        $('#restore_pw').val("");
 
      } else {
        $('.val').addClass('animated bounceIn');
        $('.val').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
          $('.val').removeClass('animated');
        });
      } //end of else

   });//end of onclick




   $("#frm_delete_deleted_user").validate({ //form validation
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

  $("#frm_restore_deleted_user").validate({ //form validation
    rules: {
      restore_pw: {
        required: true,
        equalTo: "#restore_rpw"
      }
    }, //end of rules
    messages: {
      restore_pw: {
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