<?php
  require '../../dbConfig.php';
  $sql ="SELECT * FROM tbl_user WHERE access=? && status=? ORDER BY id DESC";
  if (!empty($dbConn)) {
    $stmt =  $dbConn->prepare($sql);
    $stmt->bindValue(1, "user");
    $stmt->bindValue(2, "active");
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
            <button class='btn waves-effect fa fa-trash fa-lg green darken-2 delete_active_user'
            data-delete-active-id = '$row[id]'
            data-delete-active-access = '$row[access]'
            data-delete-active-status = '$row[status]'>
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
