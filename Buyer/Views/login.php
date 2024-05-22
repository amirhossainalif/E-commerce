<?php
session_start();
if(isset($_SESSION['user']))
{
    header("Location: ../Model/Deshboard.php");
    exit();
}
else{
    session_destroy();
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
    </head>
    <style>
        body{
            background-color: #bcd4e6;
        }
        a{
            text-decoration: none;
        }
        fieldset{
            position: relative;
            margin: 160px;
            background-color: #b2beb5;
        }
    </style>
    <script type = "text/javascript" src = "login.js"></script>
    <body>
        <form method="post" action="../Controllers/Login.php" onsubmit= "return validate();" novalidate>
        <h1>E-Commerce</h1>
        <center>
            <table>
            <tr>
                <td>
        <fieldset>
                <legend>LOGIN</legend><br>
        <table>
                <tr>
                    <th> Email : <br><br></th>
                    <td> <input type="text" id="user" name="user">
                    <span id = "error1"></span>
                        <?php
                            echo isset($_SESSION['UsernameErrMsg']) ? $_SESSION['UsernameErrMsg'] : "";    
                        ?>
                    <br><br></td>
                </tr>
                <tr>
                    <th> Password : <br><br></th>
                    <td> <input type="password" id="Password" name="Password">
                    <span id = "error2"></span>
                        <?php
                            echo isset($_SESSION['PasswordErrMsg']) ? $_SESSION['PasswordErrMsg'] : "";    
                        ?>
                    <br><br></td>
                </tr>
                <tr>
                    <td> </td>
                </tr>
        </table>
        <br> 
        <center> <button type="submit" name="submit">Login</button></br></br> 
        <a href = "Forget.php" > Forget Passwod! </a></br>
        <a href="Registration.php">Create a new account</a><br>
        <a href="http://localhost/project/Index.php">Home Page</a></center>
        </fieldset>
    </td></tr>
        </table></center>
        </form>
    </body>
</html>
