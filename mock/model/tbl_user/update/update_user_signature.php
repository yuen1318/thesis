<?php

  session_start();
  $email = $_SESSION["user_email"];
  $data_uri = $_POST['siginput'];
  $encoded_image = explode(",", $data_uri)[1];
  $decoded_image = base64_decode($encoded_image);
  file_put_contents("../../../DB/signature/" .$email. ".png", $decoded_image);
  echo "success";

 ?>
