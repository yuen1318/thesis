<?php
  session_start();
  require '../../dbConfig.php';

  $sql ="SELECT * FROM tbl_admin_news ORDER BY id DESC";
  if (!empty($dbConn)) {
    $stmt =  $dbConn->prepare($sql);
    $stmt ->  execute();
    $list  = $stmt;


    foreach ($list as $row) {
       echo 
          "<li class='collection-item avatar'>
            <img src='../../DB/profile/$row[photo].jpg' class='circle materialboxed' >
            <span class='title email'>$row[email]</span><br>
            <small class='date'>$row[date] at $row[time]</small><br><br>
            <p class='msg'>$row[msg]</p>          
          </li><br>";

    }//end of for loop
  }//end of if
  $dbConn = NULL;
 ?>
