<?php
session_start();
require_once('../model/OrderModel.php');

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    // Redirect to login page
    header("Location: loginForm.php");
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

// Get the action from the form
$action = $_POST['action'];

// Create an OrderModel object
$orderModel = new OrderModel($conn);

// Handle different actions
switch ($action) {
    case 'add':
        $orderedDate = $_POST['orderedDate'];
        $orderId = $_POST['orderId'];
        $orderStatus = $_POST['orderStatus'];
        $orderModel->addOrder($orderedDate, $orderId, $orderStatus);
        header("Location: ../view/orderManagement.php");
        break;
    case 'edit':
        $orderId = $_POST['orderId'];
        $orderedDate = $_POST['orderedDate'];
        $orderStatus = $_POST['orderStatus'];
        $orderModel->editOrder($orderId, $orderedDate, $orderStatus);
        header("Location: ../view/orderManagement.php");
        break;
    case 'delete':
        $orderId = $_POST['orderId'];
        $orderModel->deleteOrder($orderId);
        header("Location: ../view/orderManagement.php");
        break;
    default:
        // Handle invalid action
        break;
}
?>
