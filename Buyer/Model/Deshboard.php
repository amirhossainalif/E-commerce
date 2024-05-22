<?php
session_start();

if(!isset($_SESSION['user']))
{
    header("Location: ../Views/login.php");
}
$user = $_SESSION['user'];
//$email = $_SESSION['Email'];
$userId = $_SESSION['userId'];

require_once "../Controllers/database.php";
$sql = "SELECT First_name FROM reg where Email = '$user' ";
$result = $con->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $name = $row["First_name"];
    }
}

$sql1 = "SELECT * FROM wishlist where id = '$userId' ";
$result = $con->query($sql1);

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Deshboard</title>
    </head>
    <style>
        body{
            background-color: #b2beb5;
            
        }
        button{
            background-color: lightgray;
            text-align: center;
        }
        .cen{
            margin-right: 150px;
        }
        .filds{
            margin-top: 50px;
        }
        .lef{
            margin-right: 50px;
        }
    </style>
    <body>
        <form method="post" action= "../Controllers/DeshBoard.php" novalidate>

        <?php
            include "../Controllers/navbarBuyer.php";
        ?>
            <center><h1>Welcome, <?php echo $name; ?> <h1></center>
            <table class = "lef">
                <tr>
                    <td>
                        <fieldset class = "filds">
                            <table>
                                <tr>
                                    <td></br><h2> Deshboard</h2></td>
                                </tr>
                                <tr>
                                    <td></br><button type = "submit" name = "pm" > Payment Method</button></td>
                                </tr>
                                <tr>
                                    <td></br><button type = "submit" name = "settings" > Settings</button></td>
                                </tr>
                                <tr>
                                    <td></br><button type = "submit" name = "MO" > My Order</button></td>
                                </tr>
                                <tr>
                                    <td></br><button type = "submit" name = "cart" > Cart</button></td>
                                </tr>
                                <tr>
                                    <td></br><button type = "submit" name = "Logout" > Logout</button></br></br></td>
                                </tr>
                            </table>
                        </fieldset>
                    </td>
                    <td ><table class="cen"></table></td>
                    <td>
                    <fieldset >
                            <div>Wishlist</div>
                            <table class="t" id = "MyTable">
                            <?php
                        echo "";
                        $count = 0;
                        $c = 0;
                        while($row = $result->fetch_assoc()) {
                            if ($count % 5 == 0) {
                                echo '<tr>';
                            }
                            echo "<td>".'<input type = "hidden" name = "img" value = "'.$row["image"].'">';
                            echo "<td><center>".'<img src="../image/'.$row["image"].'" alt="Uploaded Image" style="max-width: 120px; max-height: 160px; display: block; margin: auto;">';
                            echo '<input type = "hidden" name = "pnam" value = "'.$row["Product_name"].'">';
                            echo  "<br>".$row["Product_name"]. "<br>";
                            echo '<input type = "hidden" name = "ppric" value = "'.$row["Product_Price"].'">';
                            echo "<br> Price: ". $row["Product_Price"]. "TK <br>";
                            echo "<br>". '<button type = "submit" name = "Addcart"> <img src="../Picture/cart.png" alt="Uploaded Image" style="max-width: 20px; max-height: 20px; display: block; margin: auto;"></button>' . "<br>";
                            echo "<br>".'<button type = "submit" name = "wishlistRemove"> Wishlist Remove </button>' . "<br>";
                            echo "<br></center></td>";
                            $count++;
                            if ($count % 5 == 0) {
                                echo '</tr>';
                            }
                        }
                        if ($count % 5 != 0) {
                            echo '</tr>';
                        }
                        echo "";
                    //}
                    $con->close();
                    
                    ?>
                    </table>
                        </fieldset>
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>