<?php
  session_start();
  require '../../dbConfig.php';
  require '../../a_functions/sanitize.php';


    try {
        $department = strtoupper($_POST["department"]);
        $sql = "INSERT INTO tbl_department(name) VALUES(?)";
        $stmt = $dbConn->prepare($sql);
        $stmt->bindValue(1, $department);
        $stmt->execute();

        if($stmt){
         echo "success";   
        }
        else{
            echo "error"; 
        }//end of else
    }//end of try
    catch (PDOException $e) {
      throw new Exception($e->getMessage());
    }




 ?>
