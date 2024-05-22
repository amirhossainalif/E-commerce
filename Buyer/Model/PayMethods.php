<?php
session_start();

if(!isset($_SESSION['user']))
{
    header("Location: ../Views/login.php");
}
$user = $_SESSION['user'];
$userId = $_SESSION['userId'];

include "../Controllers/navbarBuyer.php";

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Payment Methods</title>
    </head>
    <style>
        body{
            background-color: #b2beb5;
        }
        button{
            background-color: lightgray;
        }
        1{
            position: relative;
            margin: 160px;
            background-color: #b2beb5;
        }
    </style>
    <script type = "text/javascript" src = "PayM.js"></script>
<body>    
    <form method="post" action= "../Controllers/PMC.php" onsubmit= "return validate();" novalidate>
        <center>
            <h1>Payment Methods </h1>
    </br></br>
            <table>
                <tr>
                    <th>
                        <img src="../Picture/bkash.jpg" alt="Bkash Image" style="max-width: 210px; max-height: 200px; display: block; margin: auto;">
                    </th>
                    <th>
                        <img src="../Picture/Nogod.jpg" alt="Nogod Image" style="max-width: 230px; max-height: 200px; display: block; margin: auto;">
                    </th>
                    <th>
                        <img src="../Picture/Card.png" alt="Card Image" style="max-width: 195px; max-height: 200px; display: block; margin: auto;">
                    </th>
                </tr>
                
            </table>
    </br></br>
    <table>
        <tr>
                <td><label for="pm">Choose Payment method:</label></td>
                <td><select id="pm" name="pm" >
                    <option value="Bkash">Bkash</option>
                    <option value="Nogod">Nogod</option>
                    <option value="Card">Card</option>
                </select></td>
                <td><span id = "error1"></span></td>
        </tr>
        <tr>
                <td><label for="num">Enter number:</label></br></td>
                <td><input type="text" id="num" name="num" placeholder = "Mobile banking or card.."></br></td>
                <td><span id = "error2"></span></td>
        </tr>
        <tr>
                <td><label for="proname">Enter product name:</label></br></td>
                <td><input type="text" id="proname" name="proname" placeholder = "Product name..."></br></td>
                <td><span id = "error3"></span></td>
        </tr>
        <tr>
                <td><label for="proAmount">Enter product price:</label></br></td>
                <td><input type="text" id="proAmount" name="proAmount" placeholder = "Product Price..."></br></td>
                <td><span id = "error4"></span></td>
        </tr>
    </table>
    </br></br>
            <button type="submit" name = "pay">PayNow</button>
            <h4> please complete all the fields correctly <h4>
        </center>
    </form>
</body>
</html>