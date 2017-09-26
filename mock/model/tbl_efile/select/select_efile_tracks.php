<?php
  session_start();
  require '../../dbConfig.php';

  $sql ="SELECT * FROM tbl_efile_trgr ORDER BY num DESC";
  if (!empty($dbConn)) {
    $stmt =  $dbConn->prepare($sql);
    $stmt ->  execute();
    $table  = $stmt;


    foreach ($table as $row) {
 
        echo "<tr>
              <td class='num hide'>  $row[num]  </td>
              <td class='doc_id'>  $row[doc_id]  </td>
              <td class='name'>  $row[name]  </td>
              <td class=''> $row[pending_signatories] </td>
              <td class=''> $row[approved_signatories] </td>
              <td class=''> $row[disapproved] </td>
              <td class=''> $row[comment] </td>
              <td class=''> $row[status] </td>
              <td class=''> $row[action] </td>
              <td class='date'> $row[date_time] </td>
              </tr>";
    }//end of foreach

  }//end of if

  else {
    //header location page 404
  }

  $dbConn = NULL;
 ?>
