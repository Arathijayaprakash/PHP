<?php
// Define valid credentials
$valid_user = 'arathi';
$valid_pass = '12345';

// Check if the user has provided credentials
if (!isset($_SERVER['PHP_AUTH_USER'])) {
    // Ask for username and password
    header('WWW-Authenticate: Basic realm="Restricted Area"');
    header('HTTP/1.0 401 Unauthorized');
    echo "Authentication required!";
    exit;
} else {
    if ($_SERVER['PHP_AUTH_USER'] === $valid_user && $_SERVER['PHP_AUTH_PW'] === $valid_pass) {
        echo "<h2>Welcome, " . htmlspecialchars($_SERVER['PHP_AUTH_USER']) . "!</h2>";
        echo "<p>You have successfully accessed the secure area.</p>";
    } else {
        header('WWW-Authenticate: Basic realm="Restricted Area"');
        header('HTTP/1.0 401 Unauthorized');
        echo "Invalid credentials!";
        exit;
    }
}
