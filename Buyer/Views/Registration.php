<?php
    session_start();
    if(isset($_SESSION['user']))
    {
        header("Location: ../Model/Deshboard.php");
        exit();
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Registration</title>
    </head>
    <style>
        body{
            background-color: #bcd4e6;
        }
        a{
            text-decoration: none;
        }
        fieldset{
            background-color: #b2beb5;
        }
    </style>
    <script type = "text/javascript" src = "Reg.js"></script>
    <body>
    <h1>E-Commerce</h1>
        <center><h1>Registration</h1></center>
        <form method="post" action= "../Controllers/reg.php" onsubmit= "return validate();" novalidate>
        <center><table>
            <tr>
                <td>
                    <fieldset>
                        <legend>General Information</legend> <br/>
                        <table>
            
                            <tr>
                                <th> Name :<br><br></th>
                                <td> <input type="text" id="fname" name="fname" placeholder = "Enter your name" value="<?php echo isset($_COOKIE['Firstname']) ? $_COOKIE['Firstname'] : ""; ?>">
                                <span id = "error1"></span>
                                <?php
                                echo isset($_SESSION['FirstnameErrMsg']) ? $_SESSION['FirstnameErrMsg'] : "";    
                                ?>
                                <br><br> </td>
                            </tr>

                            <tr>
                                <th> Email :<br><br> </th>
                                <td> <input type="text" id="email" name="email" placeholder = "example@xyz.com" value="<?php echo isset($_COOKIE['Email']) ? $_COOKIE['Email'] : ""; ?>"> 
                                <span id = "error2"></span>
                                <?php 
                                 echo isset($_SESSION['EmailErrMsg']) ? $_SESSION['EmailErrMsg'] : "";
                                 ?>
                                 <br><br> </td>
                               
                            </tr>

                            <tr>
                                <th> Phone/Mobile :<br><br> </th>
                                <span id = "error3"></span>
                                <td> <input type="tel" id="phone" name="phone" placeholder="+880 XXXX-XXXXXX" pattern="[+880] {4} [1] {1} [0-9] {3}-[0-9] {6}" required value = "<?php echo isset($_COOKIE['Phone']) ? $_COOKIE['Phone'] : ""; ?>">
                                <?php 
                                 echo isset($_SESSION['PhoneErrMsg']) ? $_SESSION['PhoneErrMsg'] : "";
                                 ?>
                                 <br><br> </td>
                               
                            </tr>

                            <tr>
                                <th> Address: </th>
                                <td><fieldset>
                                        <legend>Permanent Address</legend>
                                        <table>
                                            <tr> 
                                                <td><select id ="Country" name="Country">
                                                            <option value=""></option>
                                                            <option value="Bangladesh" <?php echo isset($_COOKIE['Country']) && $_SESSION['Country'] === 'Bangladesh' ? 'selected' : ''; ?> >Bangladesh</option>
                                                            <option value="china" <?php echo isset($_COOKIE['Country']) && $_SESSION['Country'] === 'china' ? 'selected' : ''; ?> >China</option>
                                                            <option value="America" <?php echo isset($_COOKIE['Country']) && $_SESSION['Country'] === 'America' ? 'selected' : ''; ?> >America</option>
                                                            <option value="Canada" <?php echo isset($_COOKIE['Country']) && $_SESSION['Country'] === 'Canada' ? 'selected' : ''; ?> >Canada</option>
                                                        </select>
                                                        <span id = "error4"></span>

                                                        <select id ="State" name="State">
                                                            <option value=""></option>
                                                            <option value="Dhaka" <?php echo isset($_COOKIE['State']) && $_SESSION['State'] === 'Dhaka' ? 'selected' : ''; ?> >Dhaka</option>
                                                            <option value="Chittagong" <?php echo isset($_COOKIE['State']) && $_SESSION['State'] === 'Chittagong' ? 'selected' : ''; ?> >Chittagong</option>
                                                            <option value="Khulna" <?php echo isset($_COOKIE['State']) && $_SESSION['State'] === 'Khulna' ? 'selected' : ''; ?> >Khulna</option>
                                                            <option value="Rajshahi" <?php echo isset($_COOKIE['State']) && $_SESSION['State'] === 'Rajshahi' ? 'selected' : ''; ?> >Rajshahi</option>
                                                        </select>
                                                        <span id = "error5"></span>
                                                    <?php 
                                                        echo isset($_SESSION['CountryErrMsg']) ? $_SESSION['CountryErrMsg'] : "";
                                                        echo isset($_SESSION['StateErrMsg']) ? $_SESSION['StateErrMsg'] : "";
                                                    ?>
                            
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><textarea name="message" rows="10" cols="30" placeholder="Road/street/city" value ="<?php echo isset($_COOKIE['Msg']) ? $_COOKIE['Msg'] : ""; ?>"> </textarea>
                                                <span id = "error6"></span>
                                                <?php 
                                                echo isset($_SESSION['MsgErrMsg']) ? $_SESSION['MsgErrMsg'] : "";
                                                    ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><input type="number" id="number" name="number" placeholder="post code" value = "<?php echo isset($_COOKIE['Post']) ? $_COOKIE['Post'] : ""; ?>">
                                                <span id = "error7"></span>
                                                   <?php 
                                                        echo isset($_SESSION['PostErrMsg']) ? $_SESSION['PostErrMsg'] : "";
                                                    ?>
                                                    <br></td>
                                            </tr>
                                        </table>
                                        
                                    </fieldset><br>
                                </td>
                            </tr>

                            <tr>
                                <th> Password: <br><br> </th>
                                <td> <input type="password" id="Password" name="Password" placeholder = "Enter password">
                                <span id = "error8"></span>
                                    <?php
                                        echo isset($_SESSION['PasswordErrMsg']) ? $_SESSION['PasswordErrMsg'] : ""; 
                                    ?> 
                         
                                    <br><br>  </td>
                            </tr>
                            <tr>
                                <th> Confirm Password: <br><br><br><br><br><br><br><br> </th>
                                <td> <input type="password" id="CPassword" name="CPassword" placeholder = "Again retype password">
                                <span id = "error9"></span>
                                    <?php 
                                        echo isset($_SESSION['CPasswordErrMsg']) ? $_SESSION['CPasswordErrMsg'] : "";
                                    ?>  <br><br><br><br><br>
                                    

                                    <?php
                                    if(!empty($_POST['Password']) && !empty($_POST['CPassword']))
                                    {
                                        if($_POST['Password']===$_POST['CPassword'])
                                        {
                                            echo "Registration successful";
                                        }
                                        else{
                                            echo '<button type="submit" name = "Save" >Registration</button>';
                                            echo "Password not matched";
                                        }
                                    }
                                    else{
                                        echo '<button type="submit" name= "Save" >Registration</button>';
                                    }
                                        
                                    ?>
                                    <br><br>
                                    <a href = "login.php" > Already Created! </a></br>
                                
                                </td>
                                      
                            </tr>
                        </table> 
                        
                    </fieldset>
                </td>
            </tr>
        </table></center>
        </form>
    </body>
</html>


