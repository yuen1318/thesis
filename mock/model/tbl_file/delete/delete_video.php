<?php
session_start();
require '../../dbConfig.php';

 $file_id = $_POST['delete_id'];
 $email = $_SESSION['user_email'];
 $date = date("Y, F j");
 $time = date("g:i a");


 #step 1 select the efile
 $sql = "SELECT * FROM tbl_file WHERE file_id=?";
 $stmt = $dbConn->prepare($sql);
 $stmt->bindValue(1, $file_id);
 $stmt->execute();

 if ($stmt) {
   #step 2 save the values in variable
   $row = $stmt->fetch(PDO::FETCH_ASSOC);
   $file_name = $row['proxy'];
   $signatories = $row['signatories'];
   $pending_signatories = $row['pending_signatories'];
   $approved_signatories = $row['approved_signatories'];

 }

   $sql2 = "DELETE FROM tbl_file WHERE file_id=?";
   $stmt = $dbConn->prepare($sql2);
   $stmt->bindValue(1, $file_id);
   $stmt->execute();

  if ($stmt) {

    $sql3 = "INSERT INTO tbl_news(doc_id,name,email,date,time,signatories,pending_signatories,approved_signatories,msg,photo,created_by) VALUES(?,?,?,?,?,?,?,?,?,?,?)";
    $stmt = $dbConn->prepare($sql3);
    $stmt->bindValue(1, $file_id);
    $stmt->bindValue(2, $file_name);
    $stmt->bindValue(3, $email);
    $stmt->bindValue(4, $date);
    $stmt->bindValue(5, $time);
    $stmt->bindValue(6, $signatories);
    $stmt->bindValue(7, $pending_signatories);
    $stmt->bindValue(8, $approved_signatories);
    $stmt->bindValue(9, "has deleted a Video");
    $stmt->bindValue(10, $email.".jpg");
    $stmt->bindValue(11, $email);
    $stmt->execute();


    echo "success";
  }

  else {
    echo "error";
  }


 ?>
