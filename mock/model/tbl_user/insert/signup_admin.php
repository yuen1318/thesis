<?php
  require '../../dbConfig.php';
  require '../../a_functions/sanitize.php';

  $fn = ucwords(sanitize($_POST['fn']));
  $ln = ucwords(sanitize($_POST['ln']));
  $mn = ucwords(sanitize($_POST['mn']));
  $email = sanitize($_POST['email']);
  $password = sanitize($_POST['rpassword']);
  $gender = sanitize($_POST['gender']);
  $mobile = sanitize($_POST['mobile']);
  $department = sanitize($_POST['department']);
  $title = ucwords(sanitize($_POST['title']));

  $photo = "default.jpg";
  $pass_encrypt = password_hash($password, PASSWORD_DEFAULT);
  $status = "pending";

  $sql1 = "SELECT * FROM tbl_admin WHERE email=?";
  $sql2 = "INSERT INTO tbl_admin(fn,ln,mn,email,pw,gender,mobile,department,title,photo,status) VALUES(?,?,?,?,?,?,?,?,?,?,?)";


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
        $stmt->bindValue(1, $fn);
        $stmt->bindValue(2, $ln);
        $stmt->bindValue(3, $mn);
        $stmt->bindValue(4, $email);
        $stmt->bindValue(5, $pass_encrypt);
        $stmt->bindValue(6, $gender);
        $stmt->bindValue(7, $mobile);
        $stmt->bindValue(8, $department);
        $stmt->bindValue(9, $title);
        $stmt->bindValue(10, $photo);
        $stmt->bindValue(11, $status);
        $stmt->execute();
          if ($stmt) {
            #put signature to directory folder
            $data_uri = $_POST['siginput'];
            $encoded_image = explode(",", $data_uri)[1];
            $decoded_image = base64_decode($encoded_image);
            file_put_contents("../../../DB/signature/" .$email. ".png", $decoded_image);
            echo "success";
          }
      }#end of else

    } catch (Exception $e) {
      #header location error 404
    }#end of try catch
  }#end of if

 ?>
