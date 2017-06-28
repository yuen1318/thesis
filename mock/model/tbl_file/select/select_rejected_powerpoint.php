<?php
  session_start();
  require '../../dbConfig.php';

  $email = $_SESSION['user_email'];

  $sql ="SELECT * FROM tbl_file WHERE  created_by=? ORDER BY num DESC";
  if (!empty($dbConn)) {
    $stmt =  $dbConn->prepare($sql);
    $stmt->bindValue(1, $email);
    $stmt ->  execute();
    $table  = $stmt;


    foreach ($table as $row) {
      if ($row['file_format'] == "powerpoint") {
        if ($row['disapproved'] != "") {
          echo "<tr>
          <td class='hide'>  $row[num]  </td>
          <td class='doc_id'>  $row[file_id]  </td>
          <td class='name'>  $row[orig_name]  </td>
          <td class='disapproved'>  $row[disapproved]  </td>

          <td>
            <button class='btn waves-effect green darken-2 btn_reason' data-comment='$row[comment]'>
              View
            </button>
          </td>

          <td>
          <button class='btn waves-effect green darken-2 edit_powerpoint' data-edit-id='$row[file_id]'>
            Edit
          </button>
          </td>

          <td>
            <button class='btn waves-effect green darken-2 delete_powerpoint' data-delete-id='$row[file_id]'>
              Delete
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
