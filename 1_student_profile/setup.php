<!-- http://localhost/Lab_Works/student_crud/setup.php -->

<?php
$server = "localhost";
$username = "root";
$password = "";

// Connect to MySQL
$conn = new mysqli($server, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql = "CREATE DATABASE IF NOT EXISTS student_crud";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully or already exists.<br>";
} else {
    die("Error creating database: " . $conn->error);
}

// Select the database
$conn->select_db("student_crud");

// Create table if it does not exist
$table_sql = "CREATE TABLE IF NOT EXISTS students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    roll VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    dob DATE NOT NULL,
    gender VARCHAR(10) NOT NULL,
    department VARCHAR(100) NOT NULL,
    address TEXT NOT NULL
)";

if ($conn->query($table_sql) === TRUE) {
    echo "Table 'students' created successfully or already exists.<br>";
} else {
    echo "Error creating table: " . $conn->error;
}

// Close the connection
$conn->close();
?>
