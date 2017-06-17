<?php
  session_start();
  require 'session.php';

  $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
  $validURL = str_replace("&","&amp;",$url);
  $chat_pick = parse_url($validURL, PHP_URL_QUERY);

 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="..\..\assets\fa\css\font-awesome.min.css">
    <link rel="stylesheet" href="..\..\assets\materialize\css\materialize.min.css">
    <link rel="stylesheet" href="..\..\assets\materialize\css\myStyle.css">
    <link rel="stylesheet" href="..\..\assets\sweetalert2\sweetalert2.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <title></title>

    <style media="screen">

    #chat_div{overflow:scroll;height:100vh;}
    #chat_history{overflow:scroll;height: 60vh;border: 2px solid green;}
    #chat_msg{overflow:scroll;height: 15vh;border: 2px solid green;}

   @media only screen and (max-width : 992px) {
     #chat_div{overflow:scroll !important;height:30vh !important;}
     #chat_history{overflow:scroll !important;height:40vh !important;}
     #chat_msg{height: 7vh !important;}
   }

    </style>

  </head>
  <body>
    <?php require 'nav.php'; ?>

    <!--this form refresh every 3 sec to fetch data of chatpick-->
    <form id="frm_chat_pick" class="hide">
      <input type="text" id="chat_pick" name="chat_pick" value="<?php echo $chat_pick?>">
    </form>

    <div class="row">
      <div class="col s12 m4  l4" id="chat_div" >
        <h5>Chat Room</h5>

        <div class="">
          <input type="text" name="" value="">
        </div>

        <ul class="collection" id="chat_list"></ul>

      </div><!--end of chat list-->

      <div class="col s12 m8 l8"><br>
        <div class="row" id="chat_history"></div>

        <form id="frm_chat">
          <input class='hide' type="text" name="recepient" value="<?php echo $chat_pick?>">
          <textarea class="row" id="chat_msg" placeholder="message here" name="msg"></textarea><br>
          <button type="button" class="waves-effect btn green darken-2 right" id="btn_frm_chat">Send</button>
        </form><!--end of form-->

        <div><!--end of text area-->
    </div><!--end of row-->

  </body>

  <script src="..\..\assets\jquery\jquery.min.js" charset="utf-8"></script>
  <script src="..\..\assets\jquery\jquery.validate.min.js" charset="utf-8"></script>
  <script src="..\..\assets\jquery\jquery.additionalMethod.min.js" charset="utf-8"></script>
  <script src="..\..\assets\materialize\js\materialize.min.js" charset="utf-8"></script>
  <script src="..\..\assets\sweetalert2\sweetalert2.min.js" charset="utf-8"></script>
  <script src="..\..\controller\user\fetch_user_notif.js" charset="utf-8"></script>

  <script type="text/javascript">
  $(document).ready(function(){
    $('.button-collapse').sideNav({menuWidth: 255});
    $('.modal').modal();

    //if chatpick is null disable txtarea and submit button
    if ( $('#chat_pick').val() == '') {
      $("#chat_msg").prop('disabled', true);
      $("#btn_frm_chat").prop('disabled', true);
    }

    select_chat_list("../../model/tbl_user/select/select_chat_list.php", "#chat_list");
    send_chat_pick("../../model/tbl_chat/select/select_chat_history.php","#frm_chat_pick","#chat_history");

    setInterval(function(){
      send_chat_pick("../../model/tbl_chat/select/select_chat_history.php","#frm_chat_pick","#chat_history");
    },3000);

    $('#btn_frm_chat').on('click', function() {//validate on btn click
     if ($("#frm_chat").valid()){//check if all field is valid
       send_chat_msg("../../model/tbl_chat/insert/send_chat_msg.php","#frm_chat");
     }
     else{
        $('.val').addClass('animated bounceIn');
        $('.val').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
        $('.val').removeClass('animated');
       });
     }//end of else
    });//end of btn click


    $("#frm_chat").validate({//form validation
      rules:{
        msg: {required: true}
      },//end of rules

      messages: {
        msg: {required: "<small class='right val red-text'>This field is required</small>"}
        },//end of messages

      errorElement : 'div',
      errorPlacement: function(error, element) {
        var placement = $(element).data('error');
        if (placement) {
          $(placement).append(error)
        } else {
          error.insertAfter(element);
        }
      }//end of errorElement
    });//end of validate



  });//end of document.ready

  //////////////////////Functions///////////////////
  function select_chat_list(model_url, html_class_OR_id){
    $.ajax({
      url:  model_url,
      method: "GET",
      success:function(Result){
      //push the result on id or class
        $(html_class_OR_id).html(Result);
      },//end of success function
      complete:function(){

      }//end of complete function

    })
  }//end of select_pending_user

  function send_chat_msg(model_url,form_name){
    $.ajax({
      url:  model_url,
      method:"POST",
      data: $(form_name).serialize(),
      dataType:"text",

      success:function(Result){
        if(Result == "error"){
            Materialize.toast("Sorry an error occured", 8000, 'red');
        }
        else if(Result == "success") {
          send_chat_pick("../../model/tbl_chat/select/select_chat_history.php","#frm_chat_pick","#chat_history");
          $(form_name)[0].reset();
        }
      },//end of success function
    });//end of ajax
  }//end of send_chat_msg


  function send_chat_pick(model_url,form_name,html_class_OR_id){
    $.ajax({
      url:  model_url,
      method:"POST",
      data: $(form_name).serialize(),
      dataType:"text",

      success:function(Result){
        $(html_class_OR_id).html(Result);
      },//end of success function

    });//end of ajax
  }//end of send_chat_msg



  </script>
</html>
