<?php

$db_name = $_POST['db_name'];
$db_user = $_POST['db_user'];
$db_pass = $_POST['db_pass'];
$db_host = $_POST['db_host'];
$db_charset = $_POST['db_charset'];


$config_file = 'as-config.php';
$handle = fopen($config_file, 'w') or die('Cannot open file:  '.$config_file); //implicitly creates file
$data = <<<EOT
// Authentication System config file 

// Database Settings here

// Database Name 
define('DB_NAME', $db_name);

// Database User
define('DB_USER', $db_user);

// Database User password
define('DB_PASS', $db_pass);

// Database host
define('DB_HOST', $db_host);

// Database charset
define('DB_CHARSET', $db_charset);
EOT;
fwrite($handle, $data);


echo $data;

?>


