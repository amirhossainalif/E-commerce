<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Management</title>
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
        const a = document.getElementById("productId");
        const b = document.getElementById("productName");
        const c = document.getElementById("productStatus");
        const d = document.getElementById("productPrice");
        const d = document.getElementById("productId");

        let flag = true;
        if (a.value === "") {
            flag = false;
            document.getElementById('error1').innerHTML = "Please fill up the product id";
        }
        if (b.value === "") {
            flag = false;
            document.getElementById('error2').innerHTML = "Please fill up the product name";
        }
        if (c.value === "") {
            flag = false;
            document.getElementById('error3').innerHTML = "Please fill up the product status";
        }
        if (d.value === "") {
            flag = false;
            document.getElementById('error4').innerHTML = "Please fill up the product price";
        }
        if (e.value === "") {
            flag = false;
            document.getElementById('error5').innerHTML = "Please fill up the product id to delete";
        }
        return flag;
    }
    </script>
 
</head>
<body>
    <div class="container">
    <h1>Product Management</h1>
        <h2>Add Product</h2>
        <form action="../controller/productController.php" method="post" onsubmit="return validate()">
            <input type="hidden" name="action" value="add">
            <label for="productId">Product ID:</label>
            <input type="text" id="productId" name="productId"><br>
            <span id="error1" style="color: red;"></span><br> <!-- Error message for product ID -->
            <label for="productName">Product Name:</label>
            <input type="text" id="productName" name="productName" ><br>
            <span id="error2" style="color: red;"></span><br> <!-- Error message for product name -->
            <label for="productStatus">Product Status:</label>
            <input type="text" id="productStatus" name="productStatus" ><br>
            <span id="error3" style="color: red;"></span><br> <!-- Error message for product Status -->
            <label for="productPrice">Product Price:</label>
            <input type="text" id="productPrice" name="productPrice" ><br>
            <span id="error4" style="color: red;"></span><br> <!-- Error message for product price -->
            <input type="submit" value="Add product">
            <input type="reset" value="Reset">
        </form>
        <form action="../view/dashboard.php" method="get">
            <input type="submit" value="Go Back">
        </form>
    </div>
        
    <div class="container">
        <form action="../controller/productController.php" method="post" onsubmit="return validate()">
        <h2>Delete Product</h2>
            <input type="hidden" name="action" value="delete">
            <label for="productIdToDelete">Product ID to Delete:</label>
            <input type="text" id="productIdToDelete" name="productIdToDelete"><br>
            <span id="error5" style="color: red;"></span><br> <!-- Error message for product ID To Delete-->
            <input type="submit" value="Delete Product">
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

    $sql = "SELECT * FROM products";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<div class='container'>";
        echo "<h2>Products</h2>";
        echo "<table>";
        echo "<tr><th>Product ID</th><th>Product Name</th><th>Product Status</th><th>Product Price</th></tr>";
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>".$row["product_id"]."</td><td>".$row["product_name"]."</td><td>".$row["product_status"]."</td><td>".$row["product_price"]."</td></tr>";
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