<?php
$hostName = "localhost";
$dbUser = "root";
$dbPass = "";
$dbName = "testlogin";
//$dbName = "my_app";


$con = new mysqli($hostName, $dbUser, $dbPass, $dbName);

if(!$con)
{
    die("Something Wrong!");
}
?>