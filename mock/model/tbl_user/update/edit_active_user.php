<?php
  session_start();
  require '../../dbConfig.php';
  require '../../a_functions/sanitize.php';

  $id = $_POST['edit_id'];
  $department = $_POST['department'];

  $sql = "UPDATE tbl_user SET department=? WHERE id=?";

  $stmt = $dbConn->prepare($sql);
  $stmt->bindValue(1, $department);
  $stmt->bindValue(2, $id);
  $stmt->execute();

  if ($stmt) {
    echo "success";
  }

  else {
    echo "error";
  }

 ?>
