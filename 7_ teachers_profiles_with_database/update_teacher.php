<?php
require 'db.php';

$id = $_POST['editId'];
$name = $_POST['editName'];
$subject = $_POST['editSubject'];
$email = $_POST['editEmail'];
$phone = $_POST['editPhone'];
$address = $_POST['editAddress'];
$department = $_POST['editDepartment'];
$dob = $_POST['editDOB'];

$stmt = $conn->prepare("UPDATE teachers SET name=?, subject=?, email=?, phone=?, address=?, department=?, dob=? WHERE id=?");
$stmt->bind_param("sssssssi", $name, $subject, $email, $phone, $address, $department, $dob, $id);
$stmt->execute();

$stmt->close();
$conn->close();
?>
