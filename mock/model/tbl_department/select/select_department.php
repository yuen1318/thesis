<?php
  require '../../dbConfig.php';
  $sql ="SELECT * FROM tbl_department";

  if (!empty($dbConn)) {
    $stmt =  $dbConn->prepare($sql);
    $stmt ->  execute();
    $table  = $stmt;

    echo "<option disabled selected>Select Department</option>";
    foreach ($table as $row) {
      echo "<option value='$row[name]'>$row[name]</option>";
    }//end of foreach
  }

 ?>
