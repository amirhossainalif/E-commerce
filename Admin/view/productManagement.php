<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    // Redirect to login page
    header("Location: loginForm.php");
    exit();
}

// Fetch all products
require_once('../model/ProductModel.php');
$productModel = new ProductModel();
$products = $productModel->getAllProducts();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Management</title>
    <!-- Add your CSS styles here -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #333;
        }

        p {
            color: #666;
            margin-bottom: 15px;
        }

        form {
            margin-top: 20px;
        }

        input[type="submit"] {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style> 
</head>
<body>
    <h1>Product Management</h1>
    <div class="container">
    <h2>Add Product</h2>
    <form action="../controller/productManagementController.php" method="post">
        <input type="hidden" name="action" value="add">
        <label for="productName">Product Name:</label>
        <input type="text" id="productName" name="productName" required><br><br>
        <label for="description">Description:</label>
        <textarea id="description" name="description" required></textarea><br><br>
        <label for="price">Price:</label>
        <input type="number" id="price" name="price" required><br><br>
        <input type="submit" value="Add Product">
    </form>
    <br>
    <!-- Display existing products with edit and delete options -->
    <?php if (!empty($products)): ?>
    <table>
        <tr>
            <th>Product Name</th>
            <th>Description</th>
            <th>Price($)</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        <?php foreach ($products as $product): ?>
        <tr>
            <td><?php echo $product['product_name']; ?></td>
            <td><?php echo $product['description']; ?></td>
            <td><?php echo $product['price']; ?></td>
            <td><a href="editProductForm.php?productId=<?php echo $product['product_id']; ?>">Edit</a></td>
            <td>
                <form action="../controller/productManagementController.php" method="post">
                    <input type="hidden" name="action" value="delete">
                    <input type="hidden" name="productId" value="<?php echo $product['product_id']; ?>">
                    <input type="submit" value="Delete">
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    <?php else: ?>
    <p>No products available.</p>
    </div>
    <?php endif; ?>
    <form action="../view/dashboard.php" method="get">
            <input type="submit" value="Home Page">
    </form>
</body>
</html>
