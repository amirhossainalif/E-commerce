<?php
require_once('../model/UserModel.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Fetch form data
    $username = $_SESSION['username'];
    $dob = $_POST['dob'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];

    // Create UserModel object
    $userModel = new UserModel($conn);

    // Update user profile
    if ($userModel->updateUser($username, $dob, $mobile, $email)) {
        header("Location: ../view/profileView.php");
        exit();
    } else {
        echo "Error updating profile!";
    }
}
?>
