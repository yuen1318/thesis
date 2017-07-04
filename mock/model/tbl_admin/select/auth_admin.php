	

<?php
require '../../dbConfig.php';

require '../../a_functions/sanitize.php';

$email = sanitize($_POST["email"]);
$password = sanitize($_POST["password"]);

// check if email exist in the database

$sql = "SELECT * FROM tbl_admin WHERE email=?";
$stmt = $dbConn->prepare($sql);
$stmt->bindValue(1, $email);
$stmt->execute();
$count = $stmt->rowCount();

if ($count == 1)
	{ //if email exist extract info and store it in variable
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	$stored_id = $row['id'];
	$stored_fn = $row['fn'];
	$stored_ln = $row['ln'];
	$stored_mn = $row['mn'];
	$stored_email = $row['email'];
	$stored_password = $row['pw'];
	$stored_gender = $row['gender'];
	$stored_mobile = $row['mobile'];
	$stored_department = $row['department'];
	$stored_title = $row['title'];
	$stored_photo = $row['photo'];
	$stored_status = $row['status'];
	// check if the given password match
	if (password_verify($password, $stored_password) && $stored_status == "active")
		{
		session_start();
		$_SESSION['admin_id'] = $stored_id;
		$_SESSION['admin_fn'] = $stored_fn;
		$_SESSION['admin_ln'] = $stored_ln;
		$_SESSION['admin_mn'] = $stored_mn;
		$_SESSION['admin_email'] = $stored_email;
		$_SESSION['admin_password'] = $stored_password;
		$_SESSION['admin_gender'] = $stored_gender;
		$_SESSION['admin_mobile'] = $stored_mobile;
		$_SESSION['admin_department'] = $stored_department;
		$_SESSION['admin_title'] = $stored_title;
		$_SESSION['admin_photo'] = $stored_photo;
		$_SESSION['admin_status'] = $stored_status;
		// not working because of ajax :
		// header("Location:../../view/user/Admin/index.php");
		// use location.href instead in the controller

		echo "admin";
		} //end of if
	  else
		{
		echo "mali";
		} //end of else
	} //end of if

?>