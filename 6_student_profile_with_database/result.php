<?php
require 'db.php';

$id = intval($_GET['id']);
$result = $conn->query("SELECT * FROM students WHERE id = $id");

if ($result->num_rows == 0) {
  die("Student not found.");
}

$row = $result->fetch_assoc();
?>

<h2>Student Profile</h2>
<p><strong>Name:</strong> <?= $row['name'] ?></p>
<p><strong>Roll:</strong> <?= $row['roll'] ?></p>
<p><strong>Email:</strong> <?= $row['email'] ?></p>
<p><strong>Phone:</strong> <?= $row['phone'] ?></p>
<p><strong>Date of Birth:</strong> <?= $row['dob'] ?></p>
<p><strong>Gender:</strong> <?= $row['gender'] ?></p>
<p><strong>Department:</strong> <?= $row['department'] ?></p>
<p><strong>Address:</strong> <?= $row['address'] ?></p>
