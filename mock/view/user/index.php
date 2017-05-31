<?php
  session_start();
  require 'session.php';
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="..\..\assets\fa\css\font-awesome.min.css">
    <link rel="stylesheet" href="..\..\assets\materialize\css\materialize.min.css">
    <link rel="stylesheet" href="..\..\assets\materialize\css\myStyle.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title></title>
  </head>
  <body class="grey lighten-3">

    <?php require 'nav.php'; ?>
    <div class="container">
      <div class="row">

        <div class="col s12 m12 l12" id="list_template" ><!--Table-->
          <div class="row">
            <div class="col s12 m8 l8">
              <h5>News Feed</h5>
            </div>
            <div class="col s12 m4 l4">
              <label>Search </label>
              <input type="text" class="search">
            </div>
          </div>

          <div class="row">
            <div class="col s12 m8 l8">
              <ul class="list collection" id="newsfeed"></ul>

              <ul class="pagination center"></ul>
            </div>
          </div>



        </div><!--end of col s12-->

      </div><!--end of row-->
    </div><!--end of container-->


  </body>
  <script src="..\..\assets\jquery\jquery.min.js" charset="utf-8"></script>
  <script src="..\..\assets\materialize\js\materialize.min.js" charset="utf-8"></script>
  <script src="..\..\assets\listjs\list.min.js" charset="utf-8"></script>
  <script src="..\..\assets\listjs\list.pagination.min.js" charset="utf-8"></script>
  <script src="..\..\controller\user\fetch_notif.js" charset="utf-8"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      $('.button-collapse').sideNav({menuWidth: 255});

      select_newsfeed("../../model/tbl_news/select/select_newsfeed.php", "#newsfeed")



    });//end of document.ready


    /////////////////////Functions///////////////////////
    function select_newsfeed(model_url, html_class_OR_id){
      $.ajax({
        url:  model_url,
        method: "GET",
        success:function(Result){
        //push the result on id or class
          $(html_class_OR_id).html(Result);
          $('.materialboxed').materialbox();
        },//end of success function
        complete:function(){
          //initialize pagination after data loaded
          var monkeyList = new List('list_template', {
            valueNames: ['doc_id','name','email'],
            page: 8,
            plugins: [ ListPagination({}) ]
          });
        }//end of complete function

      })
    }//end of select_pending_user

  </script>
</html>
