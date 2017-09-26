<?php
  session_start();
  require '../../dbConfig.php';
  $email = $_SESSION['user_email'];
  $disapproved = "";

  $url = $_SERVER['HTTP_HOST'];
  $validURL = str_replace("&","&amp;",$url);


  $sql ="SELECT * FROM tbl_file WHERE disapproved=? ORDER BY num DESC";
  if (!empty($dbConn)) {
    $stmt =  $dbConn->prepare($sql);
    $stmt->bindValue(1, $disapproved);
    $stmt ->  execute();
    $table  = $stmt;


    foreach ($table as $row) {
      if ($row['file_format'] == "video") {
        $expload_to_array = explode("," , $row['pending_signatories']);
        if ( current($expload_to_array) ==  $email) {
          echo "<tr>

                <td class='video'>  $row[file_id]  </td>
                <td class='name'>  $row[orig_name]  </td>
                <td class='sender'>  $row[proxy_created_] </td>
                <td class='signatories'>  $row[proxy_signatories] </td>

                <td><a href ='$row[orig_name]' target='_blank' class='btn waves-effect green darken-2'> View </a></td>

                <td>
                  <button class='btn waves-effect green darken-2 reject_video' data-reject-id='$row[file_id]'>
                    Reject
                  </button>
                </td>

                <td>
                  <button class='btn waves-effect green darken-2 approve_video' data-approve-id='$row[file_id]'>
                    Approve
                  </button>
                </td>

                </tr>";
        }//end of if

      }//end of if
    }//end of foreach

  }//end of if

  else {
    //header location page 404
  }

  $dbConn = NULL;
 ?>
