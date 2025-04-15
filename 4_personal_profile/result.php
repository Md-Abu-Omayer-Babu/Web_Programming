<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "personal_profile_db";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

$result = $conn->query("SELECT * FROM profile ORDER BY id DESC LIMIT 1");
if ($row = $result->fetch_assoc()) {
  echo "<h2>Profile Submitted</h2>";
  echo "Name: " . $row['name'] . "<br>";
  echo "DOB: " . $row['dob'] . "<br>";
  echo "Email: " . $row['email'] . "<br>";
  echo "Phone: " . $row['phone'] . "<br>";
  echo "Gender: " . $row['gender'] . "<br>";
  echo "Address: " . $row['address'] . "<br>";
  echo "Nationality: " . $row['nationality'] . "<br>";
  echo "Blood Group: " . $row['blood_group'] . "<br>";
  echo "Bio: " . $row['bio'] . "<br>";
} else {
  echo "No profile found.";
}
$conn->close();
?>
