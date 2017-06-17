<?php
  session_start();
  require '../../dbConfig.php';


  if (isset($_SESSION['user_email']) ) {
    $owner = $_SESSION['user_email'];
    $department = $_SESSION['user_department'];
  }
  else if ( isset($_SESSION['admin_email']) ) {
    $owner = $_SESSION['admin_email'];
    $department = $_SESSION['admin_department'];
  }
  else {
    $owner = $_SESSION['sudo_email'];
    $department = $_SESSION['sudo_department'];
  }


  $sql ="SELECT * FROM tbl_template ORDER BY num DESC";
  if (!empty($dbConn)) {
    $stmt =  $dbConn->prepare($sql);
    $stmt ->  execute();
    $table  = $stmt;

    foreach ($table as $row) {
      if ($row['owner'] == $owner || $row['department']== $department) {
        echo "<tr>
              <td class='hide'>  $row[num]  </td>
              <td class='tmp_id'>  $row[tmp_id] </td>
              <td class='name'>  $row[name] </td>

              <td>
                <a href='useEfile.php?$row[tmp_id]' class='btn waves-effect green darken-2' target='_blank'>
                  <span class='fa fa-hand-pointer-o fa-lg'></span>
                </a>
              </td>

              </tr>";
      }//end of if

    }//end of foreach

  }//end of if

  else {
    //header location page 404
  }

  $dbConn = NULL;
 ?>
