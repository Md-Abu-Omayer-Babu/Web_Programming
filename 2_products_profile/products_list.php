<?php
require 'db.php';

$sql = "SELECT * FROM products";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Product List</h2>";
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Category</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Description</th>
                <th>Manufacturer</th>
                <th>Release Date</th>
            </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row['id'] . "</td>
                <td>" . $row['name'] . "</td>
                <td>" . $row['category'] . "</td>
                <td>" . $row['price'] . "</td>
                <td>" . $row['quantity'] . "</td>
                <td>" . $row['description'] . "</td>
                <td>" . $row['manufacturer'] . "</td>
                <td>" . $row['release_date'] . "</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "No products found.";
}

$conn->close();
?>
