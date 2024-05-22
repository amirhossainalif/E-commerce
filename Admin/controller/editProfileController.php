<?php
session_start();
require_once('../model/UserModel.php');

// Establish database connection
$dbHost = 'localhost'; // Update with your database host
$dbUsername = 'root'; // Update with your database username
$dbPassword = ''; // Update with your database password
$dbName = 'my_app'; // Update with your database name

$conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if user is logged in
    if (!isset($_SESSION['username'])) {
        // Redirect to login page
        header("Location: ../view/loginForm.php");
        exit();
    }

    // Get the current username from the session
    $username = $_SESSION['username'];

    // Get the new user information from the form
    $dob = $_POST['dob'];
    $mobile_number = $_POST['mobile_number'];
    $email = $_POST['email'];

    // Create a UserModel object with the database connection
    $userModel = new UserModel($conn);

    // Update the user's profile in the database
    $userModel->updateProfile($username, $dob, $mobile_number, $email);
    
    // Redirect to profile page
    header("Location: ../view/profile.php");
    exit();
}
?>
