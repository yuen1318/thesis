<?php

session_start();
require '../../dbConfig.php';

$email = $_SESSION['user_email'];


  $sql ="SELECT * FROM tbl_file WHERE created_by=? ORDER BY num DESC";
  if (!empty($dbConn)) {
    $stmt =  $dbConn->prepare($sql);
    $stmt->bindValue(1, $email);
    $stmt ->  execute();
    $table  = $stmt;


    foreach ($table as $row) {
      if ($row['file_format'] == "powerpoint") {
        if ($row['pending_signatories']=="" && $row['disapproved']=="" && $row['comment']==""  && $row['published_on']=="") {
          echo "<tr>
          <td class='hide'>  $row[num]  </td>
          <td class='doc_id'>  $row[file_id]  </td>
          <td class='name'>  $row[orig_name]  </td>
          <td class='name'>  $row[approved_signatories]  </td>

          <td>
            <button class='btn waves-effect green darken-2 publish_powerpoint' data-publish-id='$row[file_id]'>
              Publish
            </button>
          </td>

          </tr>";
        }//end of if

      }//end of if





    }//end of foreach

  }//end of if

  else {
    //header location page 404
  }

  $dbConn = NULL;
 ?>
