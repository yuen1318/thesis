 $(document).ready(function() {

     //get templates
     select_template("../../model/tbl_template/select/select_template.php", "#tbl_template");

     $(document).on('click', '.delete_template', function() {
         //bind html5 data attributes to variables
         var delete_id = $(this).attr('data-delete-template-id');
         //set values to id
         $('#delete_id').val(delete_id);
         //show modal
         $('.trgr_delete_template').trigger('click');
     }); //end of onclick

     $('#btn_delete_template').on('click', function(event) {
         delete_template("../../model/tbl_template/delete/delete_template.php", "#frm_delete_template");
     }); //end of onclick
 }); //end of document.ready


 //////////////////////Functions///////////////////////
 function select_template(model_url, html_class_OR_id) {
     $.ajax({
             url: model_url,
             method: "GET",
             success: function(Result) {
                 //push the result on id or class
                 $(html_class_OR_id).html(Result);
             }, //end of success function
             complete: function() {
                     //initialize pagination after data loaded
                     var monkeyList = new List('list_template', {
                         valueNames: ['tmp_id', 'name'],
                         page: 8,
                         plugins: [ListPagination({})]
                     });
                 } //end of complete function
         }) //end of ajax
 } //end of select_template

 function delete_template(model_url, form_name) {
     $.ajax({
             url: model_url,
             method: "POST",
             data: $(form_name).serialize(),
             dataType: "text",
             success: function(Result) {
                 if (Result == "error") {
                     Materialize.toast("Sorry an error occured", 8000, 'red');
                 } else if (Result == "success") {
                     Materialize.toast("User successfully deleted", 8000, 'green darken-2');
                 }
             }, //end of success function
             complete: function() {
                     select_template("../../model/tbl_template/select/manage_template.php", "#tbl_template");
                 } //end of complete function
         }) //end of ajax
 } //end of delete_template