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
              <button class='edit_instruction btn waves-effect fa fa-lg fa-pencil blue-grey darken-3' 
              data-edit-instruction-id='$row[id]'
              data-edit-instruction-name='$row[name]'
              
              data-edit-instruction-url='$row[url]'></button>
              </td>

              <td>
              <button class='delete_instruction btn waves-effect fa fa-lg fa-trash blue-grey darken-3'
              data-delete-instruction-id='$row[id]'></button>
              </td>

              <td>
              <a href='$row[url]' target='_blank' class='btn waves-effect fa fa-lg fa-eye blue-grey darken-3'></a>
              </td>

              </tr>";
    
    }//end of foreach

  }//end of if

  else {
    //header location page 404
  }

  $dbConn = NULL;
 ?>
