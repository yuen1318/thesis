<?php
  session_start();
  require '../../dbConfig.php';
  require '../../a_functions/sanitize.php';

  $id = $_POST['approve_id'];
  $access = "user";
  $status = "active";

  $sql = "UPDATE tbl_user SET access=?, status=? WHERE id=?";

  $stmt = $dbConn->prepare($sql);
  $stmt->bindValue(1, $access);
  $stmt->bindValue(2, $status);
  $stmt->bindValue(3, $id);
  $stmt->execute();

  if ($stmt) {
    echo "success";
  }

  else {
    echo "error";
  }

 ?>
