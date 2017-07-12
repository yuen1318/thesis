<?php
  session_start();
  require '../../dbConfig.php';

  $url = $_SERVER['HTTP_HOST'];
  $validURL = str_replace("&","&amp;",$url);



  $email = $_SESSION['user_email'];

  $sql ="SELECT * FROM tbl_news ORDER BY num DESC";
  if (!empty($dbConn)) {
    $stmt =  $dbConn->prepare($sql);
    $stmt ->  execute();
    $list  = $stmt;


    foreach ($list as $row) {
      $signatories = explode("," , $row['signatories']);
      #if doc_id is efile
      if (strpos($row['doc_id'], 'efile') !== false) {
        #if your in the signatories list or if youre part of an action or you created it
        if (in_array($email, $signatories) || $row['email'] == $email || $row['created_by'] == $email) {
          echo "
          <li class='collection-item avatar'>
            <img src='../../DB/profile/$row[photo]' class='circle materialboxed' >
            <span class='title email'>$row[email]</span><br>
            <small>$row[date] at $row[time]</small><br><br>
            <p>$row[msg]</p>
            <p class='name'> Name: $row[name]</p>
            <p class='doc_id'>Document ID: $row[doc_id]</p>

            <p class='sgn'>List of Signatories:<br>$row[signatories]</p><br>
            <p class='p_sgn red-text'>List of Pending Signatories:<br>$row[pending_signatories]</p><br>
            <p class='a_sgn blue-text'>List of Approved Signatories:<br>$row[approved_signatories]</p>

            <a href='viewEfile.php?$row[doc_id]' class='secondary-content'><i class='fa fa-angle-right  fa-2x'></i></a>
          </li><br>

           ";
        }//end of if
      }//end of if





      #if doc_id is excel
      elseif (strpos($row['doc_id'], 'excel') !== false) {
          if (in_array($email, $signatories) || $row['email'] == $email || $row['created_by'] == $email) {
            echo "
            <li class='collection-item avatar'>
              <img src='../../DB/profile/$row[photo]' class='circle materialboxed' >
              <span class='title email'>$row[email]</span><br>
              <small>$row[date] at $row[time]</small><br><br>
              <p>$row[msg]</p>
              <p class='name'> Name: $row[name]</p>
              <p class='doc_id'>Document ID: $row[doc_id]</p>

              <p class='sgn'>List of Signatories:<br>$row[signatories]</p><br>
              <p class='p_sgn red-text'>List of Pending Signatories:<br>$row[pending_signatories]</p><br>
              <p class='a_sgn blue-text'>List of Approved Signatories:<br>$row[approved_signatories]</p>

              <a href='../../DB/excel/$row[doc_id]' target='_blank' class='secondary-content'><i class='fa fa-angle-right  fa-2x'></i></a>
            </li><br>

             ";
       }//end of if
     }//end of else if

     #if doc_id is powerpoint
     elseif (strpos($row['doc_id'], 'powerpoint') !== false) {
         if (in_array($email, $signatories) || $row['email'] == $email || $row['created_by'] == $email) {
           echo "
           <li class='collection-item avatar'>
             <img src='../../DB/profile/$row[photo]' class='circle materialboxed' >
             <span class='title email'>$row[email]</span><br>
             <small>$row[date] at $row[time]</small><br><br>
             <p>$row[msg]</p>
             <p class='name'> Name: $row[name]</p>
             <p class='doc_id'>Document ID: $row[doc_id]</p>

             <p class='sgn'>List of Signatories:<br>$row[signatories]</p><br>
             <p class='p_sgn red-text'>List of Pending Signatories:<br>$row[pending_signatories]</p><br>
             <p class='a_sgn blue-text'>List of Approved Signatories:<br>$row[approved_signatories]</p>

             <a href='../../DB/powerpoint/$row[doc_id]' target='_blank' class='secondary-content'><i class='fa fa-angle-right  fa-2x'></i></a>
           </li><br>

            ";
      }//end of if
    }//end of else if


    #if doc_id is video
    elseif (strpos($row['doc_id'], 'video') !== false) {
        if (in_array($email, $signatories) || $row['email'] == $email || $row['created_by'] == $email) {
          echo "
          <li class='collection-item avatar'>
            <img src='../../DB/profile/$row[photo]' class='circle materialboxed' >
            <span class='title email'>$row[email]</span><br>
            <small>$row[date] at $row[time]</small><br><br>
            <p>$row[msg]</p>
            <p class='name'> Name: $row[name]</p>
            <p class='doc_id'>Document ID: $row[doc_id]</p>

            <p class='sgn'>List of Signatories:<br>$row[signatories]</p><br>
            <p class='p_sgn red-text'>List of Pending Signatories:<br>$row[pending_signatories]</p><br>
            <p class='a_sgn blue-text'>List of Approved Signatories:<br>$row[approved_signatories]</p>

            <a href='viewVideo.php?$row[doc_id]' target='_blank' class='secondary-content'><i class='fa fa-angle-right  fa-2x'></i></a>
          </li><br>

           ";
     }//end of if
   }//end of else if




    }//end of foreach

  }//end of if

  else {
    //header location page 404
  }

  $dbConn = NULL;
 ?>
