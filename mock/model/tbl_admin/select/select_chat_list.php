<?php
  session_start();
  require '../../dbConfig.php';
  $path = "../../DB/profile";


  ///////get admin chat list
  if(isset($_SESSION['admin_email'])){
    $email = $_SESSION['admin_email'];



    /////////////////////////get online
    $sql_admin1 ="SELECT * FROM tbl_sudo WHERE flag =?";
    if (!empty($dbConn)) {
      $stmt =  $dbConn->prepare($sql_admin1);
      $stmt->bindValue(1, "1");
      $stmt -> execute();
      $table  = $stmt;
  
  
      foreach ($table as $row) {
        echo "<li class='collection-item avatar'>
                <img src='../../view/sudo/img/sudo.png' class='circle'>
                <span class='title email'>$row[email]</span>
                <a href='chatRoom.php?$row[email]' class='secondary-content'><i class='teal-text lighten-1 fa fa-comment fa-lg'></i></a>
              </li>";
      }//end of foreach
  
    }//end of if
  
    else {
      //header location page 404
    }

  
    $sql_admin2 ="SELECT * FROM tbl_admin WHERE  status=? && flag=? && email != ? ORDER BY id DESC";
    if (!empty($dbConn)) {
      $stmt =  $dbConn->prepare($sql_admin2);
      $stmt->bindValue(1, "active");
      $stmt->bindValue(2, "1");
      $stmt->bindValue(3, $email);
      $stmt -> execute();
      $table  = $stmt;
  
  
      foreach ($table as $row) {
        echo "<li class='collection-item avatar'>
                <img src='../../DB/profile/$row[photo]' class='circle'>
                <span class='title email'>$row[email]</span>
                <p>$row[fn] $row[mn] $row[ln]</p>
                <a href='chatRoom.php?$row[email]' class='secondary-content'><i class='teal-text lighten-1 fa fa-comment fa-lg'></i></a>
              </li>";
      }//end of foreach
  
    }//end of if
  
    else {
      //header location page 404
    }

//////////////////////////////////end of get online

//////////////////////////////////get offline
$sql_admin3 ="SELECT * FROM tbl_sudo WHERE flag =?";
if (!empty($dbConn)) {
  $stmt =  $dbConn->prepare($sql_admin3);
  $stmt->bindValue(1, "0");
  $stmt -> execute();
  $table  = $stmt;


  foreach ($table as $row) {
    echo "<li class='collection-item avatar'>
            <img src='../../view/sudo/img/sudo.png' class='circle'>
            <span class='title email'>$row[email]</span>
            <a href='chatRoom.php?$row[email]' class='secondary-content'><i class='teal-text lighten-1 fa fa-comment-o fa-lg'></i></a>
          </li>";
  }//end of foreach

}//end of if

else {
  //header location page 404
}


$sql_admin4 ="SELECT * FROM tbl_admin WHERE  status=? && flag=? && email != ? ORDER BY id DESC";
if (!empty($dbConn)) {
  $stmt =  $dbConn->prepare($sql_admin4);
  $stmt->bindValue(1, "active");
  $stmt->bindValue(2, "0");
  $stmt->bindValue(3, $email);
  $stmt -> execute();
  $table  = $stmt;


  foreach ($table as $row) {
    echo "<li class='collection-item avatar'>
            <img src='../../DB/profile/$row[photo]' class='circle'>
            <span class='title email'>$row[email]</span>
            <p>$row[fn] $row[mn] $row[ln]</p>
            <a href='chatRoom.php?$row[email]' class='secondary-content'><i class='teal-text lighten-1 fa fa-comment-o fa-lg'></i></a>
          </li>";
  }//end of foreach

}//end of if

else {
  //header location page 404
}
//////////////////////////////////end of get offline

  }//end of if
////////////////////////////////////////////end of admin chat list


/////get sudo chat list
//////////////////////get online
  else if(isset($_SESSION['sudo_email'])){

    $sql_sudo1 ="SELECT * FROM tbl_admin WHERE status=? AND flag=? ORDER BY id DESC";
    if (!empty($dbConn)) {
      $stmt =  $dbConn->prepare($sql_sudo1);
      $stmt->bindValue(1, "active");
      $stmt->bindValue(2, "1");
      $stmt -> execute();
      $table  = $stmt;
   
  
      foreach ($table as $row) {
        echo "<li class='collection-item avatar'>
                <img src='../../DB/profile/$row[photo]' class='circle'>
                <span class='title email'>$row[email]</span>
                <p>$row[fn] $row[mn] $row[ln]</p>
                <a href='chatRoom.php?$row[email]' class='secondary-content'><i class='fa fa-comment fa-lg blue-grey-text darken-3'></i></a>
              </li>";
      }//end of foreach
  
    }//end of if
  
    else {
      //header location page 404
    }
    /////////////////////end of get online

//////////////////get offline
  $sql_sudo2 ="SELECT * FROM tbl_admin WHERE status=? AND flag=? ORDER BY id DESC";
  if (!empty($dbConn)) {
    $stmt =  $dbConn->prepare($sql_sudo2);
    $stmt->bindValue(1, "active");
    $stmt->bindValue(2, "0");
    $stmt -> execute();
    $table  = $stmt;


    foreach ($table as $row) {
      echo "<li class='collection-item avatar'>
              <img src='../../DB/profile/$row[photo]' class='circle'>
              <span class='title email'>$row[email]</span>
              <p>$row[fn] $row[mn] $row[ln]</p>
              <a href='chatRoom.php?$row[email]' class='secondary-content'><i class='fa fa-comment-o fa-lg blue-grey-text darken-3'></i></a>
            </li>";
    }//end of foreach

  }//end of if

  else {
    //header location page 404
  }

//////////////////end of get offline
  }//end of else if

  /////end of get sudo chat list


  
 



  $dbConn = NULL;
 ?>