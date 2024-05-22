<?php
session_start();

if(!isset($_SESSION['user']))
{
    header("Location: ../Views/login.php");
}
if(isset($_POST['search'])){
    $search = $_POST['search']; 
}
$user = $_SESSION['user'];
$userId = $_SESSION['userId'];

require_once "../Controllers/database.php";

if(!empty($search)){
    $sql1 = "SELECT * FROM cart where id = '$userId' and Product_name LIKE '%$search%' ";
    //$result = $con->query($sql1);
    if($con->query($sql1))
    {
        $result = $con->query($sql1);
    }else{
        echo "No data found";
        $sql1 = "SELECT * FROM cart where id = '$userId' ";
        $result = $con->query($sql1);
    }
}
else{
    $sql1 = "SELECT * FROM cart where id = '$userId' ";
    $result = $con->query($sql1);
}



include "../Controllers/navbarBuyer.php";

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Cart</title>
    </head>
    <style>
        body{
            background-color: #b2beb5;
        }
        button{
            background-color: lightgray;
        }
        a{
            text-decoration: none;
            display: inline;
        }
        ul{
            background-color: #b2beb5;
        }
    </style>
    <script type = "text/javaScript" src = "Search.js"></script>
    <style>
        /*th, td {
            border: 1px solid black;
            border-radius: 10px;
        }*/
        table {
            border-collapse: collapse;
            width: 50%;
        }

        th, td {
            text-align: center;
            padding: 8px;
        }

        tr:nth-child(even){background-color: #f2f2f2}

        th {
            background-color: #04AA6D;
            color: white;
        }
    </style>

<body id="i1">
        <form method="post" action= "../Controllers/cartC.php" novalidate >
    
            <ul>
                <li id = "a"><h3 id = "a"><a href= "Cart.php" >All Orders</a> </h3> </li>
                <li id = "a"><h3 id = "a"> <a href="RateRev.php">Review</a> </h3></li>
            </ul>

            <br><br><center> <input type="text" id= "search" name = "search" placeholder = "Search your product"><button onclick = "return get()"> Search</button></center>
            <br><br>
            <center><table>
                <tr>
                    <th> Product info </th>
                    <th> Amount </th>
                    <th> Status </th>
                    <th> Payment </th>
                    <th> Remove Product </th>
                </tr>
                    <?php
                        while($row = $result->fetch_assoc()) {
                            
                            echo "<tr >";
                            echo '<input type = "hidden" name = "pnam" value = "'.$row["Product_name"].'">';
                            echo  "<td><br>".$row["Product_name"]. "<br></td>";
                            echo '<input type = "hidden" name = "ppric" value = "'.$row["Amount"].'">';
                            echo "<td><br>". $row["Amount"]. "TK <br></td>";
                            echo "<td><br>". $row["Status"]. "<br></td>";
                            echo "<td><br>".'<button type = "submit" name = "Pay"> Pay Now </button>' . "<br></td>";
                            echo "<td><br>". '<button type = "submit" name = "Rem">Remove </button>' . "<br></td>";
                            echo "</tr>";
                            
                        }
                        
                        $con->close();
                    
                    ?>
            </table></center>
            </form>
    </body>
</html>

