<?php
function clean_input($data) {
  return htmlspecialchars(stripslashes(trim($data)));
}

$errors = [];
$data = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $data['name'] = clean_input($_POST['name']);
  $data['email'] = clean_input($_POST['email']);
  $data['phone'] = clean_input($_POST['phone']);
  $data['department'] = clean_input($_POST['department']);
  $data['dob'] = clean_input($_POST['dob']);
  $data['address'] = clean_input($_POST['address']);

  // Validation
  if (empty($data['name'])) $errors[] = "Name is required.";
  if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) $errors[] = "Invalid email format.";
  if (!preg_match("/^\d{10}$/", $data['phone'])) $errors[] = "Phone must be 10 digits.";
  if (empty($data['department'])) $errors[] = "Department is required.";
  if (empty($data['dob'])) $errors[] = "Date of Birth is required.";
  if (empty($data['address'])) $errors[] = "Address is required.";

  if (empty($errors)) {
    echo "<h2>Profile Submitted Successfully!</h2>";
    foreach ($data as $key => $value) {
      echo "<strong>" . ucfirst($key) . ":</strong> " . $value . "<br>";
    }
  } else {
    echo "<h2>Validation Errors:</h2><ul>";
    foreach ($errors as $error) {
      echo "<li>$error</li>";
    }
    echo "</ul><a href='index.html'>Go Back</a>";
  }
} else {
  header("Location: index.html");
}
?>
