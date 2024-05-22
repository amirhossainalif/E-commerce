<?php
require_once('../model/UserModel.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
    // Get the username and new password from the form
    $username = $_POST['username'];
    $newPassword = $_POST['new_password'];

    // Create a new instance of the UserModel
    $userModel = new UserModel($conn);

    // Update the password
    $success = $userModel->updatePassword($username, $newPassword);

    // Check if the password was successfully updated
    if ($success) {
        // Display success message
        echo "Password reset successful. <a href='../view/loginForm.php'>Login</a>";
    } else {
        // Handle error (e.g., display an error message)
        echo "Password reset failed.";
    }
    $conn->close();
}
?>
