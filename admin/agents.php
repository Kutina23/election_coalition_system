<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: ../login/admin_login.php');
    exit();
}
include('../includes/db.php');
include('../includes/functions.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $gps = $_POST['gps'];
    $occupation = $_POST['occupation'];
    $password = md5($_POST['password']);

    $sql = "INSERT INTO agents (name, email, phone, address, gps, occupation, password) VALUES ('$name', '$email', '$phone', '$address', '$gps', '$occupation', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "New agent registered successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Agents</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
    <h2>Register Agent</h2>
    <form method="POST" action="">
        <input type="text" name="name" placeholder="Name" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="text" name="phone" placeholder="Phone" required>
        <input type="text" name="address" placeholder="Address" required>
        <input type="text" name="gps" placeholder="GPS" required>
        <input type="text" name="occupation" placeholder="Occupation" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Register</button>
    </form>
</body>
</html>
