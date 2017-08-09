<?php

  $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
  $validURL = str_replace("&","&amp;",$url);
  $department = parse_url($validURL, PHP_URL_QUERY);

  $final_department = str_replace("%20"," ",$department);
 
  require '../../dbConfig.php';
  $sql ="SELECT * FROM tbl_position WHERE department=?";

  if (!empty($dbConn)) {
    $stmt =  $dbConn->prepare($sql);
    $stmt->bindValue(1, $final_department );
    $stmt ->  execute();
    $table  = $stmt;

    echo "<option disabled selected>Select Position</option>";
    foreach ($table as $row) {
      echo "<option value='$row[position]'>$row[position] </option>";
    }//end of foreach
  }

 ?>
