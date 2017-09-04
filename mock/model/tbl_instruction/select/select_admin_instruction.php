<?php
  session_start();
  require '../../dbConfig.php';


  $sql ="SELECT * FROM tbl_instruction WHERE access=? ORDER BY id DESC";
  if (!empty($dbConn)) {
    $stmt =  $dbConn->prepare($sql);
    $stmt->bindValue(1, "admin");
    $stmt ->  execute();
    $table  = $stmt;

    foreach ($table as $row) {
     
        echo "<li>
                    <div class='collapsible-header'>$row[name]</div>
                    <div class='collapsible-body'>
                        
                        <iframe width='100%' height='400' src='$row[url]' frameborder='0' allowfullscreen>
                        </iframe>

                    </div>
                </li>";
    
    }//end of foreach

  }//end of if

  else {
    //header location page 404
  }

  $dbConn = NULL;
 ?>
