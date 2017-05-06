<?php
  session_start();
  require '../../dbConfig.php';

  $email = $_SESSION['user_email'];

  $sql ="SELECT * FROM tbl_efile WHERE  created_by=? ORDER BY num DESC";
  if (!empty($dbConn)) {
    $stmt =  $dbConn->prepare($sql);
    $stmt->bindValue(1, $email);
    $stmt ->  execute();
    $table  = $stmt;


    foreach ($table as $row) {
      if ($row['disapproved'] != "") {
        echo "<tr>
        <td class='hide'>  $row[num]  </td>
        <td class='doc_id'>  $row[doc_id]  </td>
        <td class='name'>  $row[name]  </td>
        <td class='disapproved'>  $row[disapproved]  </td>

        <td>
          <button class='btn waves-effect green darken-2 btn_reason' data-comment='$row[comment]'>
            View
          </button>
        </td>

        <td>
          <a class='btn waves-effect green darken-2' href='editEfile.php?$row[doc_id]' target='_blank'>
            Edit
          </a>
        </td>

        <td>
          <button class='btn waves-effect green darken-2 delete_efile' data-delete-id='$row[doc_id]'>
            Delete
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
