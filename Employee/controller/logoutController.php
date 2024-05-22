<?php
session_start();

// Unset all session variables
session_unset();

// Destroy the session
session_destroy();

// Redirect to logout success page
header("Location: ../view/logoutSuccess.php");
exit();
?>
