<?php
  session_start();
  require '../../dbConfig.php';

  $email = $_SESSION['user_email'];

  $sql ="SELECT * FROM tbl_efile ORDER BY num DESC";
  if (!empty($dbConn)) {
    $stmt =  $dbConn->prepare($sql);
    $stmt ->  execute();
    $table  = $stmt;


    foreach ($table as $row) {
      //convert to array
      $signatories = explode("," , $row['signatories']);
      if (in_array($email, $signatories)  && $row['status'] == "published" || $row['created_by'] == $email && $row['status'] == "published" || $row['doc_type'] == "public" && $row['status'] == "published") {
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
          <a class='btn waves-effect green darken-2' href='printEfile.php?$row[doc_id]' target='_blank'>
            Print
          </a>
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
