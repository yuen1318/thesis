<?php
  require '../../dbConfig.php';
  $sql ="SELECT * FROM tbl_admin WHERE status=? ORDER BY id DESC";
  if (!empty($dbConn)) {
    $stmt =  $dbConn->prepare($sql);
    $stmt->bindValue(1, "active");
    $stmt ->  execute();
    $table  = $stmt;

    foreach ($table as $row) {
      echo "<tr>
            <td class='id'>  $row[id]  </td>
            <td class='name'>  $row[fn] $row[mn] $row[ln]  </td>

            <td class='email'>  $row[email] </td>
            <td class='gender'>  $row[gender] </td>

            <td class='mobile'>  $row[mobile] </td>
            <td class='department'>  $row[department] </td>
            <td class='title'>  $row[title] </td>
            <td class='status'>  $row[status] </td>

            <td>
            <button class='btn waves-effect fa fa-trash fa-lg blue-grey darken-3 delete_active_admin'
            data-delete-active-id = '$row[id]'
            data-delete-active-status = '$row[status]'>
            </button>
            </td>

            <td>
            <button class='btn waves-effect fa fa-pencil fa-lg blue-grey darken-3 edit_active_admin'
            data-edit-active-id = '$row[id]'
            </button>
            </td

            </tr>";
    }//end of foreach

  }//end of if

  else {
    //header location page 404
  }

  $dbConn = NULL;
 ?>
