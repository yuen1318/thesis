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
      $excel1 ="SELECT * FROM tbl_file WHERE disapproved=? AND file_format=? ORDER BY num DESC";
      $stmt =  $dbConn->prepare($excel1);
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

      #select_publish_file
      $excel2 ="SELECT * FROM tbl_file WHERE created_by=? AND file_format=? ORDER BY num DESC";

        $stmt =  $dbConn->prepare($excel2);
        $stmt->bindValue(1, $email);
        $stmt->bindValue(2, "excel");
        $stmt ->  execute();
        $table  = $stmt;


        foreach ($table as $row) {
          if ($row['pending_signatories']=="" && $row['disapproved']=="" && $row['comment']==""  && $row['published_on']=="") {
            $excel = $excel + 1;
          }//end of if
        }//end of foreach

      #select_rejected_file
      $excel3 ="SELECT * FROM tbl_file WHERE  created_by=? AND file_format=? ORDER BY num DESC";
        $stmt =  $dbConn->prepare($excel3);
        $stmt->bindValue(1, $email);
        $stmt->bindValue(2, "excel");
        $stmt ->  execute();
        $table  = $stmt;


        foreach ($table as $row) {
          if ($row['disapproved'] != "") {
            $excel = $excel + 1;
          }//end of if
        }//end of foreach
////////////////end of tbl_excel////////////

  if ($excel == NULL) {
    echo "";
  }
  else {
    echo "&nbsp;&nbsp".$excel."&nbsp; New &nbsp";
  }
 ?>
