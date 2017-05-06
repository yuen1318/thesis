<?php
session_start();
require '../../dbConfig.php';
require '../../a_functions/sanitize.php';

$doc_id = $_POST['reject_id'];
$email = $_SESSION['user_email'] ;
$comment = $_POST['comment'];


 $sql = "UPDATE tbl_efile SET disapproved=?, comment=? WHERE doc_id=?";
 $stmt = $dbConn->prepare($sql);
 $stmt->bindValue(1, $email);
 $stmt->bindValue(2, $comment);
 $stmt->bindValue(3, $doc_id);
 $stmt->execute();

  if ($stmt) {
    echo "success";
  }

  else {
    echo "error";
  }


 ?>
