$(document).ready(function() {

    //disable enter key
    $('.input-field').keypress(function(event) {
        if (event.keyCode == 13) {
            event.preventDefault();
        }
    });

    $('#btn_submit').on('click', function() { //validate on btn click

        var ckeditor_content = CKEDITOR.instances.id_content.getData();
        $("#id_content").val(ckeditor_content);
        var ckeditor_content_length = ckeditor_content.length;

        if (ckeditor_content_length < 1) { //validate textarea
            swal({ //alert
                title: 'Error',
                text: "note: Template-Name and Template-Content is required",
                type: 'error',
                confirmButtonText: 'Ok',
                confirmButtonClass: 'btn waves-effect green darken-2',
                buttonsStyling: false
            }); //end of swal
            return false;
        } //end of if
        else if ($("#name").valid() == false) { //validate form
            swal({
                title: 'Error',
                text: "note: Template-Name and Template-Content is required",
                type: 'error',
                confirmButtonText: 'Ok',
                confirmButtonClass: 'btn waves-effect green darken-2',
                buttonsStyling: false
            }); //end of swal
        } //end of else if
        else {
            //finalize the content
            var ckeditor_content = CKEDITOR.instances.id_content.getData();
            $("#id_content").val(ckeditor_content);
            add_template("../../model/tbl_template/insert/add_template.php", "#frm_add_template");
        } //end of else
    }); //end of btn click


    $("#frm_add_template").validate({ //form validation
        rules: {
            name: {
                required: true
            }
        }, //end of rules

        messages: {
            name: {
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
}); //end of document.ready


//////////////////////////////////Functions/////////////////////////////
function add_template(model_url, form_name) {
    $.ajax({
            url: model_url,
            method: "POST",
            data: $(form_name).serialize(),
            dataType: "text",
            success: function(Result) {
                    if (Result == "error") {
                        Materialize.toast("Sorry an error occured", 8000, 'red');
                    } else if (Result == "success") {
                        $(form_name)[0].reset();

                        Materialize.toast("Template saved", 8000, 'green darken-2');
                    }
                } //end of success function
        }) //end of ajax
} //end of add_template