<?php
// Check if data is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the form
    $name = htmlspecialchars($_POST['name']);
    $dob = htmlspecialchars($_POST['dob']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $address = htmlspecialchars($_POST['address']);
    $gender = htmlspecialchars($_POST['gender']);
    $profession = htmlspecialchars($_POST['profession']);
    $hobby = htmlspecialchars($_POST['hobby']);
} else {
    die("No data received.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Display</title>
</head>
<body>
    <h2>Your Personal Profile</h2>

    <table border="1" cellpadding="10">
        <tr>
            <th>Attribute</th>
            <th>Details</th>
        </tr>
        <tr>
            <td>Full Name</td>
            <td><?php echo $name; ?></td>
        </tr>
        <tr>
            <td>Date of Birth</td>
            <td><?php echo $dob; ?></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><?php echo $email; ?></td>
        </tr>
        <tr>
            <td>Phone Number</td>
            <td><?php echo $phone; ?></td>
        </tr>
        <tr>
            <td>Address</td>
            <td><?php echo nl2br($address); ?></td>
        </tr>
        <tr>
            <td>Gender</td>
            <td><?php echo $gender; ?></td>
        </tr>
        <tr>
            <td>Profession</td>
            <td><?php echo $profession; ?></td>
        </tr>
        <tr>
            <td>Hobby</td>
            <td><?php echo $hobby; ?></td>
        </tr>
    </table>

    <br>
    <a href="index.html">Go Back to Edit Profile</a>

</body>
</html>
