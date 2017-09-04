<?php
  session_start();
  require '../../dbConfig.php';
  require '../../a_functions/sanitize.php';

  $id = $_POST['edit_id'];
  $name = sanitize($_POST['edit_name']);
  $url = $_POST['edit_url'];
  $access = $_POST['edit_access'];

  
 
  $sql = "UPDATE tbl_instruction SET name=?,url=?,access=? WHERE id=?";

  $stmt = $dbConn->prepare($sql);
  $stmt->bindValue(1, $name);
  $stmt->bindValue(2, $url);
  $stmt->bindValue(3, $access);
  $stmt->bindValue(4, $id);
  $stmt->execute();

    if($stmt){
        echo "success";
    }
    else{
        echo "error";
    }
  

 ?>
