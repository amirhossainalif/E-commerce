<?php
    session_start();
    if($_SERVER["REQUEST_METHOD"]==="POST")
    {
        $isValid = true;
        $Pname = $_POST["pname"];
        $PnameErrMsg = "";
        $Pprice = $_POST["pprice"];
        $PpriceErrMsg = "";
        $PicErrMsg = "";
        $done ="";

        if(empty($Pname))
        {
            $_SESSION['PnameErrMsg'] = "Product name is empty";
            $isValid = false;
        }
        else{
            $_SESSION['pname'] = $Pname;
            $_SESSION['PnameErrMsg'] = "";
        }
        if(empty($Pprice))
        {
            $_SESSION['PpriceErrMsg'] = "Product price is empty";
            $isValid = false;
        }
        else{
            $_SESSION['pprice'] = $Pprice;
            $_SESSION['PpriceErrMsg'] = "";
        }

        if($isValid === true)
        {
                $hostName = "localhost";
                $dbUser = "root";
                $dbPass = "";
                $dbName = "my_app";
                
                
                $con = new mysqli($hostName, $dbUser, $dbPass, $dbName);
                
                if(!$con)
                {
                    die("Something Wrong!");
                }

                $image = $_FILES['pic']['name'];
                $target = "http://localhost/project/Buyer/image/".basename($image);
            
                
                // Insert image file name into database
                $sql = "INSERT INTO products( Product_name, Product_Price, image) VALUES ('$Pname', '$Pprice','$image')";
                mysqli_query($con, $sql);
            
                // Move uploaded image to folder
                move_uploaded_file($_FILES['pic']['tmp_name'], $target);
                $con->close();
                $_SESSION['done'] = "Product Added Successfully";
                header("Location: Product.php");
                exit();
        }
        else
        {
            header("Location: Product.php");
        }
        

    }
?>