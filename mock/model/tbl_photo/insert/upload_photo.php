<?php
 
  session_start();
  require '../../dbConfig.php';
  require '../../a_functions/sanitize.php';

  if (isset($_SESSION["user_email"]) ) {
      $email = $_SESSION['user_email'];
  }
  elseif (isset($_SESSION["admin_email"]) ) {
    $email = $_SESSION['admin_email'];
  }


  $created_by = $email;
  $created_on = date("Y, F j g:i a");


  $uploaded_img = $_FILES['uploaded_img'];
  $uploaded_img_name = $uploaded_img['name'];
  $uploaded_img_tmp = $uploaded_img['tmp_name'];
  $uploaded_img_size = $uploaded_img['size'];
  $uploaded_img_error = $uploaded_img['error'];

  $file_ext = explode("." , $uploaded_img_name);
  $file_ext = strtolower(end($file_ext) );
  $file_path = '../../../DB/myPhoto/';
  $file_id = uniqid('img_', true). "." . $file_ext;

  $full_file = $file_path . $file_id;


  if ($uploaded_img_size <= 2000000 && $uploaded_img_error === 0)  {
    $sql = "INSERT INTO tbl_photo(photo_id,photo_name,created_on,created_by) VALUES(?,?,?,?)";
    $stmt = $dbConn->prepare($sql);
    $stmt->bindValue(1, $file_id);
    $stmt->bindValue(2, $uploaded_img_name);
    $stmt->bindValue(3, $created_on);
    $stmt->bindValue(4, $created_by);
    $stmt->execute();

    move_uploaded_file($uploaded_img_tmp , $full_file);

    echo "success";
  }//end of if

  else {
    echo "error";
  }
 ?>
