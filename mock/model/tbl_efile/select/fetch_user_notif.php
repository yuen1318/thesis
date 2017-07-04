<?php
  session_start();
  $efile = NULL;
  $excel = NULL;
  $powerpoint = NULL;
  $video = NULL;
  $total= NULL;
  require '../../dbConfig.php';


    if (!isset($_SESSION['user_email']) ) {
       echo "<script> location.reload(); </script>"; 
        
    }
  
   else if (isset($_SESSION['user_email']) ) {
        $email = $_SESSION['user_email'];  

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
////////////////end of tbl_efile


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

////////////tbl_powerpoint///////////////////
      #select_pending_file
      $powerpoint1 ="SELECT * FROM tbl_file WHERE disapproved=? AND file_format=? ORDER BY num DESC";
      $stmt =  $dbConn->prepare($powerpoint1);
      $stmt->bindValue(1, $disapproved);
      $stmt->bindValue(2, "powerpoint");
      $stmt ->  execute();
      $table  = $stmt;


      foreach ($table as $row) {
          $expload_to_array = explode("," , $row['pending_signatories']);
        if ( current($expload_to_array) ==  $email) {
          $powerpoint = $powerpoint + 1;
        }

      }//end of foreach

      #select_publish_file
      $powerpoint2 ="SELECT * FROM tbl_file WHERE created_by=? AND file_format=? ORDER BY num DESC";

        $stmt =  $dbConn->prepare($powerpoint2);
        $stmt->bindValue(1, $email);
        $stmt->bindValue(2, "powerpoint");
        $stmt ->  execute();
        $table  = $stmt;


        foreach ($table as $row) {
          if ($row['pending_signatories']=="" && $row['disapproved']=="" && $row['comment']==""  && $row['published_on']=="") {
            $powerpoint = $powerpoint + 1;
          }//end of if
        }//end of foreach

      #select_rejected_file
      $powerpoint3 ="SELECT * FROM tbl_file WHERE  created_by=? AND file_format=? ORDER BY num DESC";
        $stmt =  $dbConn->prepare($powerpoint3);
        $stmt->bindValue(1, $email);
        $stmt->bindValue(2, "powerpoint");
        $stmt ->  execute();
        $table  = $stmt;


        foreach ($table as $row) {
          if ($row['disapproved'] != "") {
            $powerpoint = $powerpoint + 1;
          }//end of if
        }//end of foreach
////////////////end of tbl_powerpoint////////////

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
////////////////end of tbl_powerpoint////////////


      $total = $efile+  $excel + $powerpoint +$video;

      if ($total == NULL) {
        echo "";
      }
      else {
        echo "&nbsp;".$total."&nbsp;";
      }

    }//end of dbConn not empty

    else {
      //header location page 404
    }

    $dbConn = NULL;

      
    }
  
    else {
       echo "<script> location.reload(); </script>"; 
    }



 ?>
