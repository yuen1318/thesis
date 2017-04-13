<?php
  session_start();
  require '../../dbConfig.php';
  require '../../a_functions/sanitize.php';

  $tmp_id = $_POST['tmp_id'];
  $name = sanitize($_POST['name']);
  $content = $_POST['content'];


  $sql = "UPDATE tbl_template SET name=?, content=? WHERE tmp_id=?";

  $stmt = $dbConn->prepare($sql);
  $stmt->bindValue(1, $name);
  $stmt->bindValue(2, $content);
  $stmt->bindValue(3, $tmp_id);
  $stmt->execute();

  if ($stmt) {
    echo "success";
  }

  else {
    echo "error";
  }

 ?>
