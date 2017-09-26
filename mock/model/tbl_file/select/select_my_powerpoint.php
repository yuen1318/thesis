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
      if ($row['file_format'] == "powerpoint") {
        $signatories = explode("," , $row['signatories']);
        if (in_array($email, $signatories)  && $row['status'] == "published" || $row['created_by'] == $email && $row['status'] == "published" || $row['file_type'] == "public" && $row['status'] == "published") {
          echo "<tr>
          <td class='hide'>  $row[num]  </td>
          <td class='file_id'>  $row[file_id]  </td>
          <td class='file_type'>  $row[file_type]  </td>
          <td class='name'>  $row[orig_name]  </td>
          <td class='signatories'>  $row[proxy_signatories]  </td>
          <td class='cb'>  $row[proxy_created]  </td>
          <td class='co'>  $row[created_on]  </td>
          <td class='po'>  $row[published_on]  </td>

          <td>
            <a class='btn waves-effect green darken-2' href='https://view.officeapps.live.com/op/view.aspx?src=$validURL/DB/powerpoint/$row[file_id]' target='_blank'>
              Print
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
