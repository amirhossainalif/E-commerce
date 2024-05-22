<?php
require_once('../model/UserModel.php');
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $dbHost = 'localhost'; 
    $dbUsername = 'root'; // 
    $dbPassword = ''; // 
    $dbName = 'my_app'; // 

    $conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $userModel = new UserModel($conn);

    $user = $userModel->getUser($username);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['username'] = $username; 

        header("Location: ../view/dashboard.php");
        exit();
    } else {
        echo "Error User Name or Password. <a href='../view/loginForm.php'>Login</a>";
        exit();
    }
}
?>