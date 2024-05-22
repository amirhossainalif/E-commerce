<?php
    session_start();
    session_destroy();

    
    
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Product Adding</title>
    </head>
    <body>
        <center><h1>Add Product</h1></center>
        <form method="post" action= "ProductC.php" enctype="multipart/form-data" novalidate>

        <center>
            <table>
                <tr>
                    <td>
                        <fieldset>
                            <table>
                                <tr>
                                    <th>Product name<br><br></th>
                                    <td> <input type = "text" name = "pname" placeholder = "Enter product name" value="<?php echo isset($_SESSION['pname']) ? $_SESSION['pname'] : ""; ?>"><br><br>
                                        <?php
                                        echo isset($_SESSION['PnameErrMsg']) ? $_SESSION['PnameErrMsg'] : "";    
                                        ?>
                                    </td>  
                                </tr>
                                <tr>
                                    <th>Product price<br><br></th>
                                    <td> <input type = "text" name = "pprice" placeholder = "Enter product price " value="<?php echo isset($_SESSION['pprice']) ? $_SESSION['pprice'] : ""; ?>"><br><br>
                                        <?php
                                        echo isset($_SESSION['PpriceErrMsg']) ? $_SESSION['PpriceErrMsg'] : "";    
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td><input type = "file" name = "pic" accept = ".jpg, .jpeg, .png">
                                        <?php
                                            echo isset($_SESSION['PicErrMsg']) ? $_SESSION['PicErrMsg'] : "";    
                                        ?>
                                    </td>
                                    <td> <input type = "submit" name = "submit" value ="Upload"></td>
                                </tr>
                                        <?php
                                            echo isset($_SESSION['done']) ? $_SESSION['done'] : "";    
                                        ?>
                                <tr>
                                    <td><br><a href="http://localhost/project/Index.php">Home Page</a></td>
                                </tr>

                            </table>
                        </fieldset>
                    </td>
                </tr>
            </table>
        </center>
        </form>
        
    </body>
</html>