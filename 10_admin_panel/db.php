<?php
$servername = "localhost";
$username = "root";  // Default username for XAMPP MySQL
$password = "";      // Default password for XAMPP MySQL
$dbname = "admin_panel_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
