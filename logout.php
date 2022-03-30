<?php
// Initialize the session
session_start();

UNSET($_SESSION['username']);

// Destroy the session.
session_destroy();

// Redirect to login page
header("location: login.php");
exit;
?>