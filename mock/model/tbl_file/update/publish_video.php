<?php
session_start();
require '../../dbConfig.php';
require '../../a_functions/sanitize.php';
date_default_timezone_set('Asia/Manila');
$update_on = date("Y, F j, g:i a");


$user_info ="<b>".$_SESSION['user_department'].":</b></br></br>".$_SESSION['user_fn']." ".$_SESSION['user_mn']." ".$_SESSION['user_ln']. "</br>". $_SESSION['user_email']. "</br><i>". $_SESSION['user_title']."</i>";

$file_id = $_POST['publish_id'];
$email = $_SESSION['user_email'] ;
$published_on = date("Y, F j g:i a");
$status = "published";



 $sql = "SELECT * FROM tbl_file WHERE file_id=?";
 $stmt = $dbConn->prepare($sql);
 $stmt->bindValue(1, $file_id);
 $stmt->execute();
 
     if ($stmt) {
       #step 2 save the values in variable
       $row = $stmt->fetch(PDO::FETCH_ASSOC);
       $signatories = $row['signatories'];
       $file_name = $row['proxy'];
       $created_by = $row['created_by'];
       $pending_signatories = $row['pending_signatories'];
       $approved_signatories = $row['approved_signatories'];
       $proxy_signatories =  $row['proxy_signatories'];
     }//end of if

    if ($stmt) {
      $sql2 = "UPDATE tbl_file SET published_on=?, status=? WHERE file_id=?";
      $stmt =  $dbConn->prepare($sql2);
      $stmt->bindValue(1, $published_on);
      $stmt->bindValue(2, $status);
      $stmt->bindValue(3, $file_id);
      $stmt->execute();

      if ($stmt) {
        $date = date("Y, F j");
        $time = date("g:i a");

        $sql3 = "INSERT INTO tbl_news(doc_id,name,email,date,time,signatories,pending_signatories,approved_signatories,msg,photo,created_by,proxy_pending,proxy_approved,proxy_signatories) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $stmt = $dbConn->prepare($sql3);
        $stmt->bindValue(1, $file_id);
        $stmt->bindValue(2, $file_name);
        $stmt->bindValue(3, $user_info);
        $stmt->bindValue(4, $date);
        $stmt->bindValue(5, $time);
        $stmt->bindValue(6, $signatories);
        $stmt->bindValue(7, $pending_signatories);
        $stmt->bindValue(8, $approved_signatories );
        $stmt->bindValue(9, "<strong>Has published a Video</strong>");
        $stmt->bindValue(10, $email.".jpg");
        $stmt->bindValue(11, $created_by);

        $stmt->bindValue(12, "");
        $stmt->bindValue(13, $proxy_signatories);
        $stmt->bindValue(14, $proxy_signatories);
        $stmt->execute();
         

          if ($stmt) {
            $sql4 = "INSERT INTO tbl_file_trgr(file_id,orig_name,pending_signatories,approved_signatories,disapproved,comment,status,action,date_time) VALUES(?,?,?,?,?,?,?,?,?)";
            $stmt = $dbConn->prepare($sql4);
            $stmt->bindValue(1, $file_id);
            $stmt->bindValue(2, $file_name);
            $stmt->bindValue(3, "" );
            $stmt->bindValue(4, $proxy_signatories);
            $stmt->bindValue(5, "");
            $stmt->bindValue(6, "");
            $stmt->bindValue(7, "published");
            $stmt->bindValue(8, "UPDATE");
            $stmt->bindValue(9, $update_on);
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
    }//end of else


 ?>
