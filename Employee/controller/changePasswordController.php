<?php
session_start();
require_once('../model/UserModel.php');

    // Database configuration
    $dbHost = 'localhost';
    $dbUsername = 'root'; 
    $dbPassword = ''; //
    $dbName = 'my_app'; // 

    // Create connection
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

    // Get the old and new passwords from the form
    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];

    // Create a UserModel object with the database connection
    $userModel = new UserModel($conn);

    // Get the user's information from the database
    $user = $userModel->getUser($username);

    // Verify the old password
    if ($user && password_verify($old_password, $user['password'])) {
        // Hash the new password
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

        // Update the user's password in the database
        $userModel->updatePassword($username, $hashed_password);
        
        // Redirect to success page
        header("Location: ../view/changedPasswordSuccess.php");
        exit();
    } else {
        echo "Invalid old password!";
    }
}
?>
