<?php
session_start();
require_once('../model/UserModel.php');

// Establish database connection
$dbHost = 'localhost'; // Change this if your database host is different
$dbUsername = 'root'; // Change this if your database username is different
$dbPassword = ''; // Change this if your database password is different
$dbName = 'my_app'; // Change this to your actual database name

$conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if form fields are set
    if (isset($_POST['new_password']) && isset($_POST['confirm_password'])) {
        // Check if new password matches confirm password
        if ($_POST['new_password'] === $_POST['confirm_password']) {
            // Get username from session
            if (isset($_SESSION['username'])) {
                $username = $_SESSION['username'];

                // Create UserModel object
                $userModel = new UserModel($conn);

                // Get user from database
                $user = $userModel->getUser($username);

                if ($user) {
                    // Hash new password
                    $hashed_password = password_hash($_POST['new_password'], PASSWORD_DEFAULT);

                    // Update user's password
                    $userModel->updatePassword($username, $hashed_password);

                    // Redirect to success page
                    header("Location: ../view/passwordResetSuccess.php");
                    exit();
                } else {
                    echo "User not found.";
                }
            } else {
                echo "User session not set.";
            }
        } else {
            echo "New password and confirm password do not match.";
        }
    } else {
        echo "New password or confirm password not set.";
    }
} else {
    echo "Invalid request method.";
}
?>
