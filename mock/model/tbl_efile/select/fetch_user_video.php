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
      $video1 ="SELECT * FROM tbl_file WHERE disapproved=? AND file_format=? ORDER BY num DESC";
      $stmt =  $dbConn->prepare($video1);
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

      #select_publish_file
      $video2 ="SELECT * FROM tbl_file WHERE created_by=? AND file_format=? ORDER BY num DESC";

        $stmt =  $dbConn->prepare($video2);
        $stmt->bindValue(1, $email);
        $stmt->bindValue(2, "video");
        $stmt ->  execute();
        $table  = $stmt;


        foreach ($table as $row) {
          if ($row['pending_signatories']=="" && $row['disapproved']=="" && $row['comment']==""  && $row['published_on']=="") {
            $video = $video + 1;
          }//end of if
        }//end of foreach

      #select_rejected_file
      $video3 ="SELECT * FROM tbl_file WHERE  created_by=? AND file_format=? ORDER BY num DESC";
        $stmt =  $dbConn->prepare($video3);
        $stmt->bindValue(1, $email);
        $stmt->bindValue(2, "video");
        $stmt ->  execute();
        $table  = $stmt;


        foreach ($table as $row) {
          if ($row['disapproved'] != "") {
            $video = $video + 1;
          }//end of if
        }//end of foreach
////////////////end of tbl_video////////////

  if ($video == NULL) {
    echo "";
  }
  else {
    echo "&nbsp;&nbsp".$video."&nbsp; New &nbsp";
  }
 ?>
