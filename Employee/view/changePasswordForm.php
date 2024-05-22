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
    <title>Change Password</title>
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
            width: 300px;
            padding: 50px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #333;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 3px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
    <script>
        function validate() {
            const x = document.getElementById("old_password");
            const y = document.getElementById("new_password");
            let flag = true;
            if (x.value === "") {
                flag = false;
                document.getElementById('error1').innerHTML = "Please fill up the old password";
            }
            if (y.value === "") {
                flag = false;
                document.getElementById('error2').innerHTML = "Please fill up the new password";
            }
            return flag;
        }
    </script>
</head>
<body>
    <div class="container">
        <h2>Change Password</h2>
        <form action="../controller/changePasswordController.php" method="post" onsubmit="return validate()">
            <label for="old_password">Old Password:</label>
            <input type="text" id="old_password" name="old_password"><br>
            <span id="error1" style="color: red;"></span><br> <!-- Error message placeholder -->
            <label for="new_password">New Password:</label>
            <input type="text" id="new_password" name="new_password"><br>
            <span id="error2" style="color: red;"></span><br> <!-- Error message placeholder -->
            <input type="submit" value="Change Password">
        </form>
        <form action="../view/dashboard.php" method="get">
        <br><input type="submit" value="Go Back">
        </form>
    </div>
</body>
</html>
