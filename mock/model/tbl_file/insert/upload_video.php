<?php
  session_start();
  date_default_timezone_set('Asia/Manila');
  require '../../dbConfig.php';
  require '../../a_functions/sanitize.php';

  $user_info ="<b>".$_SESSION['user_department'].":</b></br></br>".$_SESSION['user_fn']." ".$_SESSION['user_mn']." ".$_SESSION['user_ln']. "</br>". $_SESSION['user_email']. "</br><i>". $_SESSION['user_title']."</i>";
  
  $email = $_SESSION['user_email'];
  $date = date("Y, F j");
  $time = date("g:i a");


  $file_type = $_POST['doc_type'];
  $video_url = sanitize($_POST['video']);
  $file_id = uniqid('video_', true);
  $file_format = "video";
  $signatories = $_POST['signatories'];
  $created_by = $_SESSION['user_email'];
  $created_on = date("Y, F j g:i a");
  $proxy = $_POST['proxy'];

    $sql = "INSERT INTO tbl_file(file_id,orig_name,proxy,file_type,file_format,signatories,pending_signatories,created_by,created_on,status) VALUES(?,?,?,?,?,?,?,?,?,?)";
    $stmt = $dbConn->prepare($sql);
    $stmt->bindValue(1, $file_id);
    $stmt->bindValue(2, $video_url);
    $stmt->bindValue(3, $proxy);
    $stmt->bindValue(4, $file_type);
    $stmt->bindValue(5, $file_format);
    $stmt->bindValue(6, $signatories);
    $stmt->bindValue(7, $signatories);
    $stmt->bindValue(8, $created_by);
    $stmt->bindValue(9, $created_on);
    $stmt->bindValue(10, "pending");
    $stmt->execute();



    if ($stmt) {
      $sql2 = "INSERT INTO tbl_news(doc_id,name,email,date,time,signatories,pending_signatories,approved_signatories,msg,photo,created_by) VALUES(?,?,?,?,?,?,?,?,?,?,?)";
      $stmt = $dbConn->prepare($sql2);
      $stmt->bindValue(1, $file_id);
      $stmt->bindValue(2, $proxy);
      $stmt->bindValue(3, $user_info);
      $stmt->bindValue(4, $date);
      $stmt->bindValue(5, $time);
      $stmt->bindValue(6, $signatories);
      $stmt->bindValue(7, $signatories);
      $stmt->bindValue(8, "");
      $stmt->bindValue(9, "has uploaded a video");
      $stmt->bindValue(10, $email.".jpg");
      $stmt->bindValue(11, $email);
      $stmt->execute();
       
        if ($stmt) {
          $sql3 = "INSERT INTO tbl_file_trgr(file_id,orig_name,pending_signatories,approved_signatories,disapproved,comment,status,action,date_time) VALUES(?,?,?,?,?,?,?,?,?)";
          $stmt = $dbConn->prepare($sql3);
          $stmt->bindValue(1, $file_id);
          $stmt->bindValue(2, $proxy);
          $stmt->bindValue(3, $signatories);
          $stmt->bindValue(4, "");
          $stmt->bindValue(5, "");
          $stmt->bindValue(6, "");
          $stmt->bindValue(7, "pending");
          $stmt->bindValue(8, "INSERT");
          $stmt->bindValue(9, $created_on);
          $stmt->execute();
          
          echo "success";
        }//end of if
        else {
          echo "error";
        }//end of else

    }//end of if


  else {
    echo "error";
  }
 ?>
