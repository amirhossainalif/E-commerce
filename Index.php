<!DOCTYPE html>
<html>
    <head>
        <title>E-Commarce</title>
    </head>
    <style>
        body{
            background-color: #b2beb5;
            
        }
        button{
            background-color: white;
            text-align: center;
        }
        .cen{
            margin-right: 150px;
        }
        .filds{
            margin-top: 50px;
        }
        .lef{
            margin-right: 50px;
        }
        table {
            border-collapse: collapse;
            width: 50%;
        }

        td {
            text-align: center;
        }
    </style>
    <body>
        <form method="GET" action= "indexC.php" novalidate>
            <center><h1>Welcome</h1>
    </br></br></br>
            
                            <table>
                                <tr>
                                    <td></br><button type = "submit" name = "ad" > <img src="admin.jpg" alt="Uploaded Image" style="max-width: 100px; max-height: 100px; display: block; margin: auto;"></button></td>
                                <!--/tr>
                                <tr-->
                                    <td></br><button type = "submit" name = "emp" > <img src="emp.png" alt="Uploaded Image" style="max-width: 100px; max-height: 100px; display: block; margin: auto;"></button></td>
                                <!--/tr>
                                <tr-->
                                    <td></br><button type = "submit" name = "sell" > <img src="seller.png" alt="Uploaded Image" style="max-width: 100px; max-height: 100px; display: block; margin: auto;"></button></td>
                                <!--/tr>
                                <tr-->
                                    <td></br><button type = "submit" name = "buy" > <img src="buyer.jpg" alt="Uploaded Image" style="max-width: 100px; max-height: 100px; display: block; margin: auto;"></button></td>
                                </tr>
                                <tr>
                                    <td><h2>Admin</h2></td>
                                    <td><h2>Employee</h2></td>
                                    <td><h2>Seller</h2></td>
                                    <td><h2>Buyer</h2></td>
                                </tr>
                            </table>
                            </center>
                        
        </form>
    </body>
</html>