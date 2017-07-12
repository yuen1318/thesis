<?php

session_start();
require '../../dbConfig.php';


$email = $_SESSION["admin_email"];




  if ( isset($_FILES["uploaded_img"]) ) {

    $uploaded_img_size = $_FILES["uploaded_img"]['size'];

    if ($uploaded_img_size <= 2000000) {
      //uploaded image send via form

      $uploaded_img = $_FILES["uploaded_img"];
      //uploaded image properties
      $uploaded_img_error = $uploaded_img["error"];
      $uploaded_img_name = $uploaded_img["name"];
      $uploaded_img_tmp = $uploaded_img["tmp_name"];


      //first explode to seperate name from extension then get the end word then make them to small letters
      $uploaded_img_ext = explode(".", $uploaded_img["name"])  ;
      $uploaded_img_ext = end($uploaded_img_ext);

      $allowed_ext = array("jpg");


      #if $uploaded_img_error === 0 then no error occured
      if ($uploaded_img_error === 0) {
        //create new image name
        $new_img_name = $email.".jpg";
        //create path with the new name
        $upload_path_with_img = "../../../DB/profile/".$new_img_name;

        //get the size of the temporary image file
        list($width,$height) = getimagesize($uploaded_img_tmp);

        $new_img = imagecreatefromjpeg($uploaded_img_tmp);



        //give the new width you want
        $new_width = 400;
        //use this to maintain aspect ratio of image
        $new_height = ($height/$width)*400;
        //here we make the new image in this temporary img file
        $new_tmp_img = imagecreatetruecolor($new_width,$new_height);

        imagecopyresampled($new_tmp_img,$new_img  ,0,0,0,0, $new_width,$new_height, $width,$height);


        imagejpeg($new_tmp_img,$upload_path_with_img,100);

        #query to database
        $sql = "UPDATE tbl_admin SET photo=? WHERE email=?";

        $stmt = $dbConn->prepare($sql);
        $stmt->bindValue(1, $email.".jpg");
        $stmt->bindValue(2, $email);
        $stmt->execute();

        $_SESSION["admin_photo"] = $email.".jpg";

        echo "success";
      }

      else {
        echo "big";
      }

    }//end of if

    else {
      echo "big";
    }


  }//end of if-isset







 ?>
