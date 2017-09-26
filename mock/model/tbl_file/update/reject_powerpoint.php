<?php
session_start();
date_default_timezone_set('Asia/Manila');
require '../../dbConfig.php';
require '../../a_functions/sanitize.php';

$user_info ="<b>".$_SESSION['user_department'].":</b></br></br>".$_SESSION['user_fn']." ".$_SESSION['user_mn']." ".$_SESSION['user_ln']. "</br>". $_SESSION['user_email']. "</br><i>". $_SESSION['user_title']."</i>";

$file_id = $_POST['reject_id'];
$email = $_SESSION['user_email'] ;
$comment = $_POST['comment'];

$update_on = date("Y, F j, g:i a");

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

   $proxy_signatories = $row['proxy_signatories'];
   $proxy_approved = $row['proxy_approved'];
   $proxy_pending = $row['proxy_pending'];
   $proxy_created = $row['proxy_created'];

 }
 
    if ($stmt) {
      $date = date("Y, F j");
      $time = date("g:i a");

      $sql2 = "INSERT INTO tbl_news(doc_id,name,email,date,time,signatories,pending_signatories,approved_signatories,msg,photo,created_by,proxy_signatories,proxy_approved,proxy_pending) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
      $stmt = $dbConn->prepare($sql2);
      $stmt->bindValue(1, $file_id);
      $stmt->bindValue(2, $file_name);
      $stmt->bindValue(3, $user_info);
      $stmt->bindValue(4, $date);
      $stmt->bindValue(5, $time);
      $stmt->bindValue(6, $signatories);
      $stmt->bindValue(7, $pending_signatories);
      $stmt->bindValue(8, $approved_signatories );
      $stmt->bindValue(9, "<strong>Has rejected a Presentation</strong>");
      $stmt->bindValue(10, $email.".jpg");
      $stmt->bindValue(11, $created_by);

      $stmt->bindValue(12, $proxy_signatories);
      $stmt->bindValue(13, $proxy_approved);
      $stmt->bindValue(14, $proxy_pending);

      $stmt->execute();


      if ($stmt) {
        $sql3 = "INSERT INTO tbl_file_trgr(file_id,orig_name,pending_signatories,approved_signatories,disapproved,comment,status,action,date_time) VALUES(?,?,?,?,?,?,?,?,?)";
        $stmt = $dbConn->prepare($sql3);
        $stmt->bindValue(1, $file_id);
        $stmt->bindValue(2, $file_name);
        $stmt->bindValue(3, $proxy_pending);
        $stmt->bindValue(4, $proxy_approved);
        $stmt->bindValue(5, $_SESSION["user_fn"]. " " . $_SESSION["user_ln"]);
        $stmt->bindValue(6, $comment);
        $stmt->bindValue(7, "pending");
        $stmt->bindValue(8, "UPDATE");
        $stmt->bindValue(9, $update_on);
        $stmt->execute();
         
        echo "success";
      }//end of if
      else {
        echo "error";
      }//end of else


    }

    else {
      echo "error";
    }


 ?>
