<?php
  session_start();
  require '../../dbConfig.php';
  require '../../a_functions/sanitize.php';


  $tmp_id = uniqid("tmplt_" , TRUE);
  $name = sanitize($_POST['name']);
  $content = $_POST['content'];
  $owner = $_SESSION['user_email'];


if (isset($_POST['content'])) {
  $sql = "INSERT INTO tbl_template(tmp_id,name,content,owner) VALUES(?,?,?,?)";
  $stmt = $dbConn->prepare($sql);
  $stmt->bindValue(1, $tmp_id);
  $stmt->bindValue(2, $name);
  $stmt->bindValue(3, $content);
  $stmt->bindValue(4, $owner);
  $stmt->execute();

  if ($stmt) {
    echo "success";
  }
  else {
    echo "error";
  }
}





 ?>
