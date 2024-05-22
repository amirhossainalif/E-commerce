<?php
session_start();

if(!isset($_SESSION['user']))
{
    header("Location: ../Views/login.php");
}

if(isset($_POST['search'])){
    $search = $_POST['search']; 
}

require_once "../Controllers/database.php";

if(!empty($search)){
    $sql1 = "SELECT Product_name, Product_Price, image FROM product where Product_name LIKE '%$search%'";
    //$result = $con->query($sql1);
    if($con->query($sql1))
    {
        $result = $con->query($sql1);
    }else{
        echo "No data found";
        $sql = "SELECT Product_name, Product_Price, image FROM product ";
        $result = $con->query($sql);
    }
}
else{
    $sql = "SELECT Product_name, Product_Price, image FROM product ";
    $result = $con->query($sql);
}
include "../Controllers/navbarBuyer.php";

?>

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
            background-color: lightgray;
        }
    </style>
    <script type = "text/javaScript" src = "search_home.js"></script>
    <body id = "i1" >
        <!--form method="post" action= "../Controllers/wislistAddRem.php" novalidate-->
        
        <center><br><br> <input type="text" id= "search" name = "search" placeholder = "Search your product"><button onclick = "return getData();"> Search</button></br></br></center>
        <form novalidate>
        <center>
            <table>

                <td>
                    <?php
                        echo '<table id = "MyTable">';
                        echo '<style>
                        th, td {
                        border: 1px solid black;
                        border-radius: 10px;
                        }
                        </style>';
                        $count = 0;
                        $c = 0;
                        //$pDetails = array();
                        while($row = $result->fetch_assoc()) {
                            if ($count % 7 == 0) {
                                echo '<tr>';
                            }
                            //$pDetails[] = $row;
                            
                            $_SESSION['img'] = $row["image"];
                            echo "<td>".'<input type = "hidden" name = "img" value = "'.$row["image"].'">';
                            echo "<center>".'<img src="../image/'.$row["image"].'" alt="Uploaded Image" style="max-width: 120px; max-height: 160px; display: block; margin: auto;">';
                            
                            echo '<input type = "hidden" name = "pnam" value = "'.$row["Product_name"].'">';
                            $_SESSION['pnam'] = $row["Product_name"];
                            echo  "<br>".$row["Product_name"]. "<br>";
                            $_SESSION['ppric'] = $row["Product_Price"];
                            echo '<input type = "hidden" name = "ppric" value = "'.$row["Product_Price"].'">';
                            echo "<br> Price: ". $row["Product_Price"]. "TK <br>";
                            echo "<br>".'<button  name = "wishlist" onclick = "getData1()"> Wishlist  </button>' . "<br>";
                            echo "<br>". '<button  name = "cart" onclick = "getData2()"><img src="../Picture/cart.png" alt="Uploaded Image" style="max-width: 20px; max-height: 20px; display: block; margin: auto;"></button>' . "<br>";
                            echo "<br></center></td>";
                            $count++;
                            if ($count % 7 == 0) {
                                echo '</tr>';
                            }
                        }
                        //$_SESSION['pDetails'] = $pDetails;
                        if ($count % 7 != 0) {
                            echo '</tr>';
                        }
                        echo '</table>';
                    //}
                    $con->close();
                    
                    ?>
                </td>
            </table></center>

            <!--script type="text/javascript">
                $(document).ready(function(){
                    $('#search').keyup(function()
                {
                    search_table($(this).val());
                });

                function search_table(value){
                    $('#MyTable tr').each(function(){
                        var found = 'false';
                        $(this).each(function(){
                            $if($(this).text().toLowerCase().indexOf(value.toLowerCase())>=0)
                            {
                                found = 'true'
                            }
                        });
                        if(found=='true')
                        {
                            $(this).show();
                        }
                        else{
                            $(this).hide();
                        }
                    });
                }

                });
            </script-->
            </form>
    </body>
</html>