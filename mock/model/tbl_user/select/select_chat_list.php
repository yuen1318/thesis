<?php
  session_start();
  require '../../dbConfig.php';
  $path = "../../DB/profile";
  $email = $_SESSION['user_email'];

  $sql ="SELECT * FROM tbl_user WHERE  status=? && flag=? && email != ? ORDER BY id DESC";
  if (!empty($dbConn)) {
    $stmt =  $dbConn->prepare($sql);
    $stmt->bindValue(1, "active");
    $stmt->bindValue(2, "1");
    $stmt->bindValue(3, $email);
    $stmt -> execute();
    $table  = $stmt;


    foreach ($table as $row) {
      echo "
          <li class='collection-item avatar'>
              <img src='../../DB/profile/$row[photo]' class='circle'>
              <span class='title email'>$row[email]</span>
              <p>$row[fn] $row[mn] $row[ln]</p>
              <a href='chatRoom.php?$row[email]' class='secondary-content'><i class='fa fa-comment fa-lg green-text  darken-2'></i></a>
            </li>";
    }//end of foreach
 
  }//end of if

  else {
    //header location page 404
  }


  $sql2 ="SELECT * FROM tbl_user WHERE  status=? && flag=? && email != ? ORDER BY id DESC";
  if (!empty($dbConn)) {
    $stmt =  $dbConn->prepare($sql2);
    $stmt->bindValue(1, "active");
    $stmt->bindValue(2, "0");
    $stmt->bindValue(3, $email);
    $stmt -> execute();
    $table  = $stmt;


    foreach ($table as $row) {
      echo "
          <li class='collection-item avatar'>
              <img src='../../DB/profile/$row[photo]' class='circle'>
              <span class='title email'>$row[email]</span>
              <p>$row[fn] $row[mn] $row[ln]</p>
              <a href='chatRoom.php?$row[email]' class='secondary-content'><i class='fa fa-comment-o fa-lg green-text  darken-2'></i></a>
            </li>";
    }//end of foreach

  }//end of if

  else {
    //header location page 404
  }

  $dbConn = NULL;
 ?>
