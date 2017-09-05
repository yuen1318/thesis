$(document).ready(function () {
    select_admin_instruction("../../model/tbl_instruction/select/select_admin_instruction.php", "#list_instruction");
    }); //end of document.ready

    ////////Function
    function select_admin_instruction(model_url, html_class_OR_id) {
    $.ajax({
        url: model_url,
        method: "GET",
        success: function (Result) {
        //push the result on id or class
        $(html_class_OR_id).html(Result);
        
        },
        complete: function(){
            $('.collapsible').collapsible();
        }
    });
    } //end of select_department