<?php
session_start();

if(!isset($_SESSION['user']))
{
    header("Location: ../Views/login.php");
}
$user = $_SESSION['user'];
$userId = $_SESSION['userId'];

if(isset($_POST['search'])){
    $search = $_POST['search']; 
}

require_once "../Controllers/database.php";
//$sql1 = "SELECT * FROM cart where id = '$userId' ";
//$result = $con->query($sql1);

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
    <head><title>Review product</title></head>
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
    <script type = "text/javaScript" src = "Search.js"></script>
    <body id="i1">
        <form method="post" action= "../Controllers/PMC.php" novalidate>
            <ul>
                <li id = "a"><h3 id = "a"><a href= "Cart.php" >All Orders</a> </h3> </li>
                <li id = "a"><h3 id = "a"> <a href="RateRev.php">Review</a> </h3></li>
            </ul>
            <br><br><center> <input type="text" id= "search" name = "search" placeholder = "Search your product"><button  onclick = "return get1()"> Search</button></center>
            <br><br>
            <center><table>
                <tr>
                    <th> Product info </th>
                    <th> Amount </th>
                    <th> Status </th>
                    <th> Review </th>
                    <th> Action </th>
                </tr>
                    <?php
                        while($row = $result->fetch_assoc()) {
                            if($row["Status"]==="Complete"){
                                echo "<tr>";
                                echo '<input type = "hidden" name = "pnam" value = "'.$row["Product_name"].'">';
                                echo  "<td><br>".$row["Product_name"]. "<br></td>";
                                echo '<input type = "hidden" name = "ppric" value = "'.$row["Amount"].'">';
                                echo "<td><br>". $row["Amount"]. "TK <br></td>";
                                echo "<td><br>". $row["Status"]. "<br></td>";
                                echo "<td><br>". '<input type = "text" cols="30" placeholder="share your experience.." name = "exp" value="'.$row["Review"].'">'. "<br></td>";
                                echo "<td><br>". '<button type = "submit" name = "Rev">Change Review </button>' . "<br></td>";
                                echo "</tr>";
                            }
                        }
                        $con->close();
                    
                    ?>
            </table></center>
        </form>
    </body>
</html>