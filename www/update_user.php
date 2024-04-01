<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Personal Information</title>
</head>

<body>
    <h1>Update Personal Information</h1>
    <form action="edit_customer_process.php" method="POST">
        <input type="hidden" name="gebruiker_id" value="<?php echo $_SESSION['user_id']; ?>">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" value="<?php echo $_SESSION['name']; ?>" required><br><br>

        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" value="<?php echo $_SESSION['email']; ?>" required><br><br>

        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br><br>

        <label for="street">Street:</label><br>
        <input type="text" id="street" name="street" value="street" required><br><br>

        <label for="huisnummer">House Number:</label><br>
        <input type="text" id="huisnummer" name="huisnummer" value="huisnummer" required><br><br>

        <label for="postcode">Postcode:</label><br>
        <input type="text" id="postcode" name="postcode" value="postcode" required><br><br>

        <input type="hidden" id="role" name="role" value="<?php echo $_SESSION['role']; ?>" required><br><br>

        <button type="submit">Update</button>
    </form>
</body>

</html>