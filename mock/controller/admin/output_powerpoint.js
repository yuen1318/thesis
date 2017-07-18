     $(document).ready(function() {
      //get powerpoint

      
      output_powerpoint("../../model/tbl_file/select/output_powerpoint.php", "#tbl_my_powerpoint");
  }); //end of document.ready

  //////////////////////Functions///////////////////////
  function output_powerpoint(model_url, html_class_OR_id) {
      $.ajax({
              url: model_url,
              method: "GET",
              success: function(Result) {
                  //push the result on id or class
                  $(html_class_OR_id).html(Result);
              }, //end of success function
              complete: function() {
                      //initialize pagination after data loaded
                      var monkeyList = new List('list_my_powerpoint', {
                          valueNames: ['file_id', 'name', 'signatories', 'cb', 'co', 'po'],
                          page: 8,
                          plugins: [ListPagination({})]
                      });
                  } //end of complete function
          }) //end of ajax
  } //end of select_my_powerpoint