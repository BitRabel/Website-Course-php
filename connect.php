<?php
$host = "localhost";
$user = "root";
$pass = "Aditya@09"; // use the new password set
$db = "login"; 

$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Failed to connect DB: " . $conn->connect_error);
}
echo "Connected successfully";
?>
`