<?php
  session_start();
  date_default_timezone_set('Asia/Manila');
  require '../../dbConfig.php';
  require '../../a_functions/sanitize.php';

  $id = $_POST['restore_id'];
  $status = "pending";

  $sql = "SELECT * FROM tbl_user WHERE id=?";
  $stmt = $dbConn->prepare($sql);
  $stmt->bindValue(1, $id);
  $stmt->execute();
    
  if($stmt){#if email exist extract info and store it in variable
  $row = $stmt->fetch(PDO::FETCH_ASSOC);
  $email = $row['email'];

    $sql2 = "UPDATE tbl_user SET status=? WHERE id=?";
    $stmt = $dbConn->prepare($sql2);
    $stmt->bindValue(1, $status);
    $stmt->bindValue(2, $id);
    $stmt->execute();

    if ($stmt) {
          $admin_email = $_SESSION["admin_email"];
          $date = date("Y, F j");
          $time = date("g:i a");
          $msg = "has restored ". $email ." its access as user";

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
          else {
            echo "error";
          }
    }//end of if

   


  }//end of if




 ?>
