<?php
  session_start();
  date_default_timezone_set('Asia/Manila');
  require '../../dbConfig.php';
  require '../../a_functions/sanitize.php';

  //for tbl_news
  $date = date("Y, F j");
  $time = date("g:i a");
  $email = $_SESSION["user_email"];
  $user_info ="<b>".$_SESSION['user_department'].":</b></br></br>".$_SESSION['user_fn']." ".$_SESSION['user_mn']." ".$_SESSION['user_ln']. "</br>". $email. "</br><i>". $_SESSION['user_title']."</i>";
  ////


  $doc_id = uniqid("efile_" , TRUE);
  $name = sanitize($_POST['name']);
  $doc_type =  $_POST['doc_type'];
  $content = $_POST['content'];
  $signatories = $_POST['signatories'];
  $proxy_signatories = $_POST['proxy_signatories'];
  $created_by = $_SESSION['user_email'];
  $created_on = date("Y, F j, g:i a");



if (isset($_POST['content'])) {
  $sql = "INSERT INTO tbl_efile(doc_id,doc_type,name,content,signatories, pending_signatories,created_by,created_on,status,proxy_signatories,proxy_pending,proxy_created) VALUES(?,?,?,?,?,?,?,?,?,?,?,?)";
  $stmt = $dbConn->prepare($sql);
  $stmt->bindValue(1, $doc_id);
  $stmt->bindValue(2, $doc_type);
  $stmt->bindValue(3, $name);
  $stmt->bindValue(4, $content);
  $stmt->bindValue(5, $signatories);
  $stmt->bindValue(6, $signatories);
  $stmt->bindValue(7, $created_by);
  $stmt->bindValue(8, $created_on);
  $stmt->bindValue(9, "pending");
  $stmt->bindValue(10, $proxy_signatories);
  $stmt->bindValue(11, $proxy_signatories);
  $stmt->bindValue(12, $_SESSION["user_fn"]. " " .$_SESSION["user_ln"]);
  $stmt->execute();
 
  if ($stmt) {
    $sql2 = "INSERT INTO tbl_news(doc_id,name,email,date,time,signatories,pending_signatories,approved_signatories,msg,photo,created_by,proxy_signatories,proxy_pending,proxy_approved) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
    $stmt = $dbConn->prepare($sql2);
    $stmt->bindValue(1, $doc_id);
    $stmt->bindValue(2, $name);
    $stmt->bindValue(3, $user_info);
    $stmt->bindValue(4, $date);
    $stmt->bindValue(5, $time);
    $stmt->bindValue(6, $signatories);
    $stmt->bindValue(7, $signatories);
    $stmt->bindValue(8, "");
    $stmt->bindValue(9, "<strong>Has created a Efile</strong>");
    $stmt->bindValue(10, $email.".jpg");
    $stmt->bindValue(11, $email);

    $stmt->bindValue(12, $proxy_signatories);
    $stmt->bindValue(13, $proxy_signatories);
    $stmt->bindValue(14, "");
    $stmt->execute();
    
 
      if ($stmt) {
        $sql3 = "INSERT INTO tbl_efile_trgr(doc_id,name,pending_signatories,approved_signatories,disapproved,comment,status,action,date_time) VALUES(?,?,?,?,?,?,?,?,?)";
        $stmt = $dbConn->prepare($sql3);
        $stmt->bindValue(1, $doc_id);
        $stmt->bindValue(2, $name);
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

  else {
    echo "error";
  }//end of else

}//end of if





 ?>
