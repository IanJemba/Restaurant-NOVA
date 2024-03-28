<?php

session_start();

// Check if user is logged in and has admin role
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'customer') {
    // Redirect to login page if not logged in as admin
    header("Location: loginpage.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php require 'header.php' ?>
    <h2>Delete Account</h2>
    <p>Are you sure you want to delete your account?</p>
    <form action="delete_account.php" method="POST">
        <button type="submit" name="confirm">Yes, Delete My Account</button>
        <button type="submit" name="cancel">No, Cancel</button>
    </form>
    <?php require 'footer.php' ?>

</body>

</html>