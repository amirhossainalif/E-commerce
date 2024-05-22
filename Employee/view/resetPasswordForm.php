<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #3C9192;
            margin: 0;
            padding: 0;
        }

        h2 {
            color: #007bff;
        }

        form {
            max-width: 400px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }

        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
    <script>
        function validate() {
            const x = document.getElementById("new_password");
            const y = document.getElementById("confirm_password");
            let flag = true;
            if (x.value === "") {
                flag = false;
                document.getElementById('error1').innerHTML = "Please fill up the new password";
            }
            if (y.value === "") {
                flag = false;
                document.getElementById('error2').innerHTML = "Please fill up the confirm password";
            }
            return flag;
        }
    </script>
</head>
<body>
    
    <form action="../controller/resetPasswordController.php" method="post" onsubmit="return validate()">
        <h2>Reset Password</h2>
        <input type="hidden" name="username" value="<?php echo $_GET['username']; ?>">
        <label for="new_password">New Password:</label>
        <input type="password" id="new_password" name="new_password">
        <span id="error1" style="color: red;"></span><br> <!-- Error message placeholder -->
        <label for="confirm_password">Confirm Password:</label>
        <input type="password" id="confirm_password" name="confirm_password">
        <span id="error2" style="color: red;"></span><br> <!-- Error message placeholder -->
        <input type="submit" value="Reset Password">
    </form>
</body>
</html>
