<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: ../login/admin_login.php');
    exit();
}
include('../includes/db.php');
include('../includes/functions.php');

// Calculate total results from polling center
$polling_results = $conn->query("SELECT SUM(pres_provisional_results) AS total FROM polling_center_results");
$polling_total = $polling_results->fetch_assoc()['total'];

// Calculate total results from district coalition center
$district_results = $conn->query("SELECT SUM(pres_provisional_results) AS total FROM district_coalition_results");
$district_total = $district_results->fetch_assoc()['total'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
    <h2>Admin Dashboard</h2>
    <div class="menu">
        <a href="agents.php">Manage Agents</a>
        <a href="#">PCR Reports</a>
        <a href="#">DCR Reports</a>
        <a href="../logout/logout.php">Logout</a>
    </div>

    <div class="results-container">
        <div class="polling-center-results">
            <h3>Polling Center Total Results: <?php echo $polling_total; ?></h3>
        </div>
        <div class="district-coalition-results">
            <h3>District Coalition Total Results: <?php echo $district_total; ?></h3>
        </div>
    </div>
</body>
</html>
