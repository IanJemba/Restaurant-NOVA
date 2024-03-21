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
        align-items: center;
        margin-right: 900px;
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
        color: #ff7043;
    }
</style>

<body>
    <header>
        <div class="logo">
            <img src="https://static.vecteezy.com/system/resources/previews/024/603/343/original/mexican-restaurant-logo-with-a-combination-of-a-skull-sombrero-hat-and-herbs-in-vintage-style-vector.jpg" alt="Logo">
        </div>
        <div class="name">
            <strong>
                <h1 style="color: #ff7043;">Viva</h1>
            </strong>
            <h1 style="color: whitesmoke ;">LaVida</h1>
        </div>
        <nav>
            <a href="homepage.php">Home</a>
            <a href="homepage.php">Home</a>
            <a href="meals.php">Meals</a>
            <a href="add_dish.php">Add Dish</a>
            <a href="loginpage.php">Login</a>
            <a href="gebruiker_toevoegen.php">Add User</a>
        </nav>
    </header>
</body>

</html>