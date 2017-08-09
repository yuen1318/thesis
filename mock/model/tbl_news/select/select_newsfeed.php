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
            echo "<tr>
              <td class='hide '>$row[num]</td>
              <td><img src='../../DB/profile/$row[photo]' class='circle materialboxed' style='width:70px !important; height:70px !important;'></td>
              <td class='email'>$row[email] <br> <small>$row[date] at $row[time]</small> </td>
              <td>$row[msg]</td>
              <td class='doc_id'>$row[doc_id] </td>
              <td class='name'>$row[name]</td>   
              <td>$row[signatories]</td>
              <td class='red-text'>$row[pending_signatories]</td>
              <td class='blue-text'>$row[approved_signatories]</td>
              <td><a href='viewEfile.php?$row[doc_id]' class='secondary-content'><i class='fa fa-angle-right  fa-2x'></i></a></td>
              </tr>";

        }//end of if
      }//end of if





      #if doc_id is excel
      elseif (strpos($row['doc_id'], 'excel') !== false) {
          if (in_array($email, $signatories) || $row['email'] == $email || $row['created_by'] == $email) {
              echo "<tr>
                <td class='hide '>$row[num]</td>
                <td><img src='../../DB/profile/$row[photo]' class='circle materialboxed' style='width:70px !important; height:70px !important;'></td>
                <td class='email'>$row[email] <br> <small>$row[date] at $row[time]</small> </td>
                <td>$row[msg]</td>
                <td class='doc_id'>$row[doc_id] </td>
                <td class='name'>$row[name]</td>   
                <td>$row[signatories]</td>
                <td class='red-text'>$row[pending_signatories]</td>
                <td class='blue-text'>$row[approved_signatories]</td>
                <td><a href='../../DB/excel/$row[doc_id]' target='_blank' class='secondary-content'><i class='fa fa-angle-right  fa-2x'></i></a></td>
                </tr>";
       }//end of if
     }//end of else if

     #if doc_id is powerpoint
     elseif (strpos($row['doc_id'], 'powerpoint') !== false) {
         if (in_array($email, $signatories) || $row['email'] == $email || $row['created_by'] == $email) {
              echo "<tr>
                <td class='hide '>$row[num]</td>
                <td><img src='../../DB/profile/$row[photo]' class='circle materialboxed' style='width:70px !important; height:70px !important;'></td>
                <td class='email'>$row[email] <br> <small>$row[date] at $row[time]</small> </td>
                <td>$row[msg]</td>
                <td class='doc_id'>$row[doc_id] </td>
                <td class='name'>$row[name]</td>   
                <td>$row[signatories]</td>
                <td class='red-text'>$row[pending_signatories]</td>
                <td class='blue-text'>$row[approved_signatories]</td>
                <td><a href='../../DB/powerpoint/$row[doc_id]' target='_blank' class='secondary-content'><i class='fa fa-angle-right  fa-2x'></i></a></td>
                </tr>";
      }//end of if
    }//end of else if

 
    #if doc_id is video
    elseif (strpos($row['doc_id'], 'video') !== false) {
        if (in_array($email, $signatories) || $row['email'] == $email || $row['created_by'] == $email) {
  
          echo "<tr>
                <td class='hide '>$row[num]</td>
                <td><img src='../../DB/profile/$row[photo]' class='circle materialboxed' style='width:70px !important; height:70px !important;'></td>
                <td class='email'>$row[email] <br> <small>$row[date] at $row[time]</small> </td>
                <td>$row[msg]</td>
                <td class='doc_id'>$row[doc_id] </td>
                <td class='name'>$row[name]</td>   
                <td>$row[signatories]</td>
                <td class='red-text'>$row[pending_signatories]</td>
                <td class='blue-text'>$row[approved_signatories]</td>
                <td><a href='viewVideo.php?$row[doc_id]' target='_blank' class='secondary-content'><i class='fa fa-angle-right  fa-2x'></i></a></td>
                </tr>";
     }//end of if
   }//end of else if




    }//end of foreach

  }//end of if

  else {
    //header location page 404
  }

  $dbConn = NULL;
 ?>
