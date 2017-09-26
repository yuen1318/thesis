 $(document).ready(function(){

  
      select_powerpoint_tracks("../../model/tbl_file/select/select_powerpoint_tracks.php", "#tbl_powerpoint_tracks");

    });//end of document.ready


    //////////////////////Functions///////////////////////
    function select_powerpoint_tracks(model_url, html_class_OR_id){
      $.ajax({
        url:  model_url,
        method: "GET",
        success:function(Result){
        //push the result on id or class
          $(html_class_OR_id).html(Result);
        },//end of success function
        complete:function(){
          //initialize pagination after data loaded
          var monkeyList = new List('list_powerpoint_tracks', {
            valueNames: ['file_id','name','date'],
            page: 8,
            plugins: [ ListPagination({}) ]
          });
        }//end of complete function

      })
    }//end of select_pending_user
