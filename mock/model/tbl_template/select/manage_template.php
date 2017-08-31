<?php
  session_start();
  require '../../dbConfig.php';


 
    $department = $_SESSION['admin_department'];


  $sql ="SELECT * FROM tbl_template WHERE department =? ORDER BY num DESC";
  if (!empty($dbConn)) {
    $stmt =  $dbConn->prepare($sql);
    $stmt->bindValue(1, $department);
    $stmt ->  execute();
    $table  = $stmt;

    foreach ($table as $row) {
     
        echo "<tr>
              <td class='hide'>  $row[num]  </td>
              <td class='tmp_id'>  $row[tmp_id] </td>
              <td class='name'>  $row[name] </td>
              <td class=''>  $row[department] </td>

              <td>
                <a href='editTemplate.php?$row[tmp_id]' class='btn waves-effect teal lighten-1' target='_blank'>
                  <span class='fa fa-edit fa-lg'></span>
                </a>
              </td>

              <td>
              <button class='btn waves-effect fa fa-trash fa-lg teal lighten-1
              delete_template' data-delete-template-id = '$row[tmp_id]'
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
