<?php
require_once('../model/UserModel.php');

// Database configuration
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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userModel = new UserModel($conn);

    if (isset($_POST['userName']) && isset($_POST['userEmail']) && isset($_POST['phoneNumber']) && isset($_POST['message'])) {
        $userName = $_POST['userName'];
        $userEmail = $_POST['userEmail'];
        $phoneNumber = $_POST['phoneNumber'];
        $message = $_POST['message'];

        // Call the addReview method to add the review
        if ($userModel->addReview($userName, $userEmail, $phoneNumber, $message)) {
            echo "Review added successfully.";
            // Redirect to success page or do further processing
            header("Location: ../view/reviewSuccess.php");
            exit();
        } else {
            echo "Error adding review.";
            // Redirect to error page or handle error
            header("Location: ../view/reviewFailed.php");
            exit();
        }
    }
}

$conn->close();
?>
