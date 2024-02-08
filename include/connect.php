<?php
$server = "127.0.0.1:3307"; // If XAMPP is running on the same machine
$user = "root"; // default XAMPP username
$pass = ""; // default XAMPP password (empty by default)
$database = "absence"; // name of the database you want to connect to

try {
    // Attempt to establish a connection
    $conn = new mysqli($server, $user, $pass, $database);

    // Check connection
    if ($conn->connect_error) {
        throw new Exception("Connection failed: " . $conn->connect_error);
    } 
} catch (Exception $e) {
    // Handle connection errors
    die("Connection failed ");
}
?>