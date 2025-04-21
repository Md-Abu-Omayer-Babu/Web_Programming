<?php
require 'db.php';

function clean($data) {
  return htmlspecialchars(trim($data));
}

$fields = ['name', 'roll', 'email', 'phone', 'dob', 'gender', 'department', 'address'];
foreach ($fields as $field) {
  if (empty($_POST[$field])) {
    die("All fields are required.");
  }
  $$field = clean($_POST[$field]);
}

// Email validation
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  die("Invalid email format.");
}

$sql = "INSERT INTO students (name, roll, email, phone, dob, gender, department, address)
VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssssss", $name, $roll, $email, $phone, $dob, $gender, $department, $address);
$stmt->execute();

$last_id = $conn->insert_id;
$stmt->close();
$conn->close();

header("Location: result.php?id=$last_id");
exit();
?>
