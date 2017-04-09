<?php
  require '../../dbConfig.php';
  $sql ="SELECT * FROM tbl_user WHERE access=? && status=? ORDER BY id DESC";
  if (!empty($dbConn)) {
    $stmt =  $dbConn->prepare($sql);
    $stmt->bindValue(1, "none");
    $stmt->bindValue(2, "pending");
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
            <button class='btn waves-effect fa fa-trash fa-lg green darken-2 delete_pending_user'
            data-delete-pending-id = '$row[id]'
            data-delete-pending-access = '$row[access]'
            data-delete-pending-status = '$row[status]'>
            </button>
            </td>

            <td>
            <button class='btn waves-effect fa fa-check fa-lg green darken-2 approve_pending_user'
            data-approve-pending-id = '$row[id]'
            data-approve-pending-access = '$row[access]'
            data-approve-pending-status = '$row[status]'>
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
