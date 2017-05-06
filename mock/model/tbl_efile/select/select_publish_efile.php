<?php

session_start();
require '../../dbConfig.php';

$email = $_SESSION['user_email'];


  $sql ="SELECT * FROM tbl_efile WHERE created_by=? ORDER BY num DESC";
  if (!empty($dbConn)) {
    $stmt =  $dbConn->prepare($sql);
    $stmt->bindValue(1, $email);
    $stmt ->  execute();
    $table  = $stmt;


    foreach ($table as $row) {
      if ($row['pending_signatories']=="" && $row['disapproved']=="" && $row['comment']=="" ) {
        echo "<tr>
        <td class='hide'>  $row[num]  </td>
        <td class='doc_id'>  $row[doc_id]  </td>
        <td class='name'>  $row[name]  </td>
        <td class='name'>  $row[approved_signatories]  </td>

        <td>
          <a class='btn waves-effect green darken-2' href='publishEfile.php?$row[doc_id]' target='_blank'>
            Publish
          </a>
        </td>

        </tr>";
      }





    }//end of foreach

  }//end of if

  else {
    //header location page 404
  }

  $dbConn = NULL;
 ?>
