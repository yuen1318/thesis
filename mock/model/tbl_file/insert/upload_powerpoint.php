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
  $file_format = "powerpoint";
  $signatories = $_POST['signatories'];
  $created_by = $_SESSION['user_email'];
  $created_on = date("Y, F j g:i a");

  $proxy_signatories = $_POST['proxy_signatories'];

  $uploaded_powerpoint = $_FILES['powerpoint'];
  $uploaded_powerpoint_name = $uploaded_powerpoint['name'];
  $uploaded_powerpoint_tmp = $uploaded_powerpoint['tmp_name'];
  $uploaded_powerpoint_size = $uploaded_powerpoint['size'];
  $uploaded_powerpoint_error = $uploaded_powerpoint['error'];

  $file_ext = explode("." , $uploaded_powerpoint_name);
  $file_ext = strtolower(end($file_ext) );
  $file_path = '../../../DB/powerpoint/';

  $file_id = uniqid('powerpoint_', true);
  $file_id = str_replace(".", "", $file_id);
  $file_id = $file_id. "." . $file_ext;

  $full_file = $file_path . $file_id;


  if ($uploaded_powerpoint_size <= 2000000 && $uploaded_powerpoint_error === 0)  {
    $sql = "INSERT INTO tbl_file(file_id,orig_name,file_type,file_format,signatories,pending_signatories,created_by,created_on,status,proxy_signatories,proxy_pending,proxy_created) VALUES(?,?,?,?,?,?,?,?,?,?,?,?)";
    $stmt = $dbConn->prepare($sql);
    $stmt->bindValue(1, $file_id);
    $stmt->bindValue(2, $uploaded_powerpoint_name);
    $stmt->bindValue(3, $file_type);
    $stmt->bindValue(4, $file_format);
    $stmt->bindValue(5, $signatories);
    $stmt->bindValue(6, $signatories);
    $stmt->bindValue(7, $created_by);
    $stmt->bindValue(8, $created_on);
    $stmt->bindValue(9, "pending");
    $stmt->bindValue(10, $proxy_signatories);
    $stmt->bindValue(11, $proxy_signatories);
    $stmt->bindValue(12, $_SESSION["user_fn"]. " " .$_SESSION["user_ln"]);
    $stmt->execute();

    move_uploaded_file($uploaded_powerpoint_tmp , $full_file);

    if ($stmt) {
       
      $sql2 = "INSERT INTO tbl_news(doc_id,name,email,date,time,signatories,pending_signatories,approved_signatories,msg,photo,created_by,proxy_signatories,proxy_pending,proxy_approved) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
      $stmt = $dbConn->prepare($sql2);
      $stmt->bindValue(1, $file_id);
      $stmt->bindValue(2, $uploaded_powerpoint_name);
      $stmt->bindValue(3, $user_info);
      $stmt->bindValue(4, $date);
      $stmt->bindValue(5, $time);
      $stmt->bindValue(6, $signatories);
      $stmt->bindValue(7, $signatories);
      $stmt->bindValue(8, "");
      $stmt->bindValue(9, "<strong>Has uploaded a Presentation</strong>");
      $stmt->bindValue(10, $email.".jpg");
      $stmt->bindValue(11, $email);
      $stmt->bindValue(12, $proxy_signatories);
      $stmt->bindValue(13, $proxy_signatories);
      $stmt->bindValue(14, "");
      $stmt->execute();

          if ($stmt) {
            $sql3 = "INSERT INTO tbl_file_trgr(file_id,orig_name,pending_signatories,approved_signatories,disapproved,comment,status,action,date_time) VALUES(?,?,?,?,?,?,?,?,?)";
            $stmt = $dbConn->prepare($sql3);
            $stmt->bindValue(1, $file_id);
            $stmt->bindValue(2, $uploaded_powerpoint_name);
            $stmt->bindValue(3, $proxy_signatories);
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
  }//end of if

  else {
    echo "error";
  }
 ?>
