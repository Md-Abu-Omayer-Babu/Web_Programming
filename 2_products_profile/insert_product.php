<?php
require 'db.php';

function clean($data) {
    return htmlspecialchars(trim($data));
}

$fields = ['name', 'category', 'price', 'quantity', 'description', 'manufacturer', 'release_date'];
foreach ($fields as $field) {
    if (empty($_POST[$field])) {
        die("All fields are required.");
    }
    $$field = clean($_POST[$field]);
}

// Validate price
if (!is_numeric($price)) {
    die("Invalid price format.");
}

// Insert product data into database
$sql = "INSERT INTO products (name, category, price, quantity, description, manufacturer, release_date) 
        VALUES (?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssdisss", $name, $category, $price, $quantity, $description, $manufacturer, $release_date);
$stmt->execute();

$stmt->close();
$conn->close();

// Redirect to product list page
header("Location: products_list.php");
exit();
?>
