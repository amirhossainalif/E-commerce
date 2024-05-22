<?php
require_once('../model/UserModel.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['username'], $_POST['new_password'], $_POST['confirm_password'])) {
    $username = $_POST['username'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    if ($new_password === $confirm_password) {
        $userModel = new UserModel($conn);
        // Update the password for the user in the database
        if ($userModel->updateUserPassword($username, $new_password)) {
            echo "Password reset successfully!";
            // Redirect to success page or login page
            header("Location: ../view/changedPasswordSuccess.php");
            exit();
        }
        } else {
            echo "Error resetting password!";
            // Redirect back to reset password form with error message
            header("Location: ../view/resetPasswordForm.php?username=$username&error=error_message");
            exit();
        }
        } else {
        echo "Passwords do not match!";
        // Redirect back to reset password form with error message
        header("Location: ../view/resetPasswordForm.php?username=$username&error=password_mismatch");
        exit();
    }
}
?>
