<?php
  session_start();
  require '../../dbConfig.php';
  require '../../a_functions/sanitize.php';




  $name = sanitize($_POST['name']);
  $url = $_POST['url'];
  $access = $_POST['access'];




  $sql = "INSERT INTO tbl_instruction(name,url,access) VALUES(?,?,?)";
  $stmt = $dbConn->prepare($sql);
  $stmt->bindValue(1, $name);
  $stmt->bindValue(2, $url);
  $stmt->bindValue(3, $access);
  $stmt->execute();

  if ($stmt) {
    echo "success";
  }
  else {
    echo "error";
  }







 ?>
