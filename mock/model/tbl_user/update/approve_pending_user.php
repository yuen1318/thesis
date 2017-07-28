<?php
  session_start();
  require '../../dbConfig.php';
  require '../../a_functions/sanitize.php';

  $id = $_POST['approve_id'];
  $status = "active";

  $sql = "UPDATE tbl_user SET status=? WHERE id=?";

  $stmt = $dbConn->prepare($sql);
  $stmt->bindValue(1, $status);
  $stmt->bindValue(2, $id);
  $stmt->execute();

  if ($stmt) {
    require "mail/PHPMailerAutoload.php";
    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->SMTPDebug = 0;
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = "ssl";
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 465;
    $mail->isHTML(true);
    $mail->Username = "yuen.yalung.project@gmail.com";
    $mail->Password = "adgjmptw1234";
    $mail->SetFrom("apalit_system@gmail.com");
    $mail->Subject = "Account for Apalit System";
    $mail->Body = "your account has been activated";
    $mail->AddAddress("yuen.yalung@gmail.com");

    if ($mail->Send()) {
        echo "success";
    }

    else{
        echo "failed";
    }
 
  }//end of if

  else {
    echo "error";
  }

 ?>
