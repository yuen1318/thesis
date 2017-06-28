<?php
  session_start();
  require 'session.php';
  require '..\..\model\dbConfig.php';
  #get the template id from url
  $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
  $validURL = str_replace("&","&amp;",$url);
  $doc_id = parse_url($validURL, PHP_URL_QUERY);

  $sql ="SELECT * FROM tbl_file WHERE file_id=?";

    $stmt =  $dbConn->prepare($sql);
    $stmt->bindValue(1, $doc_id);
    $stmt ->  execute();

    $count = $stmt->rowCount();

    if($count == 1){#if email exist extract info and store it in variable
      $row = $stmt->fetch(PDO::FETCH_ASSOC);
      $content = $row['orig_name'];
    }

    header("Location:".$content)
 ?>
