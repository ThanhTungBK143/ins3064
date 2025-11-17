<?php
// connection.php
// Edit these values for your environment
$db_host = '127.0.0.1';
$db_user = 'db_user';
$db_pass = 'db_pass';
$db_name = 'db_name';

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}
?>
