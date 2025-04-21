<?php
require 'db.php';

$name = $_POST['name'];
$subject = $_POST['subject'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$department = $_POST['department'];
$dob = $_POST['dob'];

$stmt = $conn->prepare("INSERT INTO teachers (name, subject, email, phone, address, department, dob) VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssss", $name, $subject, $email, $phone, $address, $department, $dob);
$stmt->execute();

$stmt->close();
$conn->close();

header("Location: index.html");
exit();
?>
