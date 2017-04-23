<?php
  session_start();
  require '../../dbConfig.php';
  $email = $_SESSION['user_email'];
  $disapproved = "";

  $sql ="SELECT * FROM tbl_efile WHERE disapproved=? ORDER BY num DESC";
  if (!empty($dbConn)) {
    $stmt =  $dbConn->prepare($sql);
    $stmt->bindValue(1, $disapproved);
    $stmt ->  execute();
    $table  = $stmt;


    foreach ($table as $row) {
        $expload_to_array = explode("," , $row['pending_signatories']);
      if ( current($expload_to_array) ==  $email) {
        echo "<tr>

              <td class='efile'>  $row[doc_id]  </td>
              <td class='sender'>  $row[created_by] </td>
              <td class='signatories'>  $row[signatories] </td>

              <td><a href ='viewEfile.php?$row[doc_id]' target='_blank' class='btn waves-effect green darken-2'> View </a></td>

              <td>
                <button class='btn waves-effect green darken-2 reject_efile' data-reject-id='$row[doc_id]'>
                  Reject
                </button>
              </td>

              <td>
                <button class='btn waves-effect green darken-2 approve_efile' data-approve-id='$row[doc_id]'>
                  Approve
                </button>
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
