<?php
require_once('../model/UserModel.php');

$dbHost = 'localhost';
$dbUsername = 'root'; 
$dbPassword = '';
$dbName = 'my_app';

$conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userModel = new UserModel($conn);

    if (isset($_POST['userName'])  && isset($_POST['message'])) {
        $userName = $_POST['userName'];
        $message = $_POST['message'];

        if ($userModel->addSupport($userName, $message)) {
            echo "Problem submitted successfully.";
        } else {
            echo "Error submitting problem.";
            exit();
        }
    }
}

$conn->close();
?>
