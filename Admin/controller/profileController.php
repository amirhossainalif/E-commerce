<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    // Redirect to login page
    header("Location: loginForm.php");
    exit();
}

// Establish database connection
$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'my_app';

// Create connection
$conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the username from the session
$username = $_SESSION['username'];

// Fetch user information from the database
require_once('../model/UserModel.php');
$userModel = new UserModel($conn);
$user = $userModel->getUser($username);

// Check if user exists
if (!$user) {
    // Handle case when user is not found
    // For example, display an error message
    echo "User not found.";
    exit();
}

// Include the profile view
require_once('../view/profile.php');
?>
