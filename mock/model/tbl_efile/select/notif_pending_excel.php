<?php
session_start();
$disapproved = "";
$excel = NULL;

require '../../dbConfig.php';


  if (isset($_SESSION['user_email']) ) {
      $email = $_SESSION['user_email'];
  }
  else if ( isset($_SESSION['admin_email']) ) {
    $email = $_SESSION['admin_email'];
  }
  else {
    echo "<script> location.reload(); </script>"; ;
  }



////////////tbl_excel///////////////////
      #select_pending_file
      $sql ="SELECT * FROM tbl_file WHERE disapproved=? AND file_format=? ORDER BY num DESC";
      $stmt =  $dbConn->prepare($sql);
      $stmt->bindValue(1, $disapproved);
      $stmt->bindValue(2, "excel");
      $stmt ->  execute();
      $table  = $stmt;

      foreach ($table as $row) {
          $expload_to_array = explode("," , $row['pending_signatories']);
        if ( current($expload_to_array) ==  $email) {
          $excel = $excel + 1;
        }

      }//end of foreach

////////////////end of tbl_excel////////////
  if ($excel == NULL) {
    echo "";
  }
  else {
    echo "&nbsp;&nbsp".$excel."&nbsp;&nbsp";
  }
 ?>
