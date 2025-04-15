<?php
require 'db.php';

function clean($data) {
  return htmlspecialchars(trim($data));
}

$fields = ['name', 'emp_id', 'email', 'phone', 'department', 'designation', 'gender', 'address'];
foreach ($fields as $field) {
  if (empty($_POST[$field])) {
    die("All fields are required.");
  }
  $$field = clean($_POST[$field]);
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  die("Invalid email format.");
}

$sql = "INSERT INTO employees (name, emp_id, email, phone, department, designation, gender, address)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssssss", $name, $emp_id, $email, $phone, $department, $designation, $gender, $address);
$stmt->execute();

$stmt->close();
$conn->close();

header("Location: view_employee_profile.html");

exit();
?>
