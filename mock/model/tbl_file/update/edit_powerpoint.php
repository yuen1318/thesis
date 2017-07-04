<?php


  session_start();
  require '../../dbConfig.php';
  require '../../a_functions/sanitize.php';



  $uploaded_powerpoint = $_FILES['powerpoint'];
  $uploaded_powerpoint_name = $uploaded_powerpoint['name'];
  $uploaded_powerpoint_tmp = $uploaded_powerpoint['tmp_name'];
  $uploaded_powerpoint_size = $uploaded_powerpoint['size'];
  $uploaded_powerpoint_error = $uploaded_powerpoint['error'];


  $disapproved = "";
  $comment = "";

  $file_id = $_POST['edit_id'];
  $file_path = '../../../DB/powerpoint/';
  $full_file = $file_path . $file_id;

  $sql = "SELECT * FROM tbl_file WHERE file_id=?";
  $stmt = $dbConn->prepare($sql);
  $stmt->bindValue(1, $file_id);
  $stmt->execute();

  if ($stmt) {
    #step 2 save the values in variable
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $signatories = $row['signatories'];
    $file_name = $row['orig_name'];
    $created_by = $row['created_by'];
    $pending_signatories = $row['pending_signatories'];
    $approved_signatories = $row['approved_signatories'];
      }//end of if


  if ($uploaded_powerpoint_size <= 2000000 && $uploaded_powerpoint_error === 0)  {
    $sql2 = "UPDATE tbl_file SET disapproved=?, comment=? WHERE file_id=?";
    $stmt = $dbConn->prepare($sql2);
    $stmt->bindValue(1, $disapproved);
    $stmt->bindValue(2, $comment);
    $stmt->bindValue(3, $file_id);
    $stmt->execute();

    move_uploaded_file($uploaded_powerpoint_tmp , $full_file);

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
        $stmt->bindValue(9, "has edit a presentation");
        $stmt->bindValue(10, $email.".jpg");
        $stmt->bindValue(11, $created_by);
        $stmt->execute();
        echo "success";
      }//end of if

  }

  else {
    echo "error";
  }



 ?>