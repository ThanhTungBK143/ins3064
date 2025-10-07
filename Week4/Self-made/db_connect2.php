<?php
$servername = "localhost";
$username = "root";
$password = ""; // leave empty for Laragon
$dbname = "login_demo"; // your database name from phpMyAdmin

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_errno) {
    die("Connection failed: " . $conn->connect_error);
}
?>
