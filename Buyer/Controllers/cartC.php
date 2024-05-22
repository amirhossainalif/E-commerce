<?php
session_start();

if(!isset($_SESSION['user']))
{
    header("Location: ../Views/login.php");
}

$user = $_SESSION['user'];
$userId = $_SESSION['userId'];
$pname = $_POST['pnam'];
$pprice = $_POST['ppric'];

if ($_SERVER["REQUEST_METHOD"] === "POST") 
{
    if(isset($_POST['Rem']))
    {
        require_once "database.php";

        $sql = "SELECT * FROM cart where id = '$userId' and Product_name = '$pname'";
        $result = mysqli_query($con, $sql);
        $rowCount = mysqli_num_rows($result);
        if($rowCount>0)
        {
            $sql1 = $con -> prepare("DELETE FROM cart  WHERE  id = ? and Product_name = ?");
            $sql1 -> bind_param("ss", $userId, $pname);
            if($sql1 -> execute()){
                $sql1->close();
                $con -> close();
                header("Location: ../Model/Cart.php");
                exit();
            }
        }

    }

    if(isset($_POST['Pay']))
    {
        
        header("Location: ../Model/PayMethods.php");
        exit();

    }
}