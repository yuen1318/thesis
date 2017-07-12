<?php
  session_start();
  require '../../dbConfig.php';
  require '../../a_functions/sanitize.php';

  $id = $_POST['approve_id'];
  $status = "active";

  $sql = "UPDATE tbl_user SET status=? WHERE id=?";

  $stmt = $dbConn->prepare($sql);
  $stmt->bindValue(1, $status);
  $stmt->bindValue(2, $id);
  $stmt->execute();

  if ($stmt) {
    echo "success";
  }

  else {
    echo "error";
  }

 ?>
