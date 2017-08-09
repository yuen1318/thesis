<?php
  require '../../dbConfig.php';
  require '../../a_functions/sanitize.php';


  $email = sanitize($_POST['email']);
  $password = sanitize($_POST['rpassword']);
  $pass_encrypt = password_hash($password, PASSWORD_DEFAULT);
  $status = "pending";

  $sql1 = "SELECT * FROM tbl_sudo WHERE email=?";
  $sql2 = "INSERT INTO tbl_sudo(email,pw,status) VALUES(?,?,?)";


  if(isset($email)
  && isset($pass_encrypt)){
    try {

      $stmt = $dbConn->prepare($sql1);
      $stmt->bindValue(1, $email);
      $stmt->execute();
      $count = $stmt->rowCount();
      if ($count > 0){#if there is an existing email
        echo "error";
      }#end of try

      else{#insert user
        $stmt = $dbConn->prepare($sql2);
        $stmt->bindValue(1, $email);
        $stmt->bindValue(2, $pass_encrypt);
        $stmt->bindValue(3, $status);
        $stmt->execute();
          if ($stmt) {
            echo "success";
          }
      }#end of else

    } catch (Exception $e) {
        throw new Exception($e->getMessage());
      #header location error 404
    }#end of try catch
  }#end of if

 ?>
