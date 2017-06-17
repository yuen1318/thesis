<?php
  session_start();
  require '../../dbConfig.php';
  require '../../a_functions/sanitize.php';

  if (isset($_SESSION['user_email']) ) {
    $owner = $_SESSION['user_email'];
  }
  else if ( isset($_SESSION['admin_email']) ) {
    $owner = $_SESSION['admin_email'];
  }
  else {
    $owner = $_SESSION['sudo_email'];
  }


  $tmp_id = uniqid("tmplt_" , TRUE);
  $name = sanitize($_POST['name']);
  $content = $_POST['content'];
  $department = $_POST['department'];



if (isset($_POST['content'])) {
  $sql = "INSERT INTO tbl_template(tmp_id,name,content,owner,department) VALUES(?,?,?,?,?)";
  $stmt = $dbConn->prepare($sql);
  $stmt->bindValue(1, $tmp_id);
  $stmt->bindValue(2, $name);
  $stmt->bindValue(3, $content);
  $stmt->bindValue(4, $owner);
  $stmt->bindValue(5, $department);
  $stmt->execute();

  if ($stmt) {
    echo "success";
  }
  else {
    echo "error";
  }
}





 ?>
