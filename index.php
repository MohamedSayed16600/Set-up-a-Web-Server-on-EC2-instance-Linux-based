<?php
$server = 'localhost';
$username = 'web_user';
$password = 'StrongPassword123#';
$dbname = 'web_db';

$conn = new mysqli($server, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$time = date("Y-m-d H:i:s");
$ip = $_SERVER['REMOTE_ADDR'];

echo "Hello! Your IP is $ip. Current server time is $time.";
$conn->close();
?>

