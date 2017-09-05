<?php
  session_start();
  require '../../dbConfig.php';
  $path = "../../DB/profile";
  

  if(isset($_SESSION["user_email"])){
    $me = $_SESSION['user_email'];
  }
  else if(isset($_SESSION["admin_email"])){
    $me = $_SESSION['admin_email'];
  }
  elseif(isset($_SESSION["sudo_email"])){
    $me = $_SESSION['sudo_email'];
  }
  else{
    echo"session expired";
  }
  $them = $_POST['chat_pick'];

  $sql ="SELECT * FROM (SELECT * FROM tbl_chat ORDER BY num DESC LIMIT 50) t ORDER BY num ASC";
  $stmt =  $dbConn->prepare($sql);
  $stmt ->  execute();
  $table  = $stmt;



    foreach ($table as $row) {

      if(isset($_SESSION['user_email'])){
        #if sender is me
        if ($row['sender'] === $me && $row['recepient']=== $them) {
          echo "<div class='right-align col s12 m12 l12'> <br>
                  <div class=' green  white-text' style='display:inline-block !important; padding:7px !important; border-radius: 10px;'>
                    <span>
                      $row[msg]<br  >
                      <small>$row[time]</small>
                    </span>
                  </div>
                </div> ";
        }//end of else if

        #if sender is them
        else if ($row['sender'] === $them && $row['recepient']=== $me) {
          echo "<div class='left-align col s12 m12 l12'> <br>
                  <div class=' light-green lighten-5  green-text' style='display:inline-block !important; padding:7px !important; border-radius: 10px;'>
                    <span>
                      $row[msg]<br  >
                      <small>$row[time]</small>
                    </span>
                  </div>
                </div>";
        }//end of if

      }//end of if

      else if(isset($_SESSION['admin_email'])){
        #if sender is me
        if ($row['sender'] === $me && $row['recepient']=== $them) {
          echo "<div class='right-align col s12 m12 l12'> <br>
                  <div class=' teal lighten-1  white-text' style='display:inline-block !important; padding:7px !important; border-radius: 10px;'>
                    <span>
                      $row[msg]<br  >
                      <small>$row[time]</small>
                    </span>
                  </div>
                </div> ";
        }//end of else if

        #if sender is them
        else if ($row['sender'] === $them && $row['recepient']=== $me) {
          echo "<div class='left-align col s12 m12 l12'> <br>
                  <div class=' teal lighten-5  teal-text' style='display:inline-block !important; padding:7px !important; border-radius: 10px;'>
                    <span>
                      $row[msg]<br  >
                      <small>$row[time]</small>
                    </span>
                  </div>
                </div>";
        }//end of if

      }//end of else if

      else if(isset($_SESSION['sudo_email'])){
        #if sender is me
        if ($row['sender'] === $me && $row['recepient']=== $them) {
          echo "<div class='right-align col s12 m12 l12'> <br>
                  <div class=' blue-grey darken-3  white-text' style='display:inline-block !important; padding:7px !important; border-radius: 10px;'>
                    <span>
                      $row[msg]<br  >
                      <small>$row[time]</small>
                    </span>
                  </div>
                </div> ";
        }//end of else if

        #if sender is them
        else if ($row['sender'] === $them && $row['recepient']=== $me) {
          echo "<div class='left-align col s12 m12 l12'> <br>
                  <div class=' blue-grey lighten-4  blue-grey-text' style='display:inline-block !important; padding:7px !important; border-radius: 10px;'>
                    <span>
                      $row[msg]<br  >
                      <small>$row[time]</small>
                    </span>
                  </div>
                </div>";
        }//end of if

      }//end of else if

 

    }//end of foreach

 ?>
