<?php
  session_start();
  require '../../dbConfig.php';
  require '../../a_functions/sanitize.php';

  $email = $_SESSION["admin_email"];
  $fn = ucwords(sanitize($_POST['fn']));
  $mn = ucwords(sanitize($_POST['mn']));
  $ln = ucwords(sanitize($_POST['ln']));
  $mobile = sanitize($_POST['mobile']);




  $sql = "UPDATE tbl_admin SET fn=?,mn=?,ln=?,mobile=? WHERE email=?";

  $stmt = $dbConn->prepare($sql);
  $stmt->bindValue(1, $fn);
  $stmt->bindValue(2, $mn);
  $stmt->bindValue(3, $ln);
  $stmt->bindValue(4, $mobile);
  $stmt->bindValue(5, $email);
  $stmt->execute();

  if ($stmt) {
    $_SESSION["admin_fn"] = $fn;
    $_SESSION["admin_mn"] = $mn;
    $_SESSION["admin_ln"] = $ln;
    $_SESSION["admin_mobile"] = $mobile;
    echo "success";
  }

  else {
    echo "error";
  }

 ?>
