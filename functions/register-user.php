<?php
include '../as-config.php';
header('HTTP/1.1 200 OK');

$gender = $_POST['gender'];
$name = $_POST['name'];
$email = $_POST['email'];
$pass = $_POST['password'];

$pass_hash = password_hash($pass, PASSWORD_BCRYPT);

global $db_con;

$db_con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if (mysqli_connect_error()) {
    die('Connect Error (' . mysqli_connect_errno() . ') '
            . mysqli_connect_error());
}

$table_exist = $db_con->query('SELECT 1 from as_user');

if ($table_exist) {  

$db_con->query('INSERT INTO as_user (username, password, email, gender, register_date, user_state) VALUES ( "'. $name .'", "'. $pass_hash .'", "'. $email .'", "'. $gender .'", '. time() .', "email_confirm")');
echo "User has been created, an email has been sent to " . $email . ". Please confirm.";

} else {

}

?>
