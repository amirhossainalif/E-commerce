<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    // Redirect to login page if not logged in
    header("Location: loginForm.php");
    exit();
}

$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #3C9192;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 400px;
            margin: 175px auto;
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
    <div class="container">
        <h2>Welcome, <?php echo $username; ?></h2>
        <p>This is your dashboard.</p>
	<form action="../view/editProfileForm.php" method="get">
        <input type="submit" value="Update Profile">
    </form>

    <form action="../view/changePasswordForm.php" method="get">
        <input type="submit" value="Change Password">
    </form>

	<form action="../view/orderForm.php" method="post">
        <input type="submit" value="Order Management">
    </form>

	<form action="../view/productForm.php" method="post">
        <input type="submit" value="Product Management">
    </form>

    <form action="../view/reviewForm.php" method="post">
        <input type="submit" value="Reviews">
    </form>

    <form action="../view/supportForm.php" method="post">
        <input type="submit" value="Customer Support">
    </form>

	<form action="../controller/logoutController.php" method="post">
        <input type="submit" value="Logout">
    </form>
    </div>
</body>
</html>
