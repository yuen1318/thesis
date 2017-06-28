<?php
session_start();
$disapproved = "";
$efile = NULL;

require '../../dbConfig.php';


  if (isset($_SESSION['user_email']) ) {
      $email = $_SESSION['user_email'];
  }
  else if ( isset($_SESSION['admin_email']) ) {
    $email = $_SESSION['admin_email'];
  }
  else {
    echo "<script> location.reload(); </script>";
  }

  $disapproved = "";


  if (!empty($dbConn)) {
////////////tbl_efile///////////////////
    #select_pending_efile
    $ef1 ="SELECT * FROM tbl_efile WHERE disapproved=? ORDER BY num DESC";
    $stmt =  $dbConn->prepare($ef1);
    $stmt->bindValue(1, $disapproved);
    $stmt ->  execute();
    $table  = $stmt;


    foreach ($table as $row) {
        $expload_to_array = explode("," , $row['pending_signatories']);
      if ( current($expload_to_array) ==  $email) {
        $efile = $efile + 1;
      }

    }//end of foreach

    #select_publish_efile
    $ef2 ="SELECT * FROM tbl_efile WHERE created_by=? ORDER BY num DESC";

      $stmt =  $dbConn->prepare($ef2);
      $stmt->bindValue(1, $email);
      $stmt ->  execute();
      $table  = $stmt;


      foreach ($table as $row) {
        if ($row['pending_signatories']=="" && $row['disapproved']=="" && $row['comment']==""  && $row['published_on']=="") {
          $efile = $efile + 1;
        }//end of if
      }//end of foreach

    #select_rejected_efile
    $ef3 ="SELECT * FROM tbl_efile WHERE  created_by=? ORDER BY num DESC";
      $stmt =  $dbConn->prepare($ef3);
      $stmt->bindValue(1, $email);
      $stmt ->  execute();
      $table  = $stmt;


      foreach ($table as $row) {
        if ($row['disapproved'] != "") {
          $efile = $efile + 1;
        }//end of if
      }//end of foreach
////////////////end of tbl_efile/////////

  if ($efile == NULL) {
    echo "";
  }
  else {
    echo "&nbsp;&nbsp".$efile."&nbsp; New &nbsp";
  }

}//end of dbConn

 ?>
