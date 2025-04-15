<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "personal_profile_db";

$conn = new mysqli($servername, $username, $password);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

$conn->query("CREATE DATABASE IF NOT EXISTS $dbname");
$conn->select_db($dbname);

$sql = "CREATE TABLE IF NOT EXISTS profile (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100),
  dob DATE,
  email VARCHAR(100),
  phone VARCHAR(20),
  gender VARCHAR(10),
  address TEXT,
  nationality VARCHAR(50),
  blood_group VARCHAR(10),
  bio TEXT
)";
if ($conn->query($sql)) {
  echo "Table created successfully!";
} else {
  echo "Error creating table: " . $conn->error;
}
$conn->close();
?>
