<?php
session_start();
$disapproved = "";
$powerpoint = NULL;

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



////////////tbl_powerpoint///////////////////
 #select_publish_file
      $sql ="SELECT * FROM tbl_file WHERE created_by=? AND file_format=? ORDER BY num DESC";

        $stmt =  $dbConn->prepare($sql);
        $stmt->bindValue(1, $email);
        $stmt->bindValue(2, "powerpoint");
        $stmt ->  execute();
        $table  = $stmt;


        foreach ($table as $row) {
          if ($row['pending_signatories']=="" && $row['disapproved']=="" && $row['comment']==""  && $row['published_on']=="") {
            $powerpoint = $powerpoint + 1;
          }//end of if
        }//end of foreach
////////////////end of tbl_powerpoint////////////

  if ($powerpoint == NULL) {
    echo "";
  }
  else {
    echo "&nbsp;&nbsp".$powerpoint."&nbsp;&nbsp";
  }
 ?>
