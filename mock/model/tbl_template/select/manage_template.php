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


  $sql ="SELECT * FROM tbl_template  ORDER BY num DESC";
  if (!empty($dbConn)) {
    $stmt =  $dbConn->prepare($sql);
    $stmt ->  execute();
    $table  = $stmt;

    foreach ($table as $row) {
      if ($row['owner'] == $owner) {
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
              delete_template' data-delete-template-id = '$row[tmp_id]'
              </button>
              </td>

              </tr>";
      }

      if ($row['department'] == $department) {
        echo "<tr>
              <td class='hide'>  $row[num]  </td>
              <td class='tmp_id'>  $row[tmp_id] </td>
              <td class='name'>  $row[name] </td>

              <td>
                Global Template
              </td>

              <td>
                Protected
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
