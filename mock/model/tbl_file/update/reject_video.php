<?php
session_start();
require '../../dbConfig.php';
require '../../a_functions/sanitize.php';

$file_id = $_POST['reject_id'];
$email = $_SESSION['user_email'] ;
$comment = $_POST['comment'];


 $sql = "UPDATE tbl_file SET disapproved=?, comment=? WHERE file_id=?";
 $stmt = $dbConn->prepare($sql);
 $stmt->bindValue(1, $email);
 $stmt->bindValue(2, $comment);
 $stmt->bindValue(3, $file_id);
 $stmt->execute();

 $sql2 = "SELECT * FROM tbl_file WHERE file_id=?";
 $stmt = $dbConn->prepare($sql2);
 $stmt->bindValue(1, $file_id);
 $stmt->execute();

 if ($stmt) {
   #step 2 save the values in variable
   $row = $stmt->fetch(PDO::FETCH_ASSOC);
   $signatories = $row['signatories'];
   $file_name = $row['orig_name'];
   $created_by = $row['created_by'];
   $pending_signatories = $row['pending_signatories'];
   $approved_signatories = $row['approved_signatories'];
 }

    if ($stmt) {
      $date = date("Y, F j");
      $time = date("g:i a");

      $sql2 = "INSERT INTO tbl_news(doc_id,name,email,date,time,signatories,pending_signatories,approved_signatories,msg,photo,created_by) VALUES(?,?,?,?,?,?,?,?,?,?,?)";
      $stmt = $dbConn->prepare($sql2);
      $stmt->bindValue(1, $file_id);
      $stmt->bindValue(2, $file_name);
      $stmt->bindValue(3, $email);
      $stmt->bindValue(4, $date);
      $stmt->bindValue(5, $time);
      $stmt->bindValue(6, $signatories);
      $stmt->bindValue(7, $pending_signatories);
      $stmt->bindValue(8, $approved_signatories );
      $stmt->bindValue(9, "has rejected a video");
      $stmt->bindValue(10, $email.".jpg");
      $stmt->bindValue(11, $created_by);
      $stmt->execute();


      echo "success";

    }

    else {
      echo "error";
    }


 ?>
