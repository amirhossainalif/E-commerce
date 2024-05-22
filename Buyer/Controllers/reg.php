<?php
session_start();

if($_SERVER["REQUEST_METHOD"]==="POST")
{
    $isValid = true;
    $Firstname =  $_POST['fname'];
    $FirstnameErrMsg = "";
    $Email = $_POST["email"];
    $EmailErrMsg = "";
    $Phone = $_POST["phone"];
    $PhoneErrMsg = "";
    $Country = $_POST['Country']; 
    $CountryErrMsg = "";
    $State = $_POST['State'];
    $StateErrMsg = "";
    $MsgAdd = $_POST['message'] . ", " . $_POST['State'] . "-" . $_POST['number'] . ", " . $_POST['Country'];
    $Msg = $_POST['message'];
    $MsgErrMsg = "";
    $Post = $_POST['number'];
    $PostErrMsg = "";
    $Password = $_POST["Password"];
    $PasswordErrMsg = "";
    $CPassword = $_POST["CPassword"];
    $CPasswordErrMsg = "";

    if(empty($Firstname))
    {
        $_SESSION['FirstnameErrMsg'] = "First Name is empty";
        $isValid = false;
    }
    else{
        $_SESSION['Firstname'] = $Firstname;
        setcookie("Firstname",$Firstname,time()+60*60*24*30,"/");
        $_SESSION['FirstnameErrMsg'] = "";
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
            $_SESSION['Email'] = $Email;
            setcookie("Email",$Email,time()+60*60*24*30,"/");
            $_SESSION['EmailErrMsg'] = "";
        }
    }

    if(empty($Phone))
    {
        $_SESSION['PhoneErrMsg'] = "Phone is empty";
        $isValid = false;
    }
    else{
        if (!preg_match("/^([+880]{4}[1]{1}[0-9]{3}[-][0-9]{6})$/",$Phone))
        {
            $_SESSION['PhoneErrMsg'] = " Invalid number";
            $isValid = false;
        }
        else{
            $_SESSION['Phone'] = $Phone;
            setcookie("Phone",$Phone,time()+60*60*24*30,"/");
            $_SESSION['PhoneErrMsg'] = "";
        }
    }

    if(empty($Country))
    {
        $_SESSION['CountryErrMsg'] = "Country is empty";
        $isValid = false;
    }
    else{
        $_SESSION['Country'] = $Country;
        setcookie("Country",$Country,time()+60*60*24*30,"/");
        $_SESSION['CountryErrMsg'] = "";
    }

    if(empty($State))
    {
        $_SESSION['StateErrMsg'] = "State is empty";
        $isValid = false;
    }
    else{
        $_SESSION['State'] = $State;
        setcookie("State",$State,time()+60*60*24*30,"/");
        $_SESSION['StateErrMsg'] = "";
    }

    if(empty($Msg))
    {
        $_SESSION['MsgErrMsg'] = "Address is empty";
        $isValid = false;
    }
    else{
        $_SESSION['Msg'] = $Msg;
        setcookie("Msg",$Msg,time()+60*60*24*30,"/");
        $_SESSION['MsgErrMsg'] = "";
    }

    if(empty($Post))
    {
        $_SESSION['PostErrMsg'] = "Post Code is empty";
        $isValid = false;
    }
    else{
        $_SESSION['Post'] = $Post;
        setcookie("Post",$Post,time()+60*60*24*30,"/");
        $_SESSION['PostErrMsg'] = "";
    }

    if(empty($Password))
    {
        $_SESSION['PasswordErrMsg'] = "Password is empty";
        $isValid = false;
    }
    else{
        if(!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/', $Password))
        {
            $_SESSION['PasswordErrMsg'] = " use minimum 1 special character, 1 upper, 1 lower character, number";
            $isValid = false;
        }
        else{
            $_SESSION['Password'] = $Password;
            $_SESSION['PasswordErrMsg'] = "";
        }
    }

    if(empty($CPassword))
    {
        $_SESSION['CPasswordErrMsg'] = "Confirm Password is empty";
        $isValid = false;
    }
    else{
        if(!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/', $CPassword))
        {
            $_SESSION['CPasswordErrMsg'] = " use minimum 1 special character, 1 upper, 1 lower character, number";
            $isValid = false;
        }
        else{
            $_SESSION['CPassword'] = $CPassword;
            $_SESSION['CPasswordErrMsg'] = "";
        }
    }

    $errors = array();

    if($isValid === true){
            if(!empty($Firstname) && !empty($Email) && !empty($Phone)  && !empty($Country) && !empty($State) && !empty($Msg) && !empty($Post) && !empty($Password) && !empty($CPassword))
            {
                    if($Password===$CPassword)
                    {
                        require_once "database.php";
                        $sql = "SELECT * FROM reg WHERE Email = '$Email'";
                        $result = mysqli_query($con, $sql);
                        $rowCount = mysqli_num_rows($result);
                        if($rowCount>0)
                        {
                            array_push($errors, "Email already exists");
                        }
                        if(count($errors)>0)
                        {
                            foreach($errors as $error)
                            {
                                echo $error;
                            }
                        }
                        else
                        {
                            $sql1 = $con -> prepare( "INSERT INTO reg (First_name, Email, Phone, address) VALUES (?, ?, ?, ?)");
                            $sql1 -> bind_param("ssss", $Firstname, $Email, $Phone, $MsgAdd);
                            $sql2 =$con ->prepare( "INSERT INTO login (Email, password) VALUES (?,?)");
                            $sql2 -> bind_param("ss", $Email, $Password);
                            if($sql1->execute())
                            {
                                    $sql1->close();
                                    if($sql2->execute())
                                    {
                                        echo "successfully registered";
                                        $sql2 ->close();
                                        $con->close();
                                        $_SESSION['CPasswordErrMsg'] = "";
                                        session_destroy();
                                        header("Location: ../Views/login.php");
                                        exit();
                                    }
                                
                            }
                            else{
                                die("Something went wrong");
                            }
                        }
                    }
                    else{
                        $_SESSION['CPasswordErrMsg'] = "password doesn't match";
                    }
            }
            else{
                $_SESSION['CPasswordErrMsg'] = "Please fill all the fields";
            }
    }
    else{
        header("Location: ../Views/Registration.php");
    }
}
else{
    echo "Invalid Request";
}
?>