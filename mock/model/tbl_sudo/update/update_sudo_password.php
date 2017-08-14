<?php
  session_start();
  require '../../dbConfig.php';
  require '../../a_functions/sanitize.php';

  $email = $_SESSION["sudo_email"];
  $password = sanitize($_POST["rpassword"]);
  $pass_encrypt = password_hash($password, PASSWORD_DEFAULT);


  $sql = "UPDATE tbl_sudo SET pw=? WHERE email=?";

  $stmt = $dbConn->prepare($sql);
  $stmt->bindValue(1, $pass_encrypt);
  $stmt->bindValue(2, $email);
  $stmt->execute();

  if ($stmt) {
    $_SESSION["sudo_password"] = $pass_encrypt;
    echo "success";
  }

  else {
    echo "error";
  }

 ?>
