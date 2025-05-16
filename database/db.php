<?php
$host = "localhost";  // Change if needed
$username = "root";  // Your DB username
$password = "";  // Your DB password
$database = "digigram";  // Your database name

$conn = new mysqli($host, $username, $password, $database);

// Check Connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
