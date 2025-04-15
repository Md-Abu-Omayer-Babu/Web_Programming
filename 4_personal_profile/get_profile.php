<?php
require 'db.php';

$sql = "SELECT * FROM profile";
$result = $conn->query($sql);

$profiles = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $profiles[] = $row;
    }
} else {
    echo json_encode(['message' => 'No profiles found']);
    exit;
}

$conn->close();

header('Content-Type: application/json');
echo json_encode($profiles);
