<?php
// Initialize the session
session_start();

UNSET($_SESSION['adminName']);

// Redirect to login page
header("Location: admin_login.php");
exit;
?>

