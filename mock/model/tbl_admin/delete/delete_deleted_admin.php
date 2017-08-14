<?php
  session_start();
  require '../../dbConfig.php';
  require '../../a_functions/sanitize.php';

    $id = $_POST['delete_id']; 

    $sql2 = "DELETE FROM tbl_admin WHERE id=?";
    $stmt = $dbConn->prepare($sql2);
    $stmt->bindValue(1, $id);
    $stmt->execute(); 
    
    if($stmt){
        echo"success";
    }
    else{
        echo"error";
    }




 ?>
