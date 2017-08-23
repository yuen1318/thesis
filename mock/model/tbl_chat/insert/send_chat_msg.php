<?php
  session_start();
  require '../../dbConfig.php';
  require '../../a_functions/sanitize.php';




  if(isset($_SESSION["user_email"])){
    
  $email = $_SESSION["user_email"];
  }
  else if(isset($_SESSION["admin_email"])){
   
  $email = $_SESSION["admin_email"];
  }
  elseif(isset($_SESSION["sudo_email"])){
   
  $email = $_SESSION["sudo_email"];
  }
  else{
    echo"error";
  }


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
