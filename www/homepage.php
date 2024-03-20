<?php
require 'header.php';

?>
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
            background-image: url('https://mymexicanfood.com/wp-content/uploads/2023/10/mcn-thumbnail.jpg');
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
    </style>
</head>

<body>
    <div class="welcome">
        <div class="welcome-content">
            <h1>Welcome to Viva La Vida</h1>
            <p>Experience the authentic flavors of Mexico!</p>
        </div>
    </div>
</body>

</html>