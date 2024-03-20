<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    body {
        margin: 0;
        padding: 0;
        font-family: 'Times New Roman', Times, serif;
    }

    header {
        background-color: #333;
        color: white;
        padding: 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .logo {
        width: 200px;
        height: auto;
    }

    .logo img {
        width: 100%;
        height: auto;
    }

    .name {
        display: flex;
        align-items: center;
    }

    .name h1 {
        margin: 0;
    }

    .name h1:first-child {
        color: whitesmoke;
        margin-right: 10px;
    }

    .name h1:last-child {
        color: gray;
    }

    nav {
        display: flex;
    }

    nav a {
        color: white;
        text-decoration: none;
        margin-left: 20px;
    }

    nav a:hover {
        color: orangered;
    }
</style>

<body>
    <header>
        <div class="logo">
            <img src="https://static.vecteezy.com/system/resources/previews/024/603/343/original/mexican-restaurant-logo-with-a-combination-of-a-skull-sombrero-hat-and-herbs-in-vintage-style-vector.jpg" alt="Logo">
        </div>
        <div class="name">
            <h1 style="color: whitesmoke;">Viva La</h1>
            <h1 style="color: gray;">Vida</h1>
        </div>
        <nav>
            <a href="homepage.php">Home</a>
            <a href="homepage.php">Home</a>
            <a href="homepage.php">Home</a>
            <a href="homepage.php">Home</a>
            <a href="homepage.php">Home</a>
            <a href="homepage.php">Home</a>
        </nav>
    </header>
</body>

</html>