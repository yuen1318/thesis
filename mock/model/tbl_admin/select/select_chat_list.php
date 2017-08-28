<?php
  session_start();
  require '../../dbConfig.php';
  $path = "../../DB/profile";

  if(isset($_SESSION['admin_email'])){
    $email = $_SESSION['admin_email'];

    $sql2 ="SELECT * FROM tbl_sudo";
    if (!empty($dbConn)) {
      $stmt =  $dbConn->prepare($sql2);
      $stmt -> execute();
      $table  = $stmt;
  
  
      foreach ($table as $row) {
        echo "<li class='collection-item avatar'>
                <img src='../../view/sudo/img/sudo.png' class='circle'>
                <span class='title email'>$row[email]</span>
                <a href='chatRoom.php?$row[email]' class='secondary-content'><i class='fa fa-comment-o fa-lg'></i></a>
              </li>";
      }//end of foreach
  
    }//end of if
  
    else {
      //header location page 404
    }
  
    $sql ="SELECT * FROM tbl_admin WHERE  status=? && email != ? ORDER BY id DESC";
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
  }//end of if


  else if(isset($_SESSION['sudo_email'])){

    $sql ="SELECT * FROM tbl_admin ORDER BY id DESC";
    if (!empty($dbConn)) {
      $stmt =  $dbConn->prepare($sql);
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
  }//end of if

  


  
 



  $dbConn = NULL;
 ?>