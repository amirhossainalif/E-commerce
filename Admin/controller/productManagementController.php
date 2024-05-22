<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    // Redirect to login page
    header("Location: loginForm.php");
    exit();
}

// Check if action is set and not empty
if (isset($_POST['action']) && !empty($_POST['action'])) {
    $action = $_POST['action'];

    // Include ProductModel
    require_once('../model/ProductModel.php');
    $productModel = new ProductModel();

    // Handle different actions
    switch ($action) {
        case 'add':
            if (isset($_POST['productName']) && isset($_POST['description']) && isset($_POST['price'])) {
                $productName = $_POST['productName'];
                $description = $_POST['description'];
                $price = $_POST['price'];
                $productModel->addProduct($productName, $description, $price);
            }
            break;
        case 'delete':
            if (isset($_POST['productId'])) {
                $productId = $_POST['productId'];
                $productModel->deleteProduct($productId);
            }
            break;
        default:
            // Handle invalid action
            break;
    }
}

// Redirect back to product management page
header("Location: ../view/productManagement.php");
?>
