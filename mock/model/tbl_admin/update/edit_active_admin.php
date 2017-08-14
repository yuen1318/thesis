<?php
  session_start();
  require '../../dbConfig.php';
  require '../../a_functions/sanitize.php';

  $id = $_POST['edit_id'];
  $department = $_POST['department'];
  $title = $_POST['title'];

  $sql = "UPDATE tbl_admin SET department=?, title=? WHERE id=?";

  $stmt = $dbConn->prepare($sql);
  $stmt->bindValue(1, $department);
  $stmt->bindValue(2, $title);
  $stmt->bindValue(3, $id);
  $stmt->execute();

  if ($stmt) {
    echo "success";
  }

  else {
    echo "error";
  }

 ?>
