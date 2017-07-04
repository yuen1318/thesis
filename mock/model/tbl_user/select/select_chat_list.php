<?php
  session_start();
  require '../../dbConfig.php';
  $path = "../../DB/profile";
  $email = $_SESSION['user_email'];

  $sql ="SELECT * FROM tbl_user WHERE  status=? && email != ? ORDER BY id DESC";
  if (!empty($dbConn)) {
    $stmt =  $dbConn->prepare($sql);
    $stmt->bindValue(1, "active");
    $stmt->bindValue(2, $email);
    $stmt -> execute();
    $table  = $stmt;


    foreach ($table as $row) {
      echo "<li class='collection-item avatar'>
              <img src='../../DB/profile/$row[photo]' class='circle'>
              <span class='title email'>$row[email]</span>
              <p>$row[fn] $row[mn] $row[ln]</p>
              <a href='chatRoom.php?$row[email]' class='secondary-content'><i class='fa fa-comment-o fa-lg'></i></a>
            </li>";
    }//end of foreach

  }//end of if

  else {
    //header location page 404
  }

  $dbConn = NULL;
 ?>
