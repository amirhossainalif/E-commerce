<?php
session_start();

if(!isset($_SESSION['user']))
{
    header("Location: ../Views/login.php");
}

$user = $_SESSION['user'];
$userId = $_SESSION['userId'];

if ($_SERVER["REQUEST_METHOD"] === "POST") 
{
    if(isset($_POST['pay']))
    {
        $pm = $_POST['pm'];
        $mbc = $_POST['num'];
        $pnam = $_POST['proname'];
        $pprice = $_POST['proAmount'];
        $com = "Complete";

            require_once "database.php";
            $wait = "Waiting for Payment";
                $sql2 = $con -> prepare("UPDATE cart SET Status = ?  where id = ? and Product_name = ?");
                $sql2 -> bind_param("sis", $com, $userId, $pnam);
                if($sql2 -> execute()){
                    $sql2->close();
                    $sql1 = $con -> prepare("INSERT INTO payment(id, Payment_method, number, Product_name, product_price) VALUES (?,?,?,?,?)");
                    $sql1 -> bind_param("issss", $userId, $pm, $mbc, $pnam, $pprice);
                    if($sql1 -> execute()){
                        $sql1->close();
                        $con -> close();
                        $_SESSION['pay'] = "Payment sucessful";
                        header("Location: ../Model/PayMethods.php");
                        exit();
                    }
                    else{
                        header("Location: ../Model/Home.php");
                        exit();
                    }
                }else{
                    echo "error";
                }
            
            
    }

    if(isset($_POST['Rev']))
    {
        $pnames = $_POST['pnam'];
        $pprices = $_POST['ppric'];
        $expe = $_POST['exp'];

        require_once "database.php";
        $sql2 = $con -> prepare("UPDATE cart SET Review = ?  where id = ? and Product_name = ? and Amount = ?");
        $sql2 -> bind_param("siss", $expe, $userId, $pnames, $pprices);
        if($sql2 -> execute())
        {
            $sql2->close();
            $con -> close();
            header("Location: ../Model/Deshboard.php");
            exit();
        }

    }
}


?>