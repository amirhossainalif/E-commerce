<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
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
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            margin-top: 0;
        }

        form {
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="date"],
        input[type="text"],
        input[type="email"] {
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
    </style>
    <script>
        function validate() {
            const x = document.getElementById("dob");
            const y = document.getElementById("mobile_number");
            const y = document.getElementById("email");
            let flag = true;
            if (x.value === "") {
                flag = false;
                document.getElementById('error1').innerHTML = "Please fill up the date of birth";
            }
            if (y.value === "") {
                flag = false;
                document.getElementById('error2').innerHTML = "Please fill up the mobile number";
            }
            if (z.value === "") {
                flag = false;
                document.getElementById('error3').innerHTML = "Please fill up the email";
            }
            return flag;
        }
    </script>
</head>
<body>
    <div class="container">
        <h2>Edit Profile</h2>
        <form action="../controller/editProfileController.php" method="post" onsubmit="return validate()">
            <label for="dob">Date of Birth:</label>
            <input type="date" id="dob" name="dob">
            <span id="error1" style="color: red;"></span><br> <!-- Error message placeholder -->
            <label for="mobile_number">Mobile Number:</label>
            <input type="text" id="mobile_number" name="mobile_number">
            <span id="error2" style="color: red;"></span><br> <!-- Error message placeholder -->
            <label for="email">Email:</label>
            <input type="text" id="email" name="email"><br>
            <span id="error3" style="color: red;"></span><br> <!-- Error message placeholder -->
            <input type="submit" value="Update Profile">
        </form>
        <form action="../view/dashboard.php" method="get">
        <input type="submit" value="Go Back">
        </form>
    </div>
</body>
</html>
