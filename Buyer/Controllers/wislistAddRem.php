<?php
session_start();

if(!isset($_SESSION['user']))
{
    header("Location: ../Views/login.php");
}
$user = $_SESSION['user'];
$userId = $_SESSION['userId'];
$pimg = $_SESSION['img'];
$pname = $_SESSION['pnam'];
$pprice = $_SESSION['ppric'];
//$pd = $_SESSION['pDetails'];


if ($_SERVER["REQUEST_METHOD"] === "GET") 
{
    require_once "database.php";
    $sql2 = $con -> prepare( "INSERT INTO wishlist (id, email, Product_name, Product_Price, image) VALUES (?, ?, ?, ?, ?)");
    $sql2 -> bind_param("sssss", $userId, $user, $pname, $pprice, $pimg);
    if($sql2 -> execute())
    {
        $sql2->close();
        $con -> close();
        header("Location: ../Model/Home.php");
        exit();
    }
}
else{
    $Wait = "Waiting for Payment";
    $rev = "Share your experiance..";
    require_once "database.php";
    $sql1 = $con -> prepare("INSERT INTO cart(id, Product_name, Amount, Status, Review) VALUES (?,?,?,?,?)");
    $sql1 -> bind_param("sssss", $userId, $pname, $pprice, $Wait, $rev);
    if($sql1 -> execute()){
        $sql1->close();
        $con -> close();
        header("Location: ../Model/Deshboard.php");
        exit();
    }
    header("Location: ../Model/Deshboard.php");
    exit();
}


?>
