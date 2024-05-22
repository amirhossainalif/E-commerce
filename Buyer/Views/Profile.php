<?php
    session_start();
    if(!isset($_SESSION['user']))
    {
        header("Location: ../Controllers/logout.php");
        exit();
    }

    $user = $_SESSION['user'];

    require_once "../Controllers/database.php";
    $sql = "SELECT *  FROM reg where Email = '$user'";
    $result = $con->query($sql);

    if($result->num_rows>0)
    {
        while($row = $result->fetch_assoc())
        {
            $name = $row['First_name'];
            $email = $row['Email'];
            $phone= $row['Phone'];
            $add = $row['address'];
        }
    }
    include "../Controllers/navbarBuyer.php";
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Profile</title>
    </head>
    <style>
        body{
            background-color: #b2beb5;
        }
    </style>
    <script type = "text/javascript" src = "Prof.js"></script>
    <body>
        <center></br><h2>Profile</h2></br>
        <form method="post" action= "../Controllers/ProfileC.php" onsubmit= "return validate();" novalidate>
        <table>
            <tr>
                <th> Name : </th>
                <?php
                        echo "<td>". '<input type="text" id="fname" name="fname"  value="'.$name.'">'."</td>";
                ?>
                <td><span id = "error1"></span></td>
                <?php
                    echo isset($_SESSION['nameErrMsg']) ? $_SESSION['nameErrMsg'] : "";    
                ?>
            </tr>

            <tr>
                <th> Email : </th>
                <?php
                        echo "<td>". '<input type="text" id="email" name="email" placeholder = "example@xyz.com" value="'.$email.'">'."</td>";
                ?>
                <td><span id = "error2"></span></td>
                <?php
                    echo isset($_SESSION['EmailErrMsg']) ? $_SESSION['EmailErrMsg'] : "";    
                ?>
            </tr>

            <tr>
                <th> Phone/Mobile : </th>
                <?php
                        echo "<td>". '<input type="tel" id="phone" name="phone" placeholder="+880 XXXX-XXXXXX" pattern="[+880] {4} [1] {1} [0-9] {3}-[0-9] {6}" required value = "'.$phone.'">'."</td>";
                ?>
                <td><span id = "error3"></span></td>
                <?php
                    echo isset($_SESSION['numberErrMsg']) ? $_SESSION['numberErrMsg'] : "";    
                ?>
            </tr>

            <tr>
                <th> Address : </th>
                <?php
                        echo "<td>". '<input type = "text" name="message" placeholder="Road/street/city" value ="'.$add.'">'."</td>";
                ?>
                <td><span id = "error4"></span></td>
                <?php
                    echo isset($_SESSION['addErrMsg']) ? $_SESSION['addErrMsg'] : "";    
                ?>
            </tr>

            <tr>
                <th> Password : </th>
                <td><input type="password" id="Password" name="Password" placeholder = "Enter new password"><span id = "error5"></span></td>
                <?php
                    echo isset($_SESSION['passErrMsg']) ? $_SESSION['passErrMsg'] : "";    
                ?>
            </tr>
        </table>
        <br><br><button type="submit" name= "Save" >Update</button><br><br>
        <button type="submit" name= "back" >Back</button>
    </center>
        </form>
    </body>
</html>