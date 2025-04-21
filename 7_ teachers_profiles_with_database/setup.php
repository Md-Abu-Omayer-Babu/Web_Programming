<?php
$conn = new mysqli("localhost", "root", "", "");
$conn->query("CREATE DATABASE IF NOT EXISTS teacher_db");
$conn->select_db("teacher_db");

$conn->query("CREATE TABLE IF NOT EXISTS teachers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    subject VARCHAR(100),
    email VARCHAR(100),
    phone VARCHAR(20),
    address TEXT,
    department VARCHAR(100),
    dob DATE
)");

echo "Database and table created successfully.";
?>
