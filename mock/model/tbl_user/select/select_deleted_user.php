<?php
  require '../../dbConfig.php';
  $sql ="SELECT * FROM tbl_user WHERE status=? ORDER BY id DESC";
  if (!empty($dbConn)) {
    $stmt =  $dbConn->prepare($sql);
    $stmt->bindValue(1, "deleted");
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
            <td class='access'>  $row[access] </td>
            <td class='status'>  $row[status] </td>

            <td>
            <button class='btn waves-effect fa fa-trash fa-lg green darken-2 delete_deleted_user'
            data-delete-deleted-id = '$row[id]'
            data-delete-deleted-access = '$row[access]'
            data-delete-deleted-status = '$row[status]'>
            </button>
            </td>

            <td>
            <button class='btn waves-effect fa fa-recycle fa-lg green darken-2 restore_deleted_user'
            data-restore-deleted-id = '$row[id]'
            data-restore-deleted-access = '$row[access]'
            data-restore-deleted-status = '$row[status]'>
            </button>
            </td>

            </tr>";
    }//end of foreach

  }//end of if

  else {
    //header location page 404
  }

  $dbConn = NULL;
 ?>
