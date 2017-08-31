<?php


  session_start();
  require '../../dbConfig.php';
  require '../../a_functions/sanitize.php';

  $update_on = date("Y, F j, g:i a");

  $user_info = $_SESSION['user_fn']." ".$_SESSION['user_mn']." ".$_SESSION['user_ln'];
  
  $uploaded_excel = $_FILES['excel'];
  $uploaded_excel_name = $uploaded_excel['name'];
  $uploaded_excel_tmp = $uploaded_excel['tmp_name'];
  $uploaded_excel_size = $uploaded_excel['size'];
  $uploaded_excel_error = $uploaded_excel['error'];


  $disapproved = "";
  $comment = "";

  $file_id = $_POST['edit_id'];
  $file_path = '../../../DB/excel/';
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


  if ($uploaded_excel_size <= 2000000 && $uploaded_excel_error === 0)  {
    $sql2 = "UPDATE tbl_file SET disapproved=?, comment=? WHERE file_id=?";
    $stmt = $dbConn->prepare($sql2);
    $stmt->bindValue(1, $disapproved);
    $stmt->bindValue(2, $comment);
    $stmt->bindValue(3, $file_id);
    $stmt->execute();

    move_uploaded_file($uploaded_excel_tmp , $full_file);

      if ($stmt) {
        $email= $_SESSION['user_email'];
        $date = date("Y, F j");
        $time = date("g:i a");

        $sql3 = "INSERT INTO tbl_news(doc_id,name,email,date,time,signatories,pending_signatories,approved_signatories,msg,photo,created_by) VALUES(?,?,?,?,?,?,?,?,?,?,?)";
        $stmt = $dbConn->prepare($sql3);
        $stmt->bindValue(1, $file_id);
        $stmt->bindValue(2, $file_name);
        $stmt->bindValue(3, $user_info."</br> (".$email.")");
        $stmt->bindValue(4, $date);
        $stmt->bindValue(5, $time);
        $stmt->bindValue(6, $signatories);
        $stmt->bindValue(7, $pending_signatories);
        $stmt->bindValue(8, $approved_signatories );
        $stmt->bindValue(9, "has edit a spreadsheet");
        $stmt->bindValue(10, $email.".jpg");
        $stmt->bindValue(11, $created_by);
        $stmt->execute();
         

            if ($stmt) {
              $sql4 = "INSERT INTO tbl_file_trgr(file_id,orig_name,pending_signatories,approved_signatories,disapproved,comment,status,action,date_time) VALUES(?,?,?,?,?,?,?,?,?)";
              $stmt = $dbConn->prepare($sql4);
              $stmt->bindValue(1, $file_id);
              $stmt->bindValue(2, $file_name);
              $stmt->bindValue(3, $pending_signatories);
              $stmt->bindValue(4, $approved_signatories);
              $stmt->bindValue(5, "");
              $stmt->bindValue(6, "");
              $stmt->bindValue(7, "pending");
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
  }



 ?>
