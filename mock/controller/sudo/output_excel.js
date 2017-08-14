     $(document).ready(function() {
     //get excel

     
     output_excel("../../model/tbl_file/select/output_excel.php", "#tbl_my_excel");
 }); //end of document.ready

 //////////////////////Functions///////////////////////
 function output_excel(model_url, html_class_OR_id) {
     $.ajax({
             url: model_url,
             method: "GET",
             success: function(Result) {
                 //push the result on id or class
                 $(html_class_OR_id).html(Result);
             }, //end of success function
             complete: function() {
                     //initialize pagination after data loaded
                     var monkeyList = new List('list_my_excel', {
                         valueNames: ['file_id', 'name', 'signatories', 'cb', 'co', 'po'],
                         page: 8,
                         plugins: [ListPagination({})]
                     });
                 } //end of complete function
         }) //end of ajax
 } //end of select_my_excel