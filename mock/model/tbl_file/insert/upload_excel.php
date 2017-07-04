<?php
  session_start();
  require '../../dbConfig.php';
  require '../../a_functions/sanitize.php';

  $email = $_SESSION['user_email'];
  $date = date("Y, F j");
  $time = date("g:i a");


  $file_type = $_POST['doc_type'];
  $file_format = "excel";
  $signatories = $_POST['signatories'];
  $created_by = $_SESSION['user_email'];
  $created_on = date("Y, F j g:i a");


  $uploaded_excel = $_FILES['excel'];
  $uploaded_excel_name = $uploaded_excel['name'];
  $uploaded_excel_tmp = $uploaded_excel['tmp_name'];
  $uploaded_excel_size = $uploaded_excel['size'];
  $uploaded_excel_error = $uploaded_excel['error'];

  $file_ext = explode("." , $uploaded_excel_name);
  $file_ext = strtolower(end($file_ext) );
  $file_path = '../../../DB/excel/';
  $file_id = uniqid('excel_', true). "." . $file_ext;

  $full_file = $file_path . $file_id;


  if ($uploaded_excel_size <= 2000000 && $uploaded_excel_error === 0)  {
    $sql = "INSERT INTO tbl_file(file_id,orig_name,file_type,file_format,signatories,pending_signatories,created_by,created_on,status) VALUES(?,?,?,?,?,?,?,?,?)";
    $stmt = $dbConn->prepare($sql);
    $stmt->bindValue(1, $file_id);
    $stmt->bindValue(2, $uploaded_excel_name);
    $stmt->bindValue(3, $file_type);
    $stmt->bindValue(4, $file_format);
    $stmt->bindValue(5, $signatories);
    $stmt->bindValue(6, $signatories);
    $stmt->bindValue(7, $created_by);
    $stmt->bindValue(8, $created_on);
    $stmt->bindValue(9, "pending");
    $stmt->execute();

    move_uploaded_file($uploaded_excel_tmp , $full_file);

    if ($stmt) {
      $sql2 = "INSERT INTO tbl_news(doc_id,name,email,date,time,signatories,pending_signatories,approved_signatories,msg,photo,created_by) VALUES(?,?,?,?,?,?,?,?,?,?,?)";
      $stmt = $dbConn->prepare($sql2);
      $stmt->bindValue(1, $file_id);
      $stmt->bindValue(2, $uploaded_excel_name);
      $stmt->bindValue(3, $email);
      $stmt->bindValue(4, $date);
      $stmt->bindValue(5, $time);
      $stmt->bindValue(6, $signatories);
      $stmt->bindValue(7, $signatories);
      $stmt->bindValue(8, "");
      $stmt->bindValue(9, "has uploaded a Spreadsheet");
      $stmt->bindValue(10, $email.".jpg");
      $stmt->bindValue(11, $email);
      $stmt->execute();
      echo "success";
    }//end of if
  }//end of if

  else {
    echo "error";
  }
 ?>