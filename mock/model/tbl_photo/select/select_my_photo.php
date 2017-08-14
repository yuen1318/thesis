<?php
  session_start();
  require '../../dbConfig.php';

  if (isset($_SESSION["user_email"]) ) {
      $email = $_SESSION['user_email'];
  }
  elseif (isset($_SESSION["admin_email"]) ) {
    $email = $_SESSION['admin_email'];
  }
  
  $path = "../../DB/myPhoto";
  $sql ="SELECT * FROM tbl_photo ORDER BY num DESC";
  if (!empty($dbConn)) {
    $stmt =  $dbConn->prepare($sql);
    $stmt ->  execute();
    $table  = $stmt;


    foreach ($table as $row) {
      //convert to array
      if ($row['created_by'] == $email) {
        echo 
            "
            <tr>
              <td class='hide'> $row[num] </td>

              <td class='photo_id'> $row[photo_id] </td>
              <td><img src='$path/$row[photo_id]' class='copy_img_url materialboxed circle' width='40px' height='40px'> </td>
              <td class='photo_name'> $row[photo_name] </td>
              <td class='co'> $row[created_on] </td>
              <td>
                <button class='btn waves-effect teal lighten-1 delete_photo' data-delete-photo-id='$row[photo_id]'>
                  Delete
                </button>
              </td>
 
              <td>
                <button class='btn waves-effect teal lighten-1 btn_copy_img' data-photo-path='$path/$row[photo_id]'>
                  Copy
                </button>
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
