<?php
session_start();
require '../../dbConfig.php';


$user_info ="<b>".$_SESSION['user_department'].":</b></br></br>".$_SESSION['user_fn']." ".$_SESSION['user_mn']." ".$_SESSION['user_ln']. "</br>". $email. "</br><i>". $_SESSION['user_title']."</i>";

  $doc_id = $_POST['delete_id'];
  $email = $_SESSION['user_email'];
  $date = date("Y, F j");
  $time = date("g:i a");

  $delete_on = date("Y, F j, g:i a");
  #step 1 select the efile
  $sql = "SELECT * FROM tbl_efile WHERE doc_id=?";
  $stmt = $dbConn->prepare($sql);
  $stmt->bindValue(1, $doc_id);
  $stmt->execute();

  if ($stmt) {
    #step 2 save the values in variable
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $file_name = $row['name'];
    $signatories = $row['signatories'];
    $disapproved = $row['disapproved'];
    $comment = $row['comment'];
    $pending_signatories = $row['pending_signatories'];
    $approved_signatories = $row['approved_signatories'];

  }

    $sql2 = "DELETE FROM tbl_efile WHERE doc_id=?";
    $stmt = $dbConn->prepare($sql2);
    $stmt->bindValue(1, $doc_id);
    $stmt->execute();

   if ($stmt) {

 
     $sql3 = "INSERT INTO tbl_news(doc_id,name,email,date,time,signatories,pending_signatories,approved_signatories,msg,photo,created_by) VALUES(?,?,?,?,?,?,?,?,?,?,?)";
     $stmt = $dbConn->prepare($sql3);
     $stmt->bindValue(1, $doc_id);
     $stmt->bindValue(2, $file_name);
     $stmt->bindValue(3, $user_info);
     $stmt->bindValue(4, $date);
     $stmt->bindValue(5, $time);
     $stmt->bindValue(6, $signatories);
     $stmt->bindValue(7, $pending_signatories);
     $stmt->bindValue(8, $approved_signatories);
     $stmt->bindValue(9, "has deleted an Efile");
     $stmt->bindValue(10, $email.".jpg");
     $stmt->bindValue(11, $email);
     $stmt->execute();

      if ($stmt) {
        $sql4 = "INSERT INTO tbl_efile_trgr(doc_id,name,pending_signatories,approved_signatories,disapproved,comment,status,action,date_time) VALUES(?,?,?,?,?,?,?,?,?)";
        $stmt = $dbConn->prepare($sql4);
        $stmt->bindValue(1, $doc_id);
        $stmt->bindValue(2, $file_name);
        $stmt->bindValue(3, $pending_signatories);
        $stmt->bindValue(4, $approved_signatories);
        $stmt->bindValue(5, $disapproved );
        $stmt->bindValue(6, $comment);
        $stmt->bindValue(7, "pending");
        $stmt->bindValue(8, "DELETE");
        $stmt->bindValue(9, $delete_on);
        $stmt->execute();
        
        echo "success";
      }//end of if
      else {
        echo "error";
      }//end of else

     
   }//end of if

   else {
     echo "error";
   }//end of else


 ?>
