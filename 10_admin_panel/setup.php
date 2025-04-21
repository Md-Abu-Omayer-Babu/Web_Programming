<?php
$servername = "localhost";
$username = "root";  // Default username for XAMPP MySQL
$password = "";      // Default password for XAMPP MySQL
$dbname = "admin_panel_db";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database if it does not exist
$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully.<br>";
} else {
    echo "Error creating database: " . $conn->error;
}

// Now connect to the new database
$conn->select_db($dbname);

// Create users table if it does not exist
$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    echo "Table users created successfully.<br>";
} else {
    echo "Error creating table: " . $conn->error;
}

// Insert an admin user if the table is empty
$result = $conn->query("SELECT COUNT(*) FROM users");
$row = $result->fetch_row();
if ($row[0] == 0) {
    $admin_username = "admin";
    $admin_password = password_hash("admin123", PASSWORD_BCRYPT);  // Hashing the password
    $conn->query("INSERT INTO users (username, password) VALUES ('$admin_username', '$admin_password')");
    echo "Admin user created with username: $admin_username and password: admin123<br>";
} else {
    echo "Admin user already exists.<br>";
}

$conn->close();
?>
