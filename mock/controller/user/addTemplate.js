$(document).ready(function(){
  $('.button-collapse').sideNav({menuWidth: 255});

  $('.input-field').keypress(function(event) {
      if (event.keyCode == 13) {
          event.preventDefault();
      }
  });

  $('#btn_submit').on('click', function() {//validate on btn click
    var content = tinyMCE.get('id_content').getContent(), patt;
    //Here goes the RegEx
    patt = /^<p>(&nbsp;\s)+(&nbsp;)+<\/p>$/g;

    if (content == '' || patt.test(content)) {//validate textarea
      swal({//alert
      title: 'Error',
      text: "note: Template-Name and Template-Content is required",
      type: 'error',
      confirmButtonText: 'Ok',
      confirmButtonClass: 'btn waves-effect green darken-2',
      buttonsStyling: false
      });//end of swal
      return false;
    }//end of if

    else if ($("#name").valid() == false) {//validate form
      swal({
      title: 'Error',
      text: "note: Template-Name and Template-Content is required",
      type: 'error',
      confirmButtonText: 'Ok',
      confirmButtonClass: 'btn waves-effect green darken-2',
      buttonsStyling: false
      });//end of swal
    }//end of else if

    else {
      tinyMCE.triggerSave();//finalize the content of tinyMCE
      add_template("../../model/tbl_template/insert/add_template.php", "#frm_add_template");
    }//end of else
  });//end of btn click



  $("#frm_add_template").validate({//form validation
    rules:{
      name: {required: true}
    },//end of rules

    messages: {
      name: {required: "<small class='right val red-text'>This field is required</small>"}
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


//tinymce initialization
tinymce.init({
  selector:"textarea.tinymce",
    height: 620,
    theme: 'modern',
    save_enablewhendirty: true,

    plugins: [
      'advlist autolink lists link image charmap  preview hr anchor pagebreak',
      'searchreplace wordcount visualblocks visualchars fullscreen',
      'insertdatetime  nonbreaking save table contextmenu directionality',
      'emoticons template paste textcolor colorpicker textpattern imagetools codesample   save'
    ],
    toolbar1: 'undo redo | insert  | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image preview media | forecolor backcolor',
    image_advtab: true,
    templates: [
      { title: 'Test template 1', content: 'Test 1' },
      { title: 'Test template 2', content: 'Test 2' }
    ],
    content_css: [
      'http://fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
      'http://www.tinymce.com/css/codepen.min.css'
    ]
});

//////////////////////////////////Functions/////////////////////////////
function add_template(model_url,form_name){
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
        $(form_name)[0].reset();

        Materialize.toast("Template saved", 8000, 'green darken-2');
      }
    }//end of success function

  })//end of ajax
}//end of add_template
