<?php
session_start();
require '../../model/dbConfig.php';

$email = $_SESSION["sudo_email"];

$sql = "UPDATE tbl_sudo SET flag=? WHERE email=?";
$stmt = $dbConn->prepare($sql);
$stmt->bindValue(1, "0");
$stmt->bindValue(2, $email);
$stmt->execute();

if($stmt){
    session_destroy();
    header("Location:index.php");
}
else{
    session_destroy();
    header("Location:index.php");
}



?>
