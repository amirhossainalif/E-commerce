<?php
session_start();
require_once('../controller/profileController.php'); // Include the controller file

// Now, $user is available here due to including the controller file
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <style>
        /* Your CSS styles here */
    </style>
</head>
<body>
    <h1>Profile</h1>
    <p>Username: <?php echo $user['username']; ?></p>
    <p>Date of Birth: <?php echo $user['dob']; ?></p>
    <p>Mobile Number: <?php echo isset($user['mobile_number']) ? $user['mobile_number'] : 'Not available'; ?></p>
    <p>Email: <?php echo $user['email']; ?></p>
    <a href="editProfileForm.php">Edit Profile</a>
</body>
</html>
