<?php
  session_start();
  require '../../dbConfig.php';


  $sql ="SELECT * FROM tbl_instruction  ORDER BY id DESC";
  if (!empty($dbConn)) {
    $stmt =  $dbConn->prepare($sql);
    $stmt ->  execute();
    $table  = $stmt;

    foreach ($table as $row) {
     
        echo "<tr>
              <td class='hide id'>  $row[id]  </td>
              <td class='name'>  $row[name] </td>
              <td class='access'>  $row[access] </td>

              <td>
              <button class='btn waves-effect fa fa-lg fa-pencil blue-grey darken-3'></button>
              </td>

              <td>
              <button class='btn waves-effect fa fa-lg fa-trash blue-grey darken-3'></button>
              </td>

              </tr>";
    
    }//end of foreach

  }//end of if

  else {
    //header location page 404
  }

  $dbConn = NULL;
 ?>
