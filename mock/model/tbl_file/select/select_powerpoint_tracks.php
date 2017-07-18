<?php
  session_start();
  require '../../dbConfig.php';

  $sql ="SELECT * FROM tbl_file_trgr ORDER BY num DESC";
  if (!empty($dbConn)) {
    $stmt =  $dbConn->prepare($sql);
    $stmt ->  execute();
    $table  = $stmt;


    foreach ($table as $row) {
        if (strpos($row['file_id'], 'powerpoint') !== false) {
              echo "<tr>
              <td class='num hide'>  $row[num]  </td>
              <td class='file_id'>  $row[file_id]  </td>
              <td class='name'>  $row[orig_name]  </td>
              <td class=''> $row[pending_signatories] </td>
              <td class=''> $row[approved_signatories] </td>
              <td class=''> $row[disapproved] </td>
              <td class=''> $row[comment] </td>
              <td class=''> $row[status] </td>
              <td class=''> $row[action] </td>
              <td class=''> $row[date_time] </td>
              </tr>";
        }

    }//end of foreach

  }//end of if

  else {
    //header location page 404
  }

  $dbConn = NULL;
 ?>
