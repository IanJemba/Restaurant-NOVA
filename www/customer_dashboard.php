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
    <li><a href="logout.php">logout</a></li>
    <li><a href="delete_account.php"> Delete My Account</li>
</body>

</html>