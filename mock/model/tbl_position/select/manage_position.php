
<?php
  require '../../dbConfig.php';
  $sql ="SELECT * FROM tbl_position";

  if (!empty($dbConn)) {
    $stmt =  $dbConn->prepare($sql);
    $stmt ->  execute();
    $table  = $stmt;

    
    foreach ($table as $row) {
    echo "<tr>
          <td class='hide'>  $row[id]  </td>
          <td class='name'>  $row[department]  </td>
          <td class='name'>  $row[position]  </td>

          <td>
            <a class='btn waves-effect delete_position blue-grey darken-3 fa fa-lg fa-trash' data-delete-position-id='$row[id]'></a>
          </td>
 
          </tr>";

     
    }//end of foreach
  }

 ?>
