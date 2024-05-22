<?php
require_once('../model/UserModel.php');

// Establish database connection
$conn = new mysqli("localhost", "root", "", "my_app");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $dob = $_POST['dob'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $security_question = $_POST['security_question'];
    $security_answer = $_POST['security_answer'];

    $userModel = new UserModel($conn);

    $existingUser = $userModel->getUser($username);
    if ($existingUser) {
        echo "Username already exists!";
    } else {
        if ($userModel->createUser($username, $password, $dob, $mobile, $email, $security_question, $security_answer)) {
            header("Location: ../view/registrationSuccess.php");
            exit();
        } else {
            echo "Error creating user!";
        }
    }
}
?>
