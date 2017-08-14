<?php
  session_start();
  require '../../dbConfig.php';
  require '../../a_functions/sanitize.php';

  $email = $_SESSION["user_email"];
  $fn = ucwords(sanitize($_POST['fn']));
  $mn = ucwords(sanitize($_POST['mn']));
  $ln = ucwords(sanitize($_POST['ln']));
  $mobile = sanitize($_POST['mobile']);



  $sql = "UPDATE tbl_user SET fn=?,mn=?,ln=?,mobile=? WHERE email=?";

  $stmt = $dbConn->prepare($sql);
  $stmt->bindValue(1, $fn);
  $stmt->bindValue(2, $mn);
  $stmt->bindValue(3, $ln);
  $stmt->bindValue(4, $mobile);
  $stmt->bindValue(5, $email);
  $stmt->execute();

  if ($stmt) {
    $_SESSION["user_fn"] = $fn;
    $_SESSION["user_mn"] = $mn;
    $_SESSION["user_ln"] = $ln;
    $_SESSION["user_mobile"] = $mobile;
    echo "success";
  }

  else {
    echo "error";
  }

 ?>
