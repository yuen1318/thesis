$(document).ready(function() {
 
    //this code lets the scrollbar go down when the page load
    $('#chat_history').animate({scrollTop:5000}, 1000);

    //if chatpick is null disable textarea and submit button
    if ($('#chat_pick').val() == '') {
        $("#chat_msg").prop('disabled', true);
        $("#btn_frm_chat").prop('disabled', true);
    } //end of if 
 
    //get list of user for chat
    select_chat_list("../../model/tbl_admin/select/select_chat_list.php", "#chat_list");
    //select the person u want to chat with and get conversation history
    send_chat_pick("../../model/tbl_chat/select/select_chat_history.php", "#frm_chat_pick", "#chat_history");


    setInterval(function() { //refresh every 3sec to fetch data
        send_chat_pick("../../model/tbl_chat/select/select_chat_history.php", "#frm_chat_pick", "#chat_history");
    }, 3000);

    setInterval(function() { //refresh every 3sec to fetch data
        select_chat_list("../../model/tbl_admin/select/select_chat_list.php", "#chat_list");
    }, 3000);

    $('#btn_frm_chat').on('click', function() { //validate on btn click
        if ($("#frm_chat").valid()) { //check if all field is valid
            send_chat_msg("../../model/tbl_chat/insert/send_chat_msg.php", "#frm_chat");
            
        } else {
            $('.val').addClass('animated bounceIn');
            $('.val').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
                $('.val').removeClass('animated');
            });
        } //end of else
    }); //end of btn click

    $("#frm_chat").validate({ //form validation
        rules: {
            msg: {
                required: true
            }
        }, //end of rules
        messages: {
            msg: {
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

//////////////////////Functions///////////////////
function select_chat_list(model_url, html_class_OR_id) {
    $.ajax({
            url: model_url,
            method: "GET",
            success: function(Result) {
                //push the result on id or class
                $(html_class_OR_id).html(Result);
            }, //end of success function
            complete: function() {
                    //search input
                    var $rows = $('#chat_list li');
                    $('#search').keyup(function() {
                        var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();
                        $rows.show().filter(function() {
                            var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
                            return !~text.indexOf(val);
                        }).hide();
                    }); //end of keyup
                } //end of complete function
        }) //end of ajax
} //end of select_pending_user

function send_chat_msg(model_url, form_name) {
    $.ajax({
        url: model_url,
        method: "POST",
        data: $(form_name).serialize(),
        dataType: "text",
        success: function(Result) {
            if (Result == "error") {
                Materialize.toast("Sorry an error occured", 8000, 'red');
            } else if (Result == "success") {
                send_chat_pick("../../model/tbl_chat/select/select_chat_history.php", "#frm_chat_pick", "#chat_history");
                $(form_name)[0].reset();
                
            }
        }, //end of success function
        complete: function(){
            $('#chat_history').animate({scrollTop:5000}, 1000);
        }
    }); //end of ajax
} //end of send_chat_msg

function send_chat_pick(model_url, form_name, html_class_OR_id) {
    $.ajax({
        url: model_url,
        method: "POST",
        data: $(form_name).serialize(),
        dataType: "text",
        success: function(Result) {
            $(html_class_OR_id).html(Result);
 
        }, //end of success function
    }); //end of ajax
} //end of send_chat_pick