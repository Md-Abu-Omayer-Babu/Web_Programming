<?php
require 'db.php';

$result = $conn->query("SELECT * FROM employees");

$employees = [];

while ($row = $result->fetch_assoc()) {
    $employees[] = $row;
}

header('Content-Type: application/json');
echo json_encode($employees);

$conn->close();
?>
