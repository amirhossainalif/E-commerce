<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        h2 {
            margin-top: 0;
            margin-bottom: 20px;
        }

        form {
            max-width: 300px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        p {
            margin-top: 20px;
        }
    </style>

    <script>
        function validate() {
            const x = document.getElementById("username");
            const y = document.getElementById("password");
            const error1 = document.getElementById('error1');
            const error2 = document.getElementById('error2');
        
            let flag = true;
            error1.innerHTML = ""; 
            error2.innerHTML = ""; 
        
            if (x.value === "") {
                flag = false;
                error1.innerHTML = "Please fill up the username";
            }
            if (y.value === "") {
                flag = false;
                error2.innerHTML = "Please fill up the password";
            }
        
            return flag;
        }
    </script>
</head>
<body>
    <h2>Login Form</h2>
    <form action="../controller/loginController.php" method="post" onsubmit="return validate()">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" <br>
        <span id="error1" style="color: red;"></span><br> <!-- Error message placeholder -->
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password"><br>
        <span id="error2" style="color: red;"></span><br> <!-- Error message placeholder -->
        
        <input type="submit" value="Login">
    </form>
    <p>Don't have an account? <a href="registrationForm.php">Register here</a></p>
    <p>Forgot your password? <a href="forgotPasswordForm.php">Reset Password</a></p>
    <p>Change Account? <a href="http://localhost/project/Index.php">Home Page</a></p>
</body>
</html>