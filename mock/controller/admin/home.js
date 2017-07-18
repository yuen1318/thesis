 $(document).ready(function(){
     select_admin_newsfeed("../../model/tbl_news/select/select_admin_newsfeed.php", "#newsfeed");
    });//end of document.ready


/////////////////////Functions///////////////////////
  function select_admin_newsfeed(model_url, html_class_OR_id) {
      $.ajax({
              url: model_url,
              method: "GET",
              success: function(Result) {
                  //push the result on id or class
                  $(html_class_OR_id).html(Result);
                  $('.materialboxed').materialbox();
              }, //end of success function
              complete: function() {
                      //initialize pagination after data loaded
                      var monkeyList = new List('list_newsfeed', {
                          valueNames: ['doc_id', 'name', 'email'],
                          page: 8,
                          plugins: [ListPagination({})]
                      });
                  } //end of complete function
          }) //end of ajax
  } //end of select_newsfeed