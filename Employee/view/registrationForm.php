<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #3C9192;
            margin: 0;
            padding: 0;
        }

        h2 {
            margin-top: 0;
            margin-bottom: 20px;
        }
        form {
            max-width: 350px;
            margin: 175px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: inline-block;
            width: 140px; /* Adjusted width for labels */
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="password"],
        input[type="date"],
        input[type="email"],
        input[type="submit"] {
            width: 100px /* Adjusted width for input fields */
            padding: 6px;
            margin-bottom: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        a {
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
    <script>
        function validate() {
            const a = document.getElementById("username");
            const b = document.getElementById("password");
            const c = document.getElementById("dob");
            const d = document.getElementById("mobile");
            const e = document.getElementById("email");
            const f = document.getElementById("security_question");
            const g = document.getElementById("security_answer");
            let flag = true;
            if (a.value === "") {
                flag = false;
                document.getElementById('error1').innerHTML = "Please fill up the username";
            }
            if (b.value === "") {
                flag = false;
                document.getElementById('error2').innerHTML = "Please fill up the password";
            }
            if (c.value === "") {
                flag = false;
                document.getElementById('error3').innerHTML = "Please fill up the date of birth";
            }
            if (d.value === "") {
                flag = false;
                document.getElementById('error4').innerHTML = "Please fill up the mobile";
            }
            if (e.value === "") {
                flag = false;
                document.getElementById('error5').innerHTML = "Please fill up the email";
            }
            if (f.value === "") {
                flag = false;
                document.getElementById('error6').innerHTML = "Please fill up the security question";
            }
            if (g.value === "") {
                flag = false;
                document.getElementById('error7').innerHTML = "Please fill up the sucurity answer";
            }
            return flag;
        }
    </script>
</head>
<body>
    
    <form action="../controller/registrationController.php" method="post" onsubmit="return validate()">
	<h2>Registration Form</h2>
        <label for="username">Username:</label>
        <input type="text" id="username" name="username"><br>
        <span id="error1" style="color: red;"></span><br> <!-- Error message placeholder -->
        <label for="password">Password:</label>
        <input type="text" id="password" name="password"><br>
        <span id="error2" style="color: red;"></span><br> <!-- Error message placeholder -->
        <label for="dob">Date of Birth:</label>
        <input type="date" id="dob" name="dob"><br>
        <span id="error3" style="color: red;"></span><br> <!-- Error message placeholder -->
        <label for="mobile">Mobile Number:</label>
        <input type="text" id="mobile" name="mobile"><br>
        <span id="error4" style="color: red;"></span><br> <!-- Error message placeholder -->
        <label for="email">Email:</label>
        <input type="text" id="email" name="email"><br>
        <span id="error5" style="color: red;"></span><br> <!-- Error message placeholder -->
        <label for="security_question">Security Question:</label>
        <input type="text" id="security_question" name="security_question"><br>
        <span id="error6" style="color: red;"></span><br> <!-- Error message placeholder -->
        <label for="security_answer">Security Answer:</label>
        <input type="text" id="security_answer" name="security_answer"><br>
        <span id="error7" style="color: red;"></span><br> <!-- Error message placeholder -->
        <input type="submit" value="Register">
 	    <p>Already have an account? <a href="loginForm.php">Login here</a></p>
    </form>
   
</body>
</html>
