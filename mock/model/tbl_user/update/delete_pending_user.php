<?php
  session_start();
  require '../../dbConfig.php';
  require '../../a_functions/sanitize.php';

  $id = $_POST['delete_id'];
  $status = "deleted";

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
        $msg = "has temporary removed ". $email ." an access as user";

        $sql3 = "INSERT INTO tbl_admin_news(email,msg,date,time) VALUES(?,?,?,?)";
        $stmt = $dbConn->prepare($sql3);
        $stmt->bindValue(1, $admin_email);
        $stmt->bindValue(2, $msg);
        $stmt->bindValue(3, $date);
        $stmt->bindValue(4, $time);
        $stmt->execute();

        if($stmt){
          echo "success";
        }
        else{
          echo "error";
        }
      
    }//end of if

    else {
      echo "error";
    }

  }//end of if



 ?>
