<?php
date_default_timezone_set('Asia/Manila');
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
    $sql2 = "SELECT * FROM tbl_user WHERE id=?";
    $stmt = $dbConn->prepare($sql2);
    $stmt->bindValue(1, $id);
    $stmt->execute();
    
    if($stmt){#if email exist extract info and store it in variable
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $email = $row['email'];
    }

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
    $mail->AddAddress($email);

    if ($mail->Send()) {
          if ($stmt) {
              $admin_email = $_SESSION["admin_email"];
              $date = date("Y, F j");
              $time = date("g:i a");
              $msg = "has granted ". $email ." an access as user";

              $admin_info ="<b>".$_SESSION['admin_department'].":</b></br></br>".$_SESSION['admin_fn']." ".$_SESSION['admin_mn']." ".$_SESSION['admin_ln']. "</br>". $_SESSION["admin_email"]. "</br><i>". $_SESSION['admin_title']."</i>";
              
              $sql3 = "INSERT INTO tbl_admin_news(email,photo,msg,date,time) VALUES(?,?,?,?,?)";
              $stmt = $dbConn->prepare($sql3);
              $stmt->bindValue(1, $admin_info);
              $stmt->bindValue(2, $admin_email);
              $stmt->bindValue(3, $msg);
              $stmt->bindValue(4, $date);
              $stmt->bindValue(5, $time);
              $stmt->execute();

              if($stmt){
                echo "success";
              }
              else{
                echo "error";
              }
            
          }//end of if
 
    }//end of if

    else{
        echo "failed";
    }
 
  }//end of if

  else {
    echo "error";
  }

 ?>
