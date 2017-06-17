<?php
  session_start();
  require '../../dbConfig.php';
  require '../../a_functions/sanitize.php';

  if (isset($_SESSION['user_email']) ) {
    $department = "private";
  }
  elseif (isset($_SESSION['admin_email'])) {
    $department = $_POST['department'];
  }

  
  $tmp_id = $_POST['tmp_id'];
  $name = sanitize($_POST['name']);
  $content = $_POST['content'];


  $sql = "UPDATE tbl_template SET name=?, content=?, department=? WHERE tmp_id=?";

  $stmt = $dbConn->prepare($sql);
  $stmt->bindValue(1, $name);
  $stmt->bindValue(2, $content);
  $stmt->bindValue(3, $department);
  $stmt->bindValue(4, $tmp_id);
  $stmt->execute();

  if ($stmt) {
    echo "success";
  }

  else {
    echo "error";
  }

 ?>
