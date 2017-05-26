<?php
  session_start();
  require '../../dbConfig.php';
  require '../../a_functions/sanitize.php';

  //for tbl_news
  $date = date("Y, F j");
  $time = date("g:i a");
  $email = $_SESSION["user_email"];
  ////


  $doc_id = uniqid("efile_" , TRUE);
  $name = sanitize($_POST['name']);
  $doc_type =  $_POST['doc_type'];
  $content = $_POST['content'];
  $signatories = $_POST['signatories'];
  $created_by = $_SESSION['user_email'];
  $created_on = date("Y, F j, g:i a");



if (isset($_POST['content'])) {
  $sql = "INSERT INTO tbl_efile(doc_id,doc_type,name,content,signatories, pending_signatories,created_by,created_on,status) VALUES(?,?,?,?,?,?,?,?,?)";
  $stmt = $dbConn->prepare($sql);
  $stmt->bindValue(1, $doc_id);
  $stmt->bindValue(2, $doc_type);
  $stmt->bindValue(3, $name);
  $stmt->bindValue(4, $content);
  $stmt->bindValue(5, $signatories);
  $stmt->bindValue(6, $signatories);
  $stmt->bindValue(7, $created_by);
  $stmt->bindValue(8, $created_on);
  $stmt->bindValue(9, "pending");
  $stmt->execute();

  if ($stmt) {
    $sql2 = "INSERT INTO tbl_news(doc_id,name,email,date,time,signatories,pending_signatories,approved_signatories,msg,photo) VALUES(?,?,?,?,?,?,?,?,?,?)";
    $stmt = $dbConn->prepare($sql2);
    $stmt->bindValue(1, $doc_id);
    $stmt->bindValue(2, $name);
    $stmt->bindValue(3, $email);
    $stmt->bindValue(4, $date);
    $stmt->bindValue(5, $time);
    $stmt->bindValue(6, $signatories);
    $stmt->bindValue(7, $signatories);
    $stmt->bindValue(8, "");
    $stmt->bindValue(9, "has created an efile");
    $stmt->bindValue(10, $email.".jpg");
    $stmt->execute();
    echo "success";
  }
  else {
    echo "error";
  }
}





 ?>
