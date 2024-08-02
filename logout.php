<?php
session_start(); // Start the session

// Clear all session variables
session_unset();

// Destroy the session
session_destroy();

// Redirect the user to the login page (or any other desired page)
header('Location: /');
exit;
?>
