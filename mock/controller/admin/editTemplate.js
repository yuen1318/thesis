 $(document).ready(function(){

  

    $('.input-field').keypress(function(event) {
        if (event.keyCode == 13) {
            event.preventDefault();
        }
    });
 
    $('#btn_submit').on('click', function() {//validate on btn click

      var ckeditor_content = CKEDITOR.instances.id_content.getData();
      $("#id_content").val(ckeditor_content);
      var ckeditor_content_length = ckeditor_content.length;

      if (  ckeditor_content_length < 1 ) {//validate textarea
        swal({//alert
        title: 'Error',
        text: "note: Template-Name and Template-Content is required",
        type: 'error',
        confirmButtonText: 'Ok',
        confirmButtonClass: 'btn waves-effect teal lighten-1',
        buttonsStyling: false
        });//end of swal
        return false;
      }//end of if

      else if ($("#frm_edit_template").valid() == false) {//validate form
        swal({
        title: 'Error',
        text: "note: Department, Template-Name and Template-Content is required",
        type: 'error',
        confirmButtonText: 'Ok',
        confirmButtonClass: 'btn waves-effect teal lighten-1',
        buttonsStyling: false
        });//end of swal
      }//end of else if
 
      else {
        var ckeditor_content = CKEDITOR.instances.id_content.getData();
        $("#id_content").val(ckeditor_content);
        edit_template("../../model/tbl_template/update/edit_template.php", "#frm_edit_template");
          swal({
            title: 'Success',
            text: "Template successfully created",
            type: 'success',
            confirmButtonText: 'Ok',
            confirmButtonClass: 'btn waves-effect teal lighten-1',
            buttonsStyling: false,
            allowOutsideClick: false
        }).then(function() {
            // Redirect the user
            window.location.href = "manageTemplate.php";
        }); //end of swal 
      }//end of else
    });//end of btn click



    $("#frm_edit_template").validate({//form validation
      rules:{
        name: {required: true},
        department: {required: true}
      },//end of rules

      messages: {
        name: {required: "<small class='right val red-text'>This field is required</small>"},
        department: {required: "<small class='right val red-text'>This field is required</small>"}
        },//end of messages

      errorElement : 'div',
      errorPlacement: function(error, element) {
        var placement = $(element).data('error');
        if (placement) {
          $(placement).append(error)
        } else {
          error.insertAfter(element);
        }
      }//end of errorElement
    });//end of validate


  });//end of document.ready



  //////////////////////////////////Functions/////////////////////////////
  function select_department(model_url, html_class_OR_id){
  $.ajax({
      url:  model_url,
      method: "GET",
      success:function(Result){
      //push the result on id or class
        $(html_class_OR_id).html(Result);
      }
    });
  }//end of select_department

  function edit_template(model_url,form_name){
    var options = {
      theme:"sk-bounce",
      message:"Editing template....",
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
          HoldOn.close();
          Materialize.toast("Edited Template Saved", 8000, 'teal lighten-1');
        }
      }//end of success function

    })//end of ajax
  }//end of add_template