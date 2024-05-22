<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Support</title>
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
            max-width: 800px; /* Adjust as needed */
            margin: 100px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1, h2 {
            color: #333;
        }

        p {
            color: #666;
            margin-bottom: 15px;
        }

        form {
            margin-top: 20px;
        }

        input[type="submit"], input[type="reset"] {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-right: 10px;
        }

        input[type="submit"]:hover, input[type="reset"]:hover {
            background-color: #0056b3;
        }

        .support-section {
            margin-top: 20px;
        }

        .support-section table {
            width: 100%;
            border-collapse: collapse;
        }

        .support-section table th, .support-section table td {
            padding: 10px;
            border: 1px solid #ddd;
        }

        .support-section table th {
            background-color: #f2f2f2;
        }
    </style>  
    
<script>
    function validate() {
        const a = document.getElementById("userName");
        const b = document.getElementById("message");

        let flag = true;
        if (a.value === "") {
            flag = false;
            document.getElementById('error1').innerHTML = "Please fill up the user name";
        }
        if (b.value === "") {
            flag = false;
            document.getElementById('error4').innerHTML = "Please fill up the message";
        }
        return flag;
    }
</script>

</head>
<body>
    <div class="container">
        <h1>Customer Support</h1>
        <div class="form-section">
            <h2>Reply to Customer</h2>
            <form action="../controller/supportController.php" method="post" onsubmit="return validate()">
                <input type="hidden" name="action" value="add">
                <label for="userName">User Name:</label>
                <input type="text" id="userName" name="userName"><br>
                <span id="error1" style="color: red;"></span><br>
                <label for="message">Reply to customer:</label>
                <textarea name="message" id="message" cols="30" rows="5"></textarea> <br>
                <span id="error4" style="color: red;"></span><br>
                <input type="submit" value="Submit">
                <input type="reset" value="Reset">
            </form>
        </div>
        <div class="support-section">
            <h2>Support Questions</h2>
            <?php
            $dbHost = 'localhost';
            $dbUsername = 'root'; 
            $dbPassword = '';
            $dbName = 'my_app';

            $conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM support";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "<table>";
                echo "<tr><th>User Name</th><th>Message</th></tr>";

                while($row = $result->fetch_assoc()) {
                    echo "<tr><td>".$row["userName"]."</td><td>".$row["message"]."</td></tr>";
                }
                echo "</table>";
            } else {
                echo "<p>No support questions found.</p>";
            }
            $conn->close();
            ?>
        </div>
        <form action="../view/dashboard.php" method="get">
            <input type="submit" value="Go Back">
        </form>
    </div>
</body>
</html>
