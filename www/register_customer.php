<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <link rel="stylesheet" href="styles.css">

</head>

<body>
    <?php require 'header.php' ?>
    <div class="form-container">
        <h2 class="form-title">User Registration</h2>
        <form action="register_customer_process.php" method="POST">
            <div class="form-group">
                <label for="name">Name:</label><br>
                <input type="text" id="name" name="name" required>
            </div>

            <div class="form-group">
                <label for="street">Street:</label><br>
                <input type="text" id="street" name="street" required>
            </div>

            <div class="form-group">
                <label for="huisnummer">Huisnummer:</label><br>
                <input type="text" id="huisnummer" name="huisnummer" required>
            </div>

            <div class="form-group">
                <label for="postcode">Postcode:</label><br>
                <input type="text" id="postcode" name="postcode" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label><br>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="password">Password:</label><br>
                <input type="password" id="password" name="password" required>
            </div>

            <input type="hidden" id="role" name="role" value="customer">

            <button type="submit" class="form-submit">Register</button>
        </form>
        <div class="form-link">
            <p>Already have an account? <a href="login.php">Login</a></p>
        </div>
    </div>
    <?php require 'footer.php' ?>

</body>

</html>