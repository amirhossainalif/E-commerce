<?php
require_once('../model/UserModel.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the username and new password from the form
    $username = $_POST['username'];
    $newPassword = $_POST['new_password'];

    // Create a new instance of the UserModel
    $userModel = new UserModel($conn);

    // Update the password
    $success = $userModel->updatePassword($username, $newPassword);

    // Check if the password was successfully updated
    if ($success) {
        // Display success message
        echo "Password reset successful. <a href='../view/loginForm.php'>Login</a>";
    } else {
        // Handle error (e.g., display an error message)
        echo "Password reset failed.";
    }
}
?>
