<?php
  session_start();
  require '../../dbConfig.php';
  $path = "../../DB/profile";
  $email = $_SESSION['user_email'];

  $sql ="SELECT * FROM tbl_user WHERE status=? && email != ? ORDER BY id DESC";
  if (!empty($dbConn)) {
    $stmt =  $dbConn->prepare($sql);
    $stmt->bindValue(1, "active");
    $stmt->bindValue(2, $email);
    $stmt -> execute();
    $table  = $stmt;


    foreach ($table as $row) {
      echo "<tr>
            <td class='id hide'>  $row[id] </td>

            <td>
            <input type='checkbox' class='filled-in checkbox-green' id='$row[email]' value='$row[email]'/>
            <label for='$row[email]'></label>
            </td>


            <td class='email'>  $row[email] </td>


            <td><img src= '$path/$row[photo]' class='materialboxed circle' width='40px' height='40px'>  </td>
            <td class='name'>  $row[fn] $row[mn] $row[ln]  </td>

            <td class='title'>  $row[title] </td>
            <td class='department'>  $row[department] </td>

            </tr>";
    }//end of foreach

  }//end of if

  else {
    //header location page 404
  }

  $dbConn = NULL;
 ?>
