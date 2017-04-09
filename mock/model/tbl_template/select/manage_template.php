<?php
  session_start();
  require '../../dbConfig.php';
  $owner = $_SESSION['user_email'];

  $sql ="SELECT * FROM tbl_template WHERE owner=?  ORDER BY num DESC";
  if (!empty($dbConn)) {
    $stmt =  $dbConn->prepare($sql);
    $stmt->bindValue(1, $owner);
    $stmt ->  execute();
    $table  = $stmt;

    foreach ($table as $row) {
      echo "<tr>
            <td class='hide'>  $row[num]  </td>
            <td class='tmp_id'>  $row[tmp_id] </td>
            <td class='name'>  $row[name] </td>

            <td>
              <a href='editTemplate.php?$row[tmp_id]' class='btn waves-effect green darken-2' target='_blank'>
                <span class='fa fa-edit fa-lg'></span>
              </a>
            </td>

            <td>
            <button class='btn waves-effect fa fa-trash fa-lg green darken-2
            delete_active_user'data-delete-active-id = '$row[tmp_id]'
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
