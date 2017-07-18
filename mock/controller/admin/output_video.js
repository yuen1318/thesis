   $(document).ready(function() {
    //get video

    
    output_video("../../model/tbl_file/select/output_video.php", "#tbl_my_video");
}); //end of document.ready

//////////////////////Functions///////////////////////
function output_video(model_url, html_class_OR_id) {
    $.ajax({
            url: model_url,
            method: "GET",
            success: function(Result) {
                //push the result on id or class
                $(html_class_OR_id).html(Result);
            }, //end of success function
            complete: function() {
                    //initialize pagination after data loaded
                    var monkeyList = new List('list_my_video', {
                        valueNames: ['file_id', 'name', 'signatories', 'cb', 'co', 'po'],
                        page: 8,
                        plugins: [ListPagination({})]
                    });
                } //end of complete function
        }) //end of ajax
} //end of output_video