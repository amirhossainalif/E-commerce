<?php
session_start();

if(!isset($_SESSION['user']))
{
    header("Location: ../Views/login.php");
}

$user = $_SESSION['user'];
$userId = $_SESSION['userId'];
$pimg = $_POST['img'];
$pname = $_POST['pnam'];
$pprice = $_POST['ppric'];

if ($_SERVER["REQUEST_METHOD"] === "POST") 
{
    if(isset($_POST['Logout']))
    {
        header("Location: ../Controllers/logout.php");
        exit();
    }

    if(isset($_POST['cart']))
    {
        header("Location: ../Model/Cart.php");
        exit();
    }

    if(isset($_POST['MO']))
    {
        header("Location: ../Model/Cart.php");
        exit();
    }

    if(isset($_POST['settings']))
    {
        header("Location: ../Views/Profile.php");
        exit();
    }

    if(isset($_POST['pm']))
    {
        header("Location: ../Model/PayMethods.php");
        exit();
    }

    if(isset($_POST['Addcart']))
    {
        require_once "database.php";
            $wait = "Waiting for Payment";
            $sql1 = $con -> prepare("INSERT INTO cart(id, Product_name, Amount, Status) VALUES (?,?,?,?)");
            $sql1 -> bind_param("isss", $userId, $pname, $pprice, $wait);
            if($sql1 -> execute()){
                $sql1->close();
                $con -> close();
                header("Location: ../Model/Deshboard.php");
                exit();
            }
    }

    if(isset($_POST['wishlistRemove']))
    {
        require_once "database.php";
        $sql = "SELECT * FROM wishlist where id = '$userId' and Product_name = '$pname'";
        $result = mysqli_query($con, $sql);
        $rowCount = mysqli_num_rows($result);
        if($rowCount>0)
        {
            $sql1 = $con -> prepare("DELETE FROM wishlist  WHERE  id = ? and Product_name = ?");
            $sql1 -> bind_param("ss", $userId, $pname);
            if($sql1 -> execute()){
                $sql1->close();
                $con -> close();
                echo '<script> console.log("Removed from wishlist") </script>';
                header("Location: ../Model/Deshboard.php");
                exit();
            }
        }
    }

}

?>