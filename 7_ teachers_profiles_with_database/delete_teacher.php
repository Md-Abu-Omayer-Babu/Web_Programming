<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Delete the teacher's profile
    $sql = "DELETE FROM teachers WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    
    if ($stmt->execute()) {
        echo "Teacher's profile deleted successfully!";
    } else {
        echo "Error deleting profile: " . $conn->error;
    }
} else {
    echo "No teacher ID provided.";
}

$conn->close();
?>
