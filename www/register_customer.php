<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
</head>

<body>
    <h2>User Registration</h2>
    <form action="register_customer_process.php" method="POST">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" required><br><br>

        <label for="street">Street:</label><br>
        <input type="text" id="street" name="street" required><br><br>

        <label for="huisnummer">Huisnummer:</label><br>
        <input type="text" id="huisnummer" name="huisnummer" required><br><br>

        <label for="postcode">Postcode:</label><br>
        <input type="text" id="postcode" name="postcode" required><br><br>

        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br><br>

        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br><br>
        <input type="hidden" id="role" name="role" value="customer">

        <button type="submit">Register</button>
    </form>
</body>

</html>