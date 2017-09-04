<?php
  session_start();
  require '../../dbConfig.php';
 
    $id = $_POST['delete_id']; 

    
    $sql = "DELETE FROM tbl_instruction WHERE id=?";
    $stmt = $dbConn->prepare($sql);
    $stmt->bindValue(1, $id);
    $stmt->execute(); 

    if($stmt){
        echo "success";
    }
    else{
        echo "error";
    }



 ?>
