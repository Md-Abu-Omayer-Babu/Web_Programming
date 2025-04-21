<?php
// Include the database connection file
require 'db.php';

// Set the content type to JSON
header('Content-Type: application/json');

// Fetch all student records from the database
$sql = "SELECT * FROM students";
$result = $conn->query($sql);

$students = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $students[] = $row; // Store each student in the $students array
    }
} else {
    echo json_encode(['message' => 'No data found']);
    exit;
}

// Return the results as a JSON response
echo json_encode($students);

// Close the connection
$conn->close();
?>
