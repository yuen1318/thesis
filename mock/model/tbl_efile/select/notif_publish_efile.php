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
 #select_publish_efile
    $sql ="SELECT * FROM tbl_efile WHERE created_by=? ORDER BY num DESC";

      $stmt =  $dbConn->prepare($sql);
      $stmt->bindValue(1, $email);
      $stmt ->  execute();
      $table  = $stmt;


      foreach ($table as $row) {
        if ($row['pending_signatories']=="" && $row['disapproved']=="" && $row['comment']==""  && $row['published_on']=="") {
          $efile = $efile + 1;
        }//end of if
      }//end of foreach
////////////////end of tbl_efile/////////

  if ($efile == NULL) {
    echo "";
  }
  else {
    echo "&nbsp;&nbsp".$efile."&nbsp;&nbsp";
  }

}//end of dbConn

 ?>
