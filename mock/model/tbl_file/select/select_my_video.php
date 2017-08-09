<?php
  session_start();
  require '../../dbConfig.php';

  $url = $_SERVER['HTTP_HOST'];
  $validURL = str_replace("&","&amp;",$url);
  $email = $_SESSION['user_email'];

  $sql ="SELECT * FROM tbl_file ORDER BY num DESC";
  if (!empty($dbConn)) {
    $stmt =  $dbConn->prepare($sql);
    $stmt ->  execute();
    $table  = $stmt;


    foreach ($table as $row) {
      //convert to array
      if ($row['file_format'] == "video") {
        $signatories = explode("," , $row['signatories']);
        if (in_array($email, $signatories)  && $row['status'] == "published" || $row['created_by'] == $email && $row['status'] == "published" || $row['file_type'] == "public" && $row['status'] == "published") {
          echo "<tr>
          <td class='hide'>  $row[num]  </td>
          <td class='file_id'>  $row[file_id]  </td>
          <td class='file_type'>  $row[file_type]  </td>
          <td class='name'>  $row[proxy]  </td>
          <td class='signatories'>  $row[signatories]  </td>
          <td class='cb'>  $row[created_by]  </td>
          <td class='co'>  $row[created_on]  </td>
          <td class='po'>  $row[published_on]  </td>

          <td>
            <a class='btn waves-effect green darken-2' href='$row[orig_name]' target='_blank'>
              Watch
            </a>
          </td>

          </tr>";

        }//end of if
      }//end of if



    }//end of foreach

  }//end of if dbconn

  else {
    //header location page 404
  }

  $dbConn = NULL;
 ?>
