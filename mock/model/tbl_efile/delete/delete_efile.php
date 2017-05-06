<?php
session_start();
require '../../dbConfig.php';

$doc_id = $_POST['delete_id'];
 
 $sql = "DELETE FROM tbl_efile WHERE doc_id=?";
 $stmt = $dbConn->prepare($sql);
 $stmt->bindValue(1, $doc_id);
 $stmt->execute();

  if ($stmt) {
    echo "success";
  }

  else {
    echo "error";
  }


 ?>
