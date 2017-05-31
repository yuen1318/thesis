<?php
  session_start();
  require '../../dbConfig.php';

  $email = $_SESSION['user_email'];

  $sql ="SELECT * FROM tbl_news ORDER BY num DESC";
  if (!empty($dbConn)) {
    $stmt =  $dbConn->prepare($sql);
    $stmt ->  execute();
    $list  = $stmt;


    foreach ($list as $row) {
      $signatories = explode("," , $row['signatories']);
      if (in_array($email, $signatories) || $row['email'] == $email || $row['created_by'] == $email) {
        echo "
        <li class='collection-item avatar'>
          <img src='../../DB/profile/$row[photo]' class='circle materialboxed' >
          <span class='title email'>$row[email]</span><br>
          <small>$row[date] at $row[time]</small><br><br>
          <p>$row[msg]</p>
          <p class='name'> Name: $row[name]</p>
          <p class='doc_id'>Document ID: $row[doc_id]</p>

          <p class='sgn'>List of Signatories:<br>$row[signatories]</p>
          <p class='p_sgn'>List of Pending Signatories:<br>$row[pending_signatories]</p>
          <p class='a_sgn'>List of Approved Signatories:<br>$row[approved_signatories]</p>

          <a href='viewEfile.php?$row[doc_id]' class='secondary-content'><i class='fa fa-send fa-lg'></i></a>
        </li><br>

         ";
      }//end of if





    }//end of foreach

  }//end of if

  else {
    //header location page 404
  }

  $dbConn = NULL;
 ?>
