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
    <title>Delete Account</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* Additional CSS for Delete Account page */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f9f9f9;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        p {
            text-align: center;
            margin-bottom: 30px;
        }

        form {
            display: flex;
            justify-content: center;
            gap: 20px;
        }

        button {
            padding: 10px 20px;
            background-color: #dc3545;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #c82333;
        }
    </style>
</head>

<body>
    <?php require 'header.php' ?>
    <div class="container">
        <h1>User Profile</h1>
        <div>
            <p><strong>Name:</strong> <?php echo isset($_SESSION['name']) ? $_SESSION['name'] : ''; ?></p>
            <p><strong>Email:</strong> <?php echo isset($_SESSION['email']) ? $_SESSION['email'] : ''; ?></p>
            <p>You are logged in as a <?php echo isset($_SESSION['role']) ? $_SESSION['role'] : ''; ?></p>

            <h2>Delete Account</h2>
            <p>Are you sure you want to delete your account?</p>
            <form action="delete_account.php" method="POST">
                <button type="submit" name="confirm">Yes, Delete My Account</button>
            </form>
        </div>
    </div>
    <?php require 'footer.php' ?>
</body>

</html>