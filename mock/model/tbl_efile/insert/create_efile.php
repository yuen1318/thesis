<?php
  session_start();
  require '../../dbConfig.php';
  require '../../a_functions/sanitize.php';


  $doc_id = uniqid("efile_" , TRUE);
  $name = sanitize($_POST['name']);
  $content = $_POST['content'];
  $signatories = $_POST['signatories'];
  $created_by = $_SESSION['user_email'];
  $created_on = date("Y, F j, g:i a");


if (isset($_POST['content'])) {
  $sql = "INSERT INTO tbl_efile(doc_id,content,signatories, pending_signatories,created_by,created_on,status) VALUES(?,?,?,?,?,?,?)";
  $stmt = $dbConn->prepare($sql);
  $stmt->bindValue(1, $doc_id);
  $stmt->bindValue(2, $content);
  $stmt->bindValue(3, $signatories);
  $stmt->bindValue(4, $signatories);
  $stmt->bindValue(5, $created_by);
  $stmt->bindValue(6, $created_on);
  $stmt->bindValue(7, "pending");
  $stmt->execute();

  if ($stmt) {
    echo "success";
  }
  else {
    echo "error";
  }
}





 ?>