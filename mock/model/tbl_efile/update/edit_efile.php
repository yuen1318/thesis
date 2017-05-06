<?php
session_start();
require '../../dbConfig.php';


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

  if ($stmt) {
    echo "success";
  }

  else {
    echo "error";
  }


 ?>
