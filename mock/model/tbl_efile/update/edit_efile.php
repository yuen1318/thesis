<?php
session_start();
require '../../dbConfig.php';

$update_on = date("Y, F j, g:i a");

$doc_id = $_POST['doc_id'];
$content = $_POST['content'];
$comment = "";
$disapproved = "";
 


 $sql = "UPDATE tbl_efile SET disapproved=?, comment=?, content=? WHERE doc_id=?";
 $stmt = $dbConn->prepare($sql);
 $stmt->bindValue(1, $disapproved);
 $stmt->bindValue(2, $comment);
 $stmt->bindValue(3, $content);
 $stmt->bindValue(4, $doc_id);
 $stmt->execute();
 
 $sql2 = "SELECT * FROM tbl_efile WHERE doc_id=?";
 $stmt = $dbConn->prepare($sql2);
 $stmt->bindValue(1, $doc_id);
 $stmt->execute();

 if ($stmt) {
   #step 2 save the values in variable
   $row = $stmt->fetch(PDO::FETCH_ASSOC);
   $efile_name = $row['name'];
   $pending_signatories = $row['pending_signatories'];
   $approved_signatories = $row['approved_signatories'];

        
    if ($stmt) {
      $sql3 = "INSERT INTO tbl_efile_trgr(doc_id,name,pending_signatories,approved_signatories,disapproved,comment,status,action,date_time) VALUES(?,?,?,?,?,?,?,?,?)";
      $stmt = $dbConn->prepare($sql3);
      $stmt->bindValue(1, $doc_id);
      $stmt->bindValue(2, $efile_name);
      $stmt->bindValue(3, $pending_signatories);
      $stmt->bindValue(4, $approved_signatories);
      $stmt->bindValue(5, $disapproved);
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

 }//end of if

 else{
   echo "error";
 }//end of else

 ?>
