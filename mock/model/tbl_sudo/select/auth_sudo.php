<?php

require '../../dbConfig.php';

require '../../a_functions/sanitize.php';

$email = sanitize($_POST["email"]);
$password = sanitize($_POST["password"]);

// check if email exist in the database

$sql = "SELECT * FROM tbl_sudo WHERE email=?";
$stmt = $dbConn->prepare($sql);
$stmt->bindValue(1, $email);
$stmt->execute();
$count = $stmt->rowCount();

if ($count == 1){ //if email exist extract info and store it in variable
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	$stored_email = $row['email'];
	$stored_password = $row['pw'];
    $stored_status = $row['status'];
	// check if the given password match
	if (password_verify($password, $stored_password) && $stored_status == "active")
		{
		session_start();
		$_SESSION['sudo_email'] = $stored_email;
		$_SESSION['sudo_password'] = $stored_password;
		// not working because of ajax :
		// header("Location:../../view/user/Admin/index.php");
		// use location.href instead in the controller

		echo "sudo";
		} //end of if
	  else
		{
		echo "mali";
		} //end of else
	} //end of if

	else{
		echo "mali";
	}

?>