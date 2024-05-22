<?php
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Reset Password</title>
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
        <form method="post" action="../Controllers/forgetpass.php" onsubmit= "return validate();" novalidate>
        <h1>E-Commerce</h1>   
        <center>
            <table>
                <tr>
                    <td>
        <fieldset>
                <legend>Reset Password</legend><br>
        <table>
                <tr>
                    <th> Email :<br><br></th>
                    <td> <input type="text" id="user" name="user">
                    <span id = "error1"></span>
                        <?php
                            echo isset($_SESSION['UsernameErrMsg']) ? $_SESSION['UsernameErrMsg'] : "";    
                        ?>
                    <br><br></td>
                </tr>
                <tr>
                    <th> Password :<br><br></th>
                    <td> <input type="password" id="Password" name="Password">
                    <span id = "error2"></span>
                        <?php
                            echo isset($_SESSION['PasswordErrMsg']) ? $_SESSION['PasswordErrMsg'] : "";    
                        ?>
                    <br><br></td>
                </tr>
                <tr>
                    <th> Confirm Password :<br><br></th>
                    <td> <input type="password" id="CPassword" name="CPassword">
                    <span id = "error2"></span>
                        <?php
                            echo isset($_SESSION['CPasswordErrMsg']) ? $_SESSION['CPasswordErrMsg'] : "";    
                        ?>
                    <br><br></td>
                </tr>
                <tr>
                    <td> <!--button type="submit" name="submit">Change Password</button-->  
                    
                    </td>
                </tr>
        </table>
        <br> 
        <center>
        <?php
                    if(!empty($_POST['Password']) && !empty($_POST['CPassword']))
                    {
                        if($_POST['Password']==$_POST['CPassword'])
                        {
                            echo "Password reset successful";
                        }
                        else{
                            echo '<button type="submit" name = "Save" >Change Password</button>';
                            echo "Password not matched";
                        }
                    }
                    else{
                        echo '<button type="submit" name= "Save" >Change Password</button>';
                    }
                        
                    ?> </br></br>
                    <a href = "login.php" > LogIN </a></br></center>
                </fieldset>
                </td></tr>
                </table></center>
        </form>
    </body>  
</html>