<?php
require_once('../model/UserModel.php');
session_start(); // Start session

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Database configuration
    $dbHost = 'localhost'; 
    $dbUsername = 'root'; // 
    $dbPassword = ''; // 
    $dbName = 'my_app'; // 

    // Create connection
    $conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $userModel = new UserModel($conn);

    $user = $userModel->getUser($username);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['username'] = $username; // Store username in session
        
        // Redirect to dashboard
        header("Location: ../view/dashboard.php");
        exit();
    } else {
        // Redirect back to login form with error message
        echo "Error User Name or Password. <a href='../view/loginForm.php'>Login</a>";
        exit();
    }
}
?>