<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales Report</title>
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
        const a = document.getElementById("orderId");
        const b = document.getElementById("orderedDate");
        const c = document.getElementById("orderStatus");
        const d = document.getElementById("orderId");

        let flag = true;
        if (a.value === "") {
            flag = false;
            document.getElementById('error1').innerHTML = "Please fill up the order id";
        }
        if (b.value === "") {
            flag = false;
            document.getElementById('error2').innerHTML = "Please fill up the ordered date";
        }
        if (c.value === "") {
            flag = false;
            document.getElementById('error3').innerHTML = "Please fill up the order status";
        }
        if (d.value === "") {
            flag = false;
            document.getElementById('error4').innerHTML = "Please fill up the order id to delete";
        }
        return flag;
    }
    </script>
    
 
</head>
<body>
    <div class="container">
    <h1>Sales Report</h1>
        <h2>Monthly Sales</h2>
        <form action="../controller/salesController.php" method="post" onsubmit="return validate()">
            <input type="hidden" name="action" value="add">
            <label for="">Order ID:</label>
            <input type="text" id="orderId" name="orderId"><br>
            <span id="error1" style="color: red;"></span><br> <!-- Error message for Order ID -->
            <label for="orderedDate">Ordered Date:</label>
            <input type="date" id="orderedDate" name="orderedDate" ><br>
            <span id="error2" style="color: red;"></span><br> <!-- Error message for Ordered Date -->
            <label for="orderStatus">Order Status:</label>
            <input type="text" id="orderStatus" name="orderStatus" ><br>
            <span id="error3" style="color: red;"></span><br> <!-- Error message for Order Status -->
            <input type="submit" value="Add Order">
            <input type="reset" value="Reset">
        </form>
        <form action="../view/dashboard.php" method="get">
            <input type="submit" value="Go Back">
        </form>
    </div>
    
    <div class="container">
        <form action="../controller/orderController.php" method="post" onsubmit="return validate()">
        <h2>Delete Order</h2>
            <input type="hidden" name="action" value="delete">
            <label for="orderIdToDelete">Order ID to Delete:</label>
            <input type="text" id="orderIdToDelete" name="orderIdToDelete"><br>
            <span id="error4" style="color: red;"></span><br> <!-- Error message for Order ID -->
            <input type="submit" value="Delete Order">
            <input type="reset" value="Reset">
        </form>
        <form action="../view/dashboard.php" method="get">
            <input type="submit" value="Go Back">
        </form>
     </div>
</body>
</html>