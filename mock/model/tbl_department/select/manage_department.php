<?php
  require '../../dbConfig.php';
  $sql ="SELECT * FROM tbl_department";

  if (!empty($dbConn)) {
    $stmt =  $dbConn->prepare($sql);
    $stmt ->  execute();
    $table  = $stmt;

    
    foreach ($table as $row) {
    echo "<tr>
          <td class='hide'>  $row[id]  </td>
          <td class='name'>  $row[name]  </td>

          <td>
            <a class='btn waves-effect delete_department blue-grey darken-3 fa fa-lg fa-trash' data-delete-department-id='$row[id]' ></a>
          </td>

           <td>
            <a class='btn waves-effect  edit_department blue-grey darken-3 fa fa-lg fa-pencil' data-edit-department-id='$row[id]'></a>
          </td>

 
          </tr>";

     
    }//end of foreach
  }

 ?>
