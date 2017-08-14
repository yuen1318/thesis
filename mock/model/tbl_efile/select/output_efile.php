<?php
  session_start();
  require '../../dbConfig.php';

    if (isset($_SESSION["admin_email"])) {
          $email = $_SESSION['admin_email'];
    }
    elseif (isset($_SESSION["sudo_email"])) {
        $email = $_SESSION['sudo_email'];
    }
    else{
        echo "error session";
    }

  $sql ="SELECT * FROM tbl_efile ORDER BY num DESC";
  if (!empty($dbConn)) {
    $stmt =  $dbConn->prepare($sql);
    $stmt ->  execute();
    $table  = $stmt;

    foreach ($table as $row) {
      if ($row['status'] == "published") {
        if(isset($_SESSION["admin_email"])){
          echo "<tr>
          <td class='hide'>  $row[num]  </td>
          <td class='doc_id'>  $row[doc_id]  </td>
          <td class='name'>  $row[name]  </td>
          <td class='doc_type'>  $row[doc_type]  </td>
          <td class='signatories'>  $row[signatories]  </td>
          <td class='cb'>  $row[created_by]  </td>
          <td class='co'>  $row[created_on]  </td>
          <td class='po'>  $row[published_on]  </td>
          <td>
            <a class='btn waves-effect teal lighten-1' href='printEfile.php?$row[doc_id]' target='_blank'>
              Print
            </a>
          </td>
          </tr>";
        }//end of if

        else if(isset($_SESSION["sudo_email"])){
          echo "<tr>
          <td class='hide'>  $row[num]  </td>
          <td class='doc_id'>  $row[doc_id]  </td>
          <td class='name'>  $row[name]  </td>
          <td class='doc_type'>  $row[doc_type]  </td>
          <td class='signatories'>  $row[signatories]  </td>
          <td class='cb'>  $row[created_by]  </td>
          <td class='co'>  $row[created_on]  </td>
          <td class='po'>  $row[published_on]  </td>
          <td>
            <a class='btn waves-effect blue-grey darken-3' href='printEfile.php?$row[doc_id]' target='_blank'>
              Print
            </a>
          </td>
          </tr>";
        }




      }


    }//end of foreach

  }//end of if

  else {
    //header location page 404
  }

  $dbConn = NULL;
 ?>
