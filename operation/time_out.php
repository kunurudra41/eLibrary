<?php 
// Set timeout duration (in seconds)
$timeout_duration = 2700; // 45 minutes

// Check if the last activity timestamp is set
if (isset($_SESSION['last_activity'])) {
    // Calculate the session's lifetime
    $duration = time() - $_SESSION['last_activity'];
    if ($duration > $timeout_duration) {
        // Destroy the session if it has timed out
        session_unset();
        session_destroy();
        header("Location: /timeout");
        exit();
    }
}

// Update last activity timestamp
$_SESSION['last_activity'] = time();

?>