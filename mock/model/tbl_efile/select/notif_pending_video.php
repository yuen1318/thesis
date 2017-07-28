<?php
session_start();
$disapproved = "";
$video = NULL;

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



////////////tbl_video///////////////////
      #select_pending_file
      $sql ="SELECT * FROM tbl_file WHERE disapproved=? AND file_format=? ORDER BY num DESC";
      $stmt =  $dbConn->prepare($sql);
      $stmt->bindValue(1, $disapproved);
      $stmt->bindValue(2, "video");
      $stmt ->  execute();
      $table  = $stmt;


      foreach ($table as $row) {
          $expload_to_array = explode("," , $row['pending_signatories']);
        if ( current($expload_to_array) ==  $email) {
          $video = $video + 1;
        }

      }//end of foreach
 
////////////////end of tbl_video////////////

  if ($video == NULL) {
    echo "";
  }
  else {
    echo "&nbsp;&nbsp".$video."&nbsp;&nbsp";
  }
 ?>
