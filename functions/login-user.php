<?php 

include '../as-config.php';

global $db_con;
$password = $_POST['password'];
$email = $_POST['email'];

$db_con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if (mysqli_connect_error()) {
    die('Connect Error (' . mysqli_connect_errno() . ') '
            . mysqli_connect_error());
}

$entry_exist = $db_con->query('SELECT password FROM as_user WHERE email="'. $email .'"');
$row_entry = $entry_exist->fetch_assoc();
$password_hash = $row_entry['password'];

if ($password_hash) {
	
	if (password_verify($password, $password_hash)) {
		echo 'true';
		// Start session and so on..	
	} else {
		echo 'false';	
	}
	
} else { 

	echo 'false';
	
}
	



?>