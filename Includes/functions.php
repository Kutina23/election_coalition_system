<?php

function isAdminLoggedIn() {
    return isset($_SESSION['admin']);
}

function isAgentLoggedIn() {
    return isset($_SESSION['agent']);
}

function redirect($url) {
    header('Location: ' . $url);
    exit();
}

function sanitizeInput($input) {
    return htmlspecialchars(trim($input));
}

function validatePollingCenterInput($data) {
    $errors = [];
    if (empty($data['center_code'])) {
        $errors[] = "Center Code is required.";
    }
    if (empty($data['center_name'])) {
        $errors[] = "Center Name is required.";
    }
    if (!isset($data['pres_provisional_results']) || !is_numeric($data['pres_provisional_results'])) {
        $errors[] = "Provisional results must be a number.";
    }
    return $errors;
}
?>
