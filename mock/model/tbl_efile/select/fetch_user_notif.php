<?php
  session_start();
  $notif = NULL;
  require '../../dbConfig.php';

  if (isset($_SESSION['user_email']) ) {
      $email = $_SESSION['user_email'];
  }
  else if ( isset($_SESSION['admin_email']) ) {
    $email = $_SESSION['admin_email'];
  }



  $disapproved = "";

  #select_pending_efile
  $sql ="SELECT * FROM tbl_efile WHERE disapproved=? ORDER BY num DESC";
  if (!empty($dbConn)) {
    $stmt =  $dbConn->prepare($sql);
    $stmt->bindValue(1, $disapproved);
    $stmt ->  execute();
    $table  = $stmt;


    foreach ($table as $row) {
        $expload_to_array = explode("," , $row['pending_signatories']);
      if ( current($expload_to_array) ==  $email) {
        $notif = $notif + 1;
      }

    }//end of foreach

    #select_publish_efile
    $sql2 ="SELECT * FROM tbl_efile WHERE created_by=? ORDER BY num DESC";

      $stmt =  $dbConn->prepare($sql2);
      $stmt->bindValue(1, $email);
      $stmt ->  execute();
      $table  = $stmt;


      foreach ($table as $row) {
        if ($row['pending_signatories']=="" && $row['disapproved']=="" && $row['comment']==""  && $row['published_on']=="") {
          $notif = $notif + 1;
        }//end of if
      }//end of foreach

    #select_rejected_efile
    $sql3 ="SELECT * FROM tbl_efile WHERE  created_by=? ORDER BY num DESC";
      $stmt =  $dbConn->prepare($sql3);
      $stmt->bindValue(1, $email);
      $stmt ->  execute();
      $table  = $stmt;


      foreach ($table as $row) {
        if ($row['disapproved'] != "") {
          $notif = $notif + 1;
        }//end of if
      }//end of foreach

    if ($notif == NULL) {
      echo "";
    }
    else {
      echo "&nbsp;".$notif."&nbsp;";
    }

  }//end of if

  else {
    //header location page 404
  }

  $dbConn = NULL;
 ?>
