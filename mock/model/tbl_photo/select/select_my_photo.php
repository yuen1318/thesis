<?php
  session_start();
  require '../../dbConfig.php';


  $email = $_SESSION['user_email'];
  $path = "../../DB/myPhoto";
  $sql ="SELECT * FROM tbl_photo ORDER BY num DESC";
  if (!empty($dbConn)) {
    $stmt =  $dbConn->prepare($sql);
    $stmt ->  execute();
    $table  = $stmt;


    foreach ($table as $row) {
      //convert to array
      if ($row['created_by'] == $email) {
        echo "<tr>
        <td class='hide'>  $row[num]  </td>
        <td>  <img src= '$path/$row[photo_id]' class='materialboxed circle' width='40px' height='40px'>  </td>
        <td class='file_id'>  $row[photo_id]  </td>
        <td class='name'>  $row[photo_name]  </td>
        <td class='co'>  $row[created_on]  </td>
        <td>
          <a class='btn waves-effect green darken-2' href='https://view.officeapps.live.com/op/view.aspx?src=' target='_blank'>
            Print
          </a>
        </td>

        </tr>";

      }//end of if

    }//end of foreach

  }//end of if dbconn

  else {
    //header location page 404
  }

  $dbConn = NULL;
 ?>
