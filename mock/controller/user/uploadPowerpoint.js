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

        if ($('#doc_type').valid() && $('#file_proxy').valid()) {
            var file_name = $('#powerpoint').val();
            var file_extension = file_name.split('.')[1];
            var final_extension = file_extension.toLowerCase();

            if (final_extension == "pptx" ||
                final_extension == "pptm" ||
                final_extension == "ppt") {

                $('.step2').removeClass('hide');
                $('.step1').addClass('hide');
            } //end of if
            else {
                swal({
                    title: 'Error',
                    text: "note: Document type must not be empty and only powerpoint extensions are allowed",
                    type: 'error',
                    confirmButtonText: 'Ok',
                    confirmButtonClass: 'btn waves-effect green darken-2',
                    buttonsStyling: false
                }); //end of swal
            } //end of else

        } //end of if
        else {
            swal({
                title: 'Error',
                text: "note: Document type must not be empty and only powerpoint extensions are allowed",
                type: 'error',
                confirmButtonText: 'Ok',
                confirmButtonClass: 'btn waves-effect green darken-2',
                buttonsStyling: false
            }); //end of swal
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

            var formData = new FormData($("#frm_powerpoint")[0]);

            $.ajax({
                url: '../../model/tbl_file/insert/upload_powerpoint.php',
                type: 'POST',
                data: formData,
                async: false,
                success: function(data) {
                    swal({
                        title: 'Success',
                        text: "Presentation uploaded successfully",
                        type: 'success',
                        confirmButtonText: 'Ok',
                        confirmButtonClass: 'btn waves-effect green darken-2',
                        buttonsStyling: false,
                        allowOutsideClick: false
                    }).then(function() {
                        // Redirect the user
                        window.location.href = "index.php";
                    }); //end of swal
                },
                cache: false,
                contentType: false,
                processData: false
            }); //end of ajax
            return false;
        } //end of else
    }); //end of onclick


    $("#frm_powerpoint").validate({ //form validation
        rules: {
            signatories: {
                required: true
            },
            doc_type: {
                required: true
            },
            file_proxy: {
                required: true
            }
        }, //end of rules
        messages: {
            signatories: {
                required: "<small class='right val red-text'>This field is required</small>"
            },
            doc_type: {
                required: "<small class='right val red-text'>This field is required</small>"
            },
            file_proxy: {
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
} //end of select__user

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