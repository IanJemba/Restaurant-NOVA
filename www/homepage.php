<?php require 'header.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        .welcome {
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
        }

        .welcome-content {
            text-align: center;
        }

        .welcome-content h1 {
            font-size: 3rem;
            margin-bottom: 20px;
        }

        .welcome-content p {
            font-size: 1.5rem;
            margin-bottom: 40px;
        }

        .welcome-content button,
        .welcome-content button a {
            background-color: orangered;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 1.2rem;
            cursor: pointer;
            text-decoration: none;
            border-radius: 5px;
            margin: 10px;
        }

        .welcome-content button:hover,
        .welcome-content button a:hover {
            background-color: #ff7043;
        }
    </style>
</head>

<body>
    <div class="welcome">
        <div class="welcome-content">
            <h1>Welcome to Viva La Vida</h1>
            <p>Experience the authentic flavors of Mexico!</p>
            <h2>Want to take a look at our Meals?</h2>
            <button><a href="loginpage.php">Login</a></button>
            <h2>No Account yet? </h2>
            <button><a href="register_customer.php">Make an Account</a></button>
        </div>
    </div>
    <?php require 'footer.php' ?>
</body>

</html>