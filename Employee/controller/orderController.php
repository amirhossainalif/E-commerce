<?php
session_start();
require_once('../model/UserModel.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_SESSION['username'])) {
        header("Location: ../view/loginForm.php");
        exit();
    }

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

    $userModel = new UserModel($conn);

    if (isset($_POST['orderId']) && isset($_POST['orderedDate']) && isset($_POST['orderStatus'])) {
        $orderId = $_POST['orderId'];
        $orderedDate = $_POST['orderedDate'];
        $orderStatus = $_POST['orderStatus'];

        if ($userModel->addOrder($orderedDate, $orderId, $orderStatus)) {
            echo "Order added successfully."; 
            header("Location: ../view/orderAddSuccess.php");
            exit();
        } else {
            echo "Error adding order!";
        }
    }

    if (isset($_POST['orderIdToDelete'])) {
        $orderIdToDelete = $_POST['orderIdToDelete'];

        if ($userModel->deleteOrder($orderIdToDelete)) {
            echo "Order deleted successfully."; 
            header("Location: ../view/orderDeleteSuccess.php");
            exit();
        } else {
            echo "Error deleting order!";
            header("Location: ../view/orderDeleteFailure.php");
            exit();
        }
    }

    $conn->close();
}
?>