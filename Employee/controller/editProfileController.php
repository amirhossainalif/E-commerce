<?php
session_start();
require_once('../model/UserModel.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (!isset($_SESSION['username'])) {

        header("Location: ../view/loginForm.php");
        exit();
    }
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
    
    $username = $_SESSION['username'];
    
    $dob = $_POST['dob'];
    $mobile_number = $_POST['mobile_number'];
    $email = $_POST['email'];

    $userModel = new UserModel($conn);

    $userModel->updateUser($username, $dob, $mobile_number, $email);

    header("Location: ../view/profile.php");
    exit();
}
?>