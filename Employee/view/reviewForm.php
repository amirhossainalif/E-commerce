<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #3C9192;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: space-between;
        }

        .container {
            max-width: 400px;
            margin: 100px auto;
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

        input[type="reset"] {
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

        input[type="reset"]:hover {
            background-color: #0056b3;
        }
    </style>  
    
<script>
    function validate() {
        const a = document.getElementById("userName");
        const b = document.getElementById("userEmail");
        const c = document.getElementById("phoneNumber");
        const d = document.getElementById("message");

        let flag = true;
        if (a.value === "") {
            flag = false;
            document.getElementById('error1').innerHTML = "Please fill up the user name";
        }
        if (b.value === "") {
            flag = false;
            document.getElementById('error2').innerHTML = "Please fill up the user email";
        }
        if (c.value === "") {
            flag = false;
            document.getElementById('error3').innerHTML = "Please fill up the phone number";
        }
        if (d.value === "") {
            flag = false;
            document.getElementById('error4').innerHTML = "Please fill up the message";
        }
        return flag;
    }
</script>

</head>
<body>
    <div class="container">
    <h1>Reviews</h1>
        <h2>Say something!</h2>
        <form action="../controller/reviewController.php" method="post" onsubmit="return validate()">
            <input type="hidden" name="action" value="add">
            <label for="userName">User Name:</label>
            <input type="text" id="userName" name="userName"><br>
            <span id="error1" style="color: red;"></span><br>
            <label for="userEmail">User Email:</label>
            <input type="email" id="userEmail" name="userEmail" ><br>
            <span id="error2" style="color: red;"></span><br>
            <label for="phoneNumber">Phone Number:</label>
            <input type="number" id="phoneNumber" name="phoneNumber" ><br>
            <span id="error3" style="color: red;"></span><br>
            <label for="message">Message: </label>
            <textarea name="message" class="box" id="" cols="30" rows="5"></textarea> <br>
            <span id="error4" style="color: red;"></span><br>
            <input type="submit" value="Submit">
            <input type="reset" value="Reset">
        </form>
        <form action="../view/dashboard.php" method="get">
            <input type="submit" value="Go Back">
        </form>
    </div>

<?php
    // PHP code to fetch orders from the database and display them
    // Example code to fetch orders from the database and display them
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

    $sql = "SELECT * FROM reviews";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<div class='container'>";
        echo "<h2>Reviews</h2>";
        echo "<table>";
        echo "<tr><th>User Name</th><th>Email</th><th>Phone Number</th><th>Message</th></tr>";
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>".$row["user_name"]."</td><td>".$row["user_email"]."</td><td>".$row["phone_number"]."</td><td>".$row["message"]."</td></tr>";
        }
        echo "</table>";
        echo "</div>";
    } else {
        echo "0 results";
    }
    $conn->close();
    ?>

</body>
</html>