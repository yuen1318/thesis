<?php
  session_start();
  require '../../dbConfig.php';
  require '../../a_functions/sanitize.php';



  $email = $_SESSION["user_email"];
  $msg = sanitize($_POST["msg"]);
  $recepient =sanitize($_POST["recepient"]);
  $time= date("g:i a, Y, F j");



  $sql = "INSERT INTO tbl_chat(sender,msg,recepient,time) VALUES(?,?,?,?)";
  $stmt = $dbConn->prepare($sql);
  $stmt->bindValue(1, $email);
  $stmt->bindValue(2, $msg);
  $stmt->bindValue(3, $recepient);
  $stmt->bindValue(4, $time);
  $stmt->execute();

  echo "success";



 ?>
