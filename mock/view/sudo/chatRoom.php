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
    <link rel="stylesheet" href="../../assets/fa/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../assets/materialize/css/materialize.min.css">
    <link rel="stylesheet" href="../../assets/materialize/css/myStyle.css">
    <link rel="stylesheet" href="../../assets/sweetalert2/sweetalert2.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title></title>
    <style media="screen">
      #chat_div {
        overflow: scroll;
        height: 100vh;
      }

      #chat_history {
        overflow: scroll;
        height: 60vh;
        border: 2px solid #37474f;
      }

      #chat_msg {
        overflow: scroll;
        height: 15vh;
        border: 2px solid #37474f;
      }

      @media only screen and (max-width: 992px) {
        #chat_div {
          overflow: scroll !important;
          height: 30vh !important;
        }
        #chat_history {
          overflow-y:scroll !important;
           
          height: 40vh !important;
        }
        #chat_msg {
          height: 7vh !important;
        }
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
      <div class="col s12 m4  l4" id="chat_div">
        <h5>Chat Room</h5>

        <div>
          <input type="text" class="search" id="search">
        </div>

        <ul class="collection list" id="chat_list"></ul>
      </div>
      <!--end of chat list-->

      <div class="col s12 m8 l8"><br>
        <div class="row" id="chat_history"></div>

        <form id="frm_chat">
          <input class='hide' type="text" name="recepient" value="<?php echo $chat_pick?>">
          <textarea class="row" id="chat_msg" placeholder="message here" name="msg"></textarea><br>
          <button type="button" class="waves-effect btn blue-grey darken-3 right" id="btn_frm_chat">Send</button>
        </form>
        <!--end of form-->

        <div>
          <!--end of text area-->
        </div>
        <!--end of row-->
  </body>

  <script src="../../assets/jquery/jquery.min.js" charset="utf-8"></script>
  <script src="../../assets/jquery/jquery.validate.min.js" charset="utf-8"></script>
  <script src="../../assets/jquery/jquery.additionalMethod.min.js" charset="utf-8"></script>
  <script src="../../assets/materialize/js/materialize.min.js" charset="utf-8"></script>
  <script src="../../assets/sweetalert2/sweetalert2.min.js" charset="utf-8"></script>
  <script src="../../controller/admin/fetch_admin_notif.js" charset="utf-8"></script>
  <script src="../../controller/admin/chatRoom.js" charset="utf-8"></script>
  </html>