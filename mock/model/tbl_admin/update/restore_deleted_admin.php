<?php
  session_start();
  require '../../dbConfig.php';
  require '../../a_functions/sanitize.php';

  $id = $_POST['restore_id'];
  $status = "pending";

 

    $sql2 = "UPDATE tbl_admin SET status=? WHERE id=?";
    $stmt = $dbConn->prepare($sql2);
    $stmt->bindValue(1, $status);
    $stmt->bindValue(2, $id);
    $stmt->execute();

    if($stmt){
        echo"success";
    }
    else{
        echo"error";
    }

    

 ?>
