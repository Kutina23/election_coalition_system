<?php
$host = 'localhost';
$db = 'election_coalition_system';
$user = 'root';  // replace with your db user
$pass = '';      // replace with your db password

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
