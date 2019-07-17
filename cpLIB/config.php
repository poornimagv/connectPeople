<?php

// DB Credentials
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'connectppl');


// Establish database connection
try {
	$db_con = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER,DB_PASS);
} catch (PDOException $e){
  exit("Error: ".$e->getMessage());
}
include_once 'functions.php';
$cppl = new rstClass($db_con);

?>
