<?php
session_start();

if($_SERVER["REQUEST_METHOD"]==="POST")
{
    $isValid = true;
    $username = $_POST['user'];
    $UsernameErrMsg = "";
    $Password = $_POST['Password'];
    $PasswordErrMsg = "";

    if(empty($username))
    {
        $_SESSION['UsernameErrMsg'] = "Email is empty";
        $isValid = false;
    }
    else{
        $_SESSION['UsernameErrMsg'] = "";
    }

    if(empty($Password))
    {
        $_SESSION['PasswordErrMsg'] = "Password is empty";
        $isValid = false;
    }
    else{
        $_SESSION['PasswordErrMsg'] = "";
    }

    if($isValid === true)
    {
        if(!empty($username) && !empty($Password))
        {
            require_once "database.php";
            $sql = "SELECT * FROM login where Email = '$username' and password = '$Password'";
            $result = mysqli_query($con, $sql);
            $rowCount = mysqli_num_rows($result);
            if($rowCount>0)
            {
                while($row = $result->fetch_assoc()) {
                    $userId = $row["id"];
                    $email = $row["Email"];
                }
                echo "Login successful";
                $con->close();
                $_SESSION['PasswordErrMsg'] ="";
                $_SESSION['Email'] = $email;
                $_SESSION['user'] = $username;
                $_SESSION['userId'] = $userId;
                header("Location: ../Model/Deshboard.php");
                exit();
            }
            else{
                
                header("Location: ../Views/login.php");
                $_SESSION['PasswordErrMsg'] = "invalid Email or password";
            }
        }
        else{
            
            $_SESSION['PasswordErrMsg'] = "Enter Email or password";
        }
    }
    else{
        header("Location: ../Views/login.php");
    }

}
else{
    echo "Invalid Request";
}
?>