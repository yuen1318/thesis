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
    $sql ="SELECT * FROM tbl_efile WHERE disapproved=? ORDER BY num DESC";
    $stmt =  $dbConn->prepare($sql);
    $stmt->bindValue(1, $disapproved);
    $stmt ->  execute();
    $table  = $stmt;


    foreach ($table as $row) {
        $expload_to_array = explode("," , $row['pending_signatories']);
      if ( current($expload_to_array) ==  $email) {
        $efile = $efile + 1;
      }
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
