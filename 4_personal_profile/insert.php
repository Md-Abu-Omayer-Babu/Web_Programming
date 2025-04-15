<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "personal_profile_db";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

$fields = ['name', 'dob', 'email', 'phone', 'gender', 'address', 'nationality', 'blood_group', 'bio'];
foreach ($fields as $f) {
  if (empty($_POST[$f])) die("All fields are required.");
  $$f = htmlspecialchars(trim($_POST[$f]));
}

$sql = "INSERT INTO profile (name, dob, email, phone, gender, address, nationality, blood_group, bio)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssssss", $name, $dob, $email, $phone, $gender, $address, $nationality, $blood_group, $bio);
$stmt->execute();
$stmt->close();
$conn->close();

header("Location: result.php");
exit();
?>
