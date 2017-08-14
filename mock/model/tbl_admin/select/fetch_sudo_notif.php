<?php
  require '../../dbConfig.php';
  $pending = NULL;
  $sql ="SELECT * FROM tbl_admin WHERE status=? ORDER BY id DESC";
  if (!empty($dbConn)) {
    $stmt =  $dbConn->prepare($sql);
    $stmt->bindValue(1, "pending");
    $stmt ->execute();
    $table  = $stmt;

    foreach ($table as $row) {
    $pending = $pending + 1;
    }//end of foreach

      if ($pending == NULL) {
    echo "";
    }
    else {
        echo "&nbsp;".$pending."&nbsp;";
    }
  }//end of if

  else {
    //header location page 404
  }

  $dbConn = NULL;
 ?>
