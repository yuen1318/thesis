<?php


  session_start();
  require '../../dbConfig.php';
  require '../../a_functions/sanitize.php';



  $uploaded_video = $_POST['video'];



  $disapproved = "";
  $comment = "";

  $file_id = $_POST['edit_id'];

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
      }//end of if



    $sql2 = "UPDATE tbl_file SET disapproved=?, comment=?, orig_name=? WHERE file_id=?";
    $stmt = $dbConn->prepare($sql2);
    $stmt->bindValue(1, $disapproved);
    $stmt->bindValue(2, $comment);
    $stmt->bindValue(3, $uploaded_video);
    $stmt->bindValue(4, $file_id);
    $stmt->execute();


      if ($stmt) {
        $email= $_SESSION['user_email'];
        $date = date("Y, F j");
        $time = date("g:i a");

        $sql3 = "INSERT INTO tbl_news(doc_id,name,email,date,time,signatories,pending_signatories,approved_signatories,msg,photo,created_by) VALUES(?,?,?,?,?,?,?,?,?,?,?)";
        $stmt = $dbConn->prepare($sql3);
        $stmt->bindValue(1, $file_id);
        $stmt->bindValue(2, $file_name);
        $stmt->bindValue(3, $email);
        $stmt->bindValue(4, $date);
        $stmt->bindValue(5, $time);
        $stmt->bindValue(6, $signatories);
        $stmt->bindValue(7, $pending_signatories);
        $stmt->bindValue(8, $approved_signatories );
        $stmt->bindValue(9, "has edit a video");
        $stmt->bindValue(10, $email.".jpg");
        $stmt->bindValue(11, $created_by);
        $stmt->execute();
        echo "success";
      }//end of if



  else {
    echo "error";
  }



 ?>
