$(document).ready(function() {

    //load content from server
    select_user("../../model/tbl_user/select/select_user_choice.php", "#tbl_user");

    //choose user from checkbox
    var arr = [];
    $(document).on('change', 'input[type=checkbox]', function() {
        if (this.checked) {
            arr.push(this.value)
        } else {
            arr.splice(arr.indexOf(this.value), 1);
        }
        $('#target').val(arr + '');
    });

    //disable enter key
    $('.input-field').keypress(function(event) {
        if (event.keyCode == 13) {
            event.preventDefault();
        }
    });

    //validate step 1
    $('#btn_step1').on('click', function() { //validate on btn click

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
        else if ($("#name").valid() == false || $("#doc_type").valid() == false) { //validate form
            swal({
                title: 'Error',
                text: "note: Document Type,Template Name,Template Content is required",
                type: 'error',
                confirmButtonText: 'Ok',
                confirmButtonClass: 'btn waves-effect green darken-2',
                buttonsStyling: false
            }); //end of swal
        } //end of else if
        else {
            $('.step2').removeClass('hide');
            $('.step1').addClass('hide');
        } //end of else
    }); //end of btn click

    $(document).on('click', '#btn_step2_back', function() {
        $('.step1').removeClass('hide');
        $('.step2').addClass('hide');
    }); //end of onclick

    $(document).on('click', '#btn_submit', function() {
        if (!$.trim($("#target").val())) { //check if textarea is empty or containes whitespaces
            swal({
                title: 'Error',
                text: "note: cannot create e-file without recepients",
                type: 'error',
                confirmButtonText: 'Ok',
                confirmButtonClass: 'btn waves-effect green darken-2',
                buttonsStyling: false
            }); //end of swal
        } else {
            create_efile("../../model/tbl_efile/insert/create_efile.php", "#frm_use_efile");
        } //end of else
    }); //end of onclick

    $("#frm_use_efile").validate({ //form validation
        rules: {
            name: {
                required: true
            },
            signatories: {
                required: true
            },
            doc_type: {
                required: true
            }
        }, //end of rules
        messages: {
            name: {
                required: "<small class='right val red-text'>This field is required</small>"
            },
            signatories: {
                required: "<small class='right val red-text'>This field is required</small>"
            },
            doc_type: {
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
function select_user(model_url, html_class_OR_id) {
    $.ajax({
        url: model_url,
        method: "GET",
        success: function(Result) {
            //push the result on id or class
            $(html_class_OR_id).html(Result);
        }, //end of success function
        complete: function() {
                //initialize pagination after data loaded
                load_init();
            } //end of complete function

    }); //end of ajax
} //end of select_user

function create_efile(model_url, form_name) {
    $.ajax({
        url: model_url,
        method: "POST",
        data: $(form_name).serialize(),
        dataType: "text",

        success: function(Result) {
            if (Result == "error") {
                Materialize.toast("Sorry an error occured", 8000, 'red');
            } else if (Result == "success") {
                swal({
                    title: 'Success',
                    text: "Efile successfully created",
                    type: 'success',
                    confirmButtonText: 'Ok',
                    confirmButtonClass: 'btn waves-effect green darken-2',
                    buttonsStyling: false,
                    allowOutsideClick: false
                }).then(function() {
                    // Redirect the user
                    window.location.href = "index.php";
                }); //end of swal
                 
            }
        }, //end of success function
    }); //end of ajax
} //end of create efile

function load_init() {
    var monkeyList = new List('list_user', {
        valueNames: ['id', 'email', 'name', 'title', 'department'],
        page: 8,
        plugins: [ListPagination({})]
    });
    // $(":checkbox").on("click", false);
    $('.materialboxed').materialbox();
    $('.button-collapse').sideNav({
        menuWidth: 255
    });
} //end of load_init