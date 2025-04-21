<?php
include 'db.php';

// Retrieve the teacher's ID from the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Fetch the teacher's data from the database
    $sql = "SELECT * FROM teachers WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $teacher = $result->fetch_assoc();
    
    if (!$teacher) {
        echo "Teacher not found.";
        exit;
    }
} else {
    echo "No teacher ID provided.";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Handle the form submission and update the teacher's data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    
    // Update the teacher's data
    $update_sql = "UPDATE teachers SET name = ?, email = ?, subject = ?, phone = ?, address = ? WHERE id = ?";
    $stmt = $conn->prepare($update_sql);
    $stmt->bind_param("sssssi", $name, $email, $subject, $phone, $address, $id);
    
    if ($stmt->execute()) {
        echo "Teacher's profile updated successfully!";
    } else {
        echo "Error updating profile: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Teacher Profile</title>
</head>
<body>
    <h2>Edit Teacher Profile</h2>
    <form method="POST" action="">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($teacher['name']); ?>" required><br><br>

        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($teacher['email']); ?>" required><br><br>

        <label for="subject">Subject:</label><br>
        <input type="text" id="subject" name="subject" value="<?php echo htmlspecialchars($teacher['subject']); ?>" required><br><br>

        <label for="phone">Phone:</label><br>
        <input type="text" id="phone" name="phone" value="<?php echo htmlspecialchars($teacher['phone']); ?>" required><br><br>

        <label for="address">Address:</label><br>
        <textarea id="address" name="address" required><?php echo htmlspecialchars($teacher['address']); ?></textarea><br><br>

        <button type="submit">Save Changes</button>
    </form>
</body>
</html>
