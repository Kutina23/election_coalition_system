<?php
session_start();
include('../includes/db.php');
include('../includes/functions.php');

if (!isAgentLoggedIn()) {
    redirect('../login/agent_login.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $agent_name = $_SESSION['agent'];
    $center_code = sanitizeInput($_POST['center_code']);
    $center_name = sanitizeInput($_POST['center_name']);
    $pres_provisional_results = sanitizeInput($_POST['pres_provisional_results']);

    // Validate inputs
    $errors = validatePollingCenterInput($_POST);
    if (empty($errors)) {
        $sql = "INSERT INTO polling_center_results (agent_name, center_code, center_name, pres_provisional_results) 
                VALUES ('$agent_name', '$center_code', '$center_name', '$pres_provisional_results')";

        if ($conn->query($sql) === TRUE) {
            $message = "Results submitted successfully.";
        } else {
            $message = "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Agent Dashboard</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
    <h2>Polling Center Results Submission</h2>

    <?php if (!empty($errors)): ?>
        <div class="error-messages">
            <?php foreach ($errors as $error): ?>
                <p><?php echo $error; ?></p>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <?php if (!empty($message)): ?>
        <div class="success-message">
            <p><?php echo $message; ?></p>
        </div>
    <?php endif; ?>

    <form method="POST" action="">
        <input type="text" name="center_code" placeholder="Center Code" required>
        <input type="text" name="center_name" placeholder="Center Name" required>
        <input type="number" name="pres_provisional_results" placeholder="Provisional Results" required>
        <button type="submit">Submit Results</button>
    </form>

    <a href="../logout/logout.php">Logout</a>
</body>
</html>
