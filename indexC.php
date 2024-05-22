<?php

if ($_SERVER["REQUEST_METHOD"] === "GET") 
{
    if(isset($_GET['ad']))
    {
        header("Location: http://localhost/project/Admin/view/loginForm.php");
        exit();
    }

    if(isset($_GET['emp']))
    {
        header("Location: http://localhost/project/Employee/view/loginForm.php");
        exit();
    }

    if(isset($_GET['sell']))
    {
        header("Location: http://localhost/project/Seller/Index.php");
        exit();
    }
    if(isset($_GET['buy']))
    {
        header("Location: http://localhost/project/Buyer/Index.php");
        exit();
    }
}

?>