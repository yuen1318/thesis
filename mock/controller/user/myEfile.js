 $(document).ready(function() {
     //get efile
     select_my_efile("../../model/tbl_efile/select/select_my_efile.php", "#tbl_my_efile");
 }); //end of document.ready

 //////////////////////Functions///////////////////////
 function select_my_efile(model_url, html_class_OR_id) {
     $.ajax({
             url: model_url,
             method: "GET",
             success: function(Result) {
                 //push the result on id or class
                 $(html_class_OR_id).html(Result);
             }, //end of success function
             complete: function() {
                     //initialize pagination after data loaded
                     var monkeyList = new List('list_my_efile', {
                         valueNames: ['doc_id', 'name', 'signatories', 'name', 'cb', 'co', 'po'],
                         page: 8,
                         plugins: [ListPagination({})]
                     });
                 } //end of complete function
         }) //end of ajax
 } //end of select_pending_user