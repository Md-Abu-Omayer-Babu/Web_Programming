<?php
$host = "localhost";
$user = "root";
$pass = "";

$conn = new mysqli($host, $user, $pass);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$conn->query("CREATE DATABASE IF NOT EXISTS lab_works");
$conn->select_db("lab_works");

$conn->query("CREATE TABLE IF NOT EXISTS employees (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100),
  emp_id VARCHAR(20),
  email VARCHAR(100),
  phone VARCHAR(20),
  department VARCHAR(50),
  designation VARCHAR(50),
  gender VARCHAR(10),
  address TEXT
)");

echo "Database and table created successfully!";
$conn->close();
?>
