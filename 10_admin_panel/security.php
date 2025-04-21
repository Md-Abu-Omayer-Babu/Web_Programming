<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: index.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once "db.php";

    $current_password = $_POST['current_password'];
    $new_username = $_POST['new_username'];
    $new_password = $_POST['new_password'];

    $stmt = $conn->prepare("SELECT password FROM users WHERE username = ?");
    $stmt->bind_param("s", $_SESSION['username']);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($db_password);
    $stmt->fetch();

    if (password_verify($current_password, $db_password)) {
        $new_password_hash = password_hash($new_password, PASSWORD_BCRYPT);

        $update_stmt = $conn->prepare("UPDATE users SET username = ?, password = ? WHERE username = ?");
        $update_stmt->bind_param("sss", $new_username, $new_password_hash, $_SESSION['username']);
        $update_stmt->execute();

        $_SESSION['username'] = $new_username;
        $success_message = "Profile updated successfully.";
    } else {
        $error_message = "Incorrect current password.";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Security Page</title>
</head>
<body>
    <h2>Change Username/Password</h2>
    <?php if (isset($error_message)) echo "<p style='color:red;'>$error_message</p>"; ?>
    <?php if (isset($success_message)) echo "<p style='color:green;'>$success_message</p>"; ?>
    <form action="security.php" method="post">
        <label for="current_password">Current Password:</label>
        <input type="password" name="current_password" required><br><br>

        <label for="new_username">New Username:</label>
        <input type="text" name="new_username" required><br><br>

        <label for="new_password">New Password:</label>
        <input type="password" name="new_password" required><br><br>

        <button type="submit">Change</button>
    </form>
</body>
</html>
