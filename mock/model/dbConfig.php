<?php
date_default_timezone_set('Asia/Manila');
    $host = 'localhost';
    $dbname= 'mock';
    $un = 'root';
    $pw = '';

    try {
      $dbConn = new PDO("mysql:host=" .$host. ";dbname=" .$dbname. ";charset=utf8", $un, $pw);
      $dbConn ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $dbConn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }
    catch (PDOException $e) {
      throw new Exception($e->getMessage());
    }
 ?>
