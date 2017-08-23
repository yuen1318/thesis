<?php
 
  session_start();


  $uploaded_sql = $_FILES['restore'];
  $uploaded_sql_name = $uploaded_sql['name'];
  $uploaded_sql_tmp = $uploaded_sql['tmp_name'];
  $uploaded_sql_size = $uploaded_sql['size'];
  $uploaded_sql_error = $uploaded_sql['error'];

  $file_path = "../model/" ;
 

  $full_file = $file_path . $uploaded_sql_name;


  if ($uploaded_sql_size <= 2000000 && $uploaded_sql_error === 0)  {
    move_uploaded_file($uploaded_sql_tmp , $full_file);

    header("Location:restore.php");
  }//end of if

  else {
    echo "error";
  }
 ?>