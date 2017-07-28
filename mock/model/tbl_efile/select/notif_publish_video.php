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
 #select_publish_file
      $sql ="SELECT * FROM tbl_file WHERE created_by=? AND file_format=? ORDER BY num DESC";

        $stmt =  $dbConn->prepare($sql);
        $stmt->bindValue(1, $email);
        $stmt->bindValue(2, "video");
        $stmt ->  execute();
        $table  = $stmt;


        foreach ($table as $row) {
          if ($row['pending_signatories']=="" && $row['disapproved']=="" && $row['comment']==""  && $row['published_on']=="") {
            $video = $video + 1;
          }//end of if
        }//end of foreach
 
////////////////end of tbl_video////////////

  if ($video == NULL) {
    echo "";
  }
  else {
    echo "&nbsp;&nbsp".$video."&nbsp;&nbsp";
  }
 ?>
