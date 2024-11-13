<?php
session_start();
include('../includes/db.php');
include('../includes/functions.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM agents WHERE email = '$email' AND password = '".md5($password)."'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['agent'] = $email;
        header('Location: ../agents/dashboard.php');
    } else {
        echo "Invalid login credentials.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Agent Login</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
    <form method="POST" action="">
        <h2>Agent Login</h2>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
    </form>
</body>
</html>
