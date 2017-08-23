<?php
  session_start();
  require '../../dbConfig.php';



    try {
        $department = $_POST["department"];
        $position = strtoupper($_POST["position"]);
        $sql = "INSERT INTO tbl_position(department,position) VALUES(?,?)";
        $stmt = $dbConn->prepare($sql);
        $stmt->bindValue(1, $department);
        $stmt->bindValue(2, $position);
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
