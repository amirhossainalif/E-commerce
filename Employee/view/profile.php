<?php
session_start();

// Check if user is not logged in
if (!isset($_SESSION['username'])) {
    // Redirect to login page
    header("Location: loginForm.php");
    exit(); // Stop further execution
}
require_once('../model/UserModel.php');
// Assuming you have established the database connection somewhere before this point
// Make sure $conn represents your database connection object

if (!isset($_SESSION['username'])) {

    header("Location: ../view/loginForm.php");
    exit();
}
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

$username = $_SESSION['username'];

$userModel = new UserModel($conn);

// Fetch user data
$user = $userModel->getUser($_SESSION['username']);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        h2 {
            margin-top: 0;
            margin-bottom: 20px;
        }

        p {
            margin-bottom: 10px;
        }

        a {
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h2>Profile</h2>
    <!-- Display user information here -->
    <p>Username: <?php echo $user['username']; ?></p>
    <p>Date of Birth: <?php echo $user['dob']; ?></p>
    <p>Mobile Number: <?php echo $user['mobile']; ?></p>
    <p>Email: <?php echo $user['email']; ?></p>
    <p><a href="editProfileForm.php">Edit Profile</a></p>
</body>
</html>
