<?php
session_start();

// Check if user is not logged in
if (!isset($_SESSION['username'])) {
    // Redirect to login page
    header("Location: loginForm.php");
    exit(); // Stop further execution
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product deleted successfully</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #3C9192;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            text-align: center;
        }

        h2 {
            color: green;
        }

        p {
            font-size: 18px;
            margin-bottom: 10px;
        }

        a {
            color: blue;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Product deleted successfully</h2>
        <p><a href="productForm.php">Go back to Product Management</a></p>
    </div>
</body>
</html>
