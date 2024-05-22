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

    if (isset($_POST['productId']) && isset($_POST['productName']) && isset($_POST['productStatus']) && isset($_POST['productStatus'])) {
        $productId = $_POST['productId'];
        $productName = $_POST['productName'];
        $productStatus = $_POST['productStatus'];
        $productPrice = $_POST['productPrice'];

        if ($userModel->addProduct($productId, $productName, $productStatus, $productPrice)) {
            echo "Product added successfully."; 
            header("Location: ../view/productAddSuccess.php");
            exit();
        } else {
            echo "Error adding product!";
        }
    }

    if (isset($_POST['productIdToDelete'])) {
        $productIdToDelete = $_POST['productIdToDelete'];

        if ($userModel->deleteProduct($productIdToDelete)) {
            echo "Product deleted successfully."; 
            header("Location: ../view/productDeleteSuccess.php");
            exit();
        } else {
            echo "Error deleting order!";
        }
    }

    $conn->close();
}
?>