<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Management</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
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
    <h1>Order Management</h1>
    <div class="container">
        <h2>Add Order</h2>
        <form action="../controller/orderManagementController.php" method="post" onsubmit="return validate()">
            <input type="hidden" name="action" value="add">
            <label for="orderedDate">Ordered Date:</label>
            <input type="date" id="orderedDate" name="orderedDate" ><br><br>
            <span id="error1" style="color: red;"></span><br> <!-- Error message for Ordered Date -->
            <label for="orderId">Order ID:</label>
            <input type="text" id="orderId" name="orderId"><br><br>
            <span id="error2" style="color: red;"></span><br> <!-- Error message for Order ID -->
            <label for="orderStatus">Order Status:</label>
            <input type="text" id="orderStatus" name="orderStatus" ><br><br>
            <span id="error3" style="color: red;"></span><br> <!-- Error message for Order Status -->
            <input type="submit" value="Add Order">
        </form>

        <!-- Display existing orders with edit and delete options -->
        <?php
        // Include the database connection code
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

        // Include the OrderModel
        require_once('../model/OrderModel.php');

        // Create an instance of OrderModel
        $orderModel = new OrderModel($conn);

        // Fetch all orders
        $orders = $orderModel->getAllOrders();

        // Display orders in a table
        echo "<table>";
        echo "<tr><th>Ordered Date</th><th>Order ID</th><th>Order Status</th><th>Edit</th><th>Delete</th></tr>";
        foreach ($orders as $order) {
            echo "<tr>";
            echo "<td>" . $order['ordered_date'] . "</td>";
            echo "<td>" . $order['order_id'] . "</td>";
            echo "<td>" . $order['order_status'] . "</td>";
            echo "<td><a href='editOrderForm.php?orderId=" . $order['order_id'] . "'>Edit</a></td>";
            echo "<td>
                    <form action='../controller/orderManagementController.php' method='post'>
                        <input type='hidden' name='action' value='delete'>
                        <input type='hidden' name='orderId' value='" . $order['order_id'] . "'>
                        <input type='submit' value='Delete'>
                    </form>
                  </td>";
            echo "</tr>";
        }
        echo "</table>";

        ?>
    </div>
    <form action="../view/dashboard.php" method="get">
        <input type="submit" value="Home Page">
    </form>

    <script>
    function validate() {
        const x = document.getElementById("orderedDate");
        const y = document.getElementById("orderId");
        const z = document.getElementById("orderStatus");
        const error1 = document.getElementById('error1');
        const error2 = document.getElementById('error2');
        const error3 = document.getElementById('error3');

        let flag = true;
        error1.innerHTML = ""; 
        error2.innerHTML = ""; 
        error3.innerHTML = ""; 

        if (x.value === "") {
            flag = false;
            error1.innerHTML = "Please fill up the ordered date";
        }
        if (y.value === "") {
            flag = false;
            error2.innerHTML = "Please fill up the order ID";
        }
        if (z.value === "") {
            flag = false;
            error3.innerHTML = "Please fill up the order status";
        }

        return flag;
    }
    </script>

</body>
</html>
