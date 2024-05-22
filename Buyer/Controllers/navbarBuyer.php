<!DOCTYPE html>
<html>
<head>
<style>
  ul{
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: lightgray;
  }

  li {
    float: left;
  }

  li a {
    display: block;
    color: black;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
  }
  a:hover {
  color: green;
}
a:active {
  color: blue;
}

</style>
</head>
<body>

    <ul>
        <li><a href = "../Model/Home.php" > E-commerce </a></li>
        <li style="float:right"><a href = "../Controllers/logout.php">Logout</a></li>
        <li style="float:right"><a href = "../Model/Cart.php"> Cart</a></li>
        <li style="float:right"><a type = "submit" href = "../Model/Deshboard.php">Profile</a></li>
    </ul>

</body>
</html>


