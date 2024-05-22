<?php
session_start();

if(!isset($_SESSION['user']))
{
    header("Location: ../Views/login.php");
}

$user = $_SESSION['user'];

if ($_SERVER["REQUEST_METHOD"] === "POST") 
{
    $isValid = true;
    if(isset($_POST['back']))
    {
        header("Location: ../Model/Deshboard.php");
        exit();
    }

    if(isset($_POST['Save']))
    {
        $Firstname =  $_POST['fname'];
        $nameErrMsg = "";
        $Email = $_POST["email"];
        $EmailErrMsg = "";
        $Phone = $_POST["phone"];
        $numberErrMsg = "";
        $MsgAdd = $_POST['message'];
        $addErrMsg = "";
        $passErrMsg = "";

        if(empty($Firstname))
        {
            $_SESSION['nameErrMsg'] = " Name is empty";
            $isValid = false;
        }
        else{
            //$_SESSION['Firstname'] = $Firstname;
            $_SESSION['nameErrMsg'] = "";
        }

        if(empty($Email))
        {
            $_SESSION['EmailErrMsg'] = "Email is empty";
            $isValid = false;
        }
        else{
            if (!filter_var($Email, FILTER_VALIDATE_EMAIL))
            {
                $_SESSION['EmailErrMsg'] = " Invalid email format";
                $isValid = false;
            }
            else{
                //$_SESSION['Email'] = $Email;
                $_SESSION['EmailErrMsg'] = "";
            }
        }

        if(empty($Phone))
        {
            $_SESSION['numberErrMsg'] = "Phone is empty";
            $isValid = false;
        }
        else{
            if (!preg_match("/^([+880]{4}[1]{1}[0-9]{3}[-][0-9]{6})$/",$Phone))
            {
                $_SESSION['numberErrMsg'] = " Invalid number";
                $isValid = false;
            }
            else{
                //$_SESSION['Phone'] = $Phone;
                $_SESSION['numberErrMsg'] = "";
            }
        }

        if(empty($MsgAdd))
        {
            $_SESSION['addErrMsg'] = "Address is empty";
            $isValid = false;
        }
        else{
            //$_SESSION['Msg'] = $MsgAdd;
            $_SESSION['addErrMsg'] = "";
        }
        
        
        if($isValid === true){
        if(!empty($Firstname) && !empty($Email) && !empty($Phone) && !empty($MsgAdd))
        {
            if(isset($_POST['Password']))
            {
                
                $Password = $_POST["Password"];
                if(!empty($Password))
                {
                    require_once "database.php";
                    $sql = "SELECT * FROM login where Email = '$user'";
                    $result = mysqli_query($con, $sql);
                    $rowCount = mysqli_num_rows($result);
                    if($rowCount>0)
                    {
                        $sql = $con -> prepare("UPDATE login SET Email = ?, password =? WHERE  Email = ?");
                        $sql -> bind_param("sss",$Email, $Password, $user);
                        if($sql -> execute())
                        {
                            $sql1 = "SELECT * FROM reg where Email = '$user'";
                            $result = mysqli_query($con, $sql1);
                            $rowCount = mysqli_num_rows($result);
                            if($rowCount>0)
                            {
                                $sql1 = $con -> prepare("UPDATE reg SET First_name = ?, Email = ?, Phone = ?, address= ?  WHERE  Email = ?");
                                $sql1 -> bind_param("sssss", $Firstname, $Email,$Phone,$MsgAdd, $user);
                                if($sql1 -> execute())
                                {
                                    echo "update Successful";
                                    $sql->close();
                                    $sql1->close();
                                    $con->close();
                                    $_SESSION['user'] = $Email;
                                    header("Location: ../Model/Deshboard.php");
                                    exit();
                                }
                            }
                        }
                        else{
                            echo "pass set error";
                        }
                    }
                    else{
                        echo "error";
                    }
                }
                require_once "database.php";
                    
                            $sql1 = "SELECT * FROM reg where Email = '$user'";
                            $result = mysqli_query($con, $sql1);
                            $rowCount = mysqli_num_rows($result);
                            if($rowCount>0)
                            {
                                $sql1 = $con -> prepare("UPDATE reg SET First_name = ?, Email = ?, Phone = ?, address= ?  WHERE  Email = ?");
                                $sql1 -> bind_param("sssss", $Firstname, $Email,$Phone,$MsgAdd, $user);
                                if($sql1 -> execute())
                                {
                                    echo "update Successful";
                                    $sql1->close();
                                    $con->close();
                                    $_SESSION['user'] = $Email;
                                    header("Location: ../Model/Deshboard.php");
                                    exit();
                                }
                            }
                    else{
                        echo "error";
                    }
            
            }
            else
            {
                require_once "database.php";
                $sql1 = "SELECT * FROM reg where Email = '$user'";
                        $result = mysqli_query($con, $sql1);
                        $rowCount = mysqli_num_rows($result);
                        if($rowCount>0)
                        {
                            $sql1 = $con -> prepare("UPDATE reg SET First_name = ?, Email = ?, Phone = ?, address= ?  WHERE  Email = ?");
                            $sql1 -> bind_param("sssss", $Firstname, $Email,$Phone,$MsgAdd, $user);
                            if($sql1 -> execute())
                            {
                                echo "update Successful";
                                //$sql->close();
                                $sql1->close();
                                $con->close();
                                $_SESSION['user'] = $Email;
                                header("Location: ../Model/Deshboard.php");
                                exit();
                            }
                        }
            }
        }else{
            header("Location: ../Views/Profile.php");
            exit();
        }
    }
    else{
        header("Location: ../Views/Profile.php");
    }
    }

}

?>