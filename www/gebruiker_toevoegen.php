<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
    <link rel="stylesheet" href="stylesheet.css">
</head>

<body>
    <form action="gebruiker_toevoegen_process.php" method="post">
        <h2>Add User</h2>

        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="address">Address:</label>
        <input type="text" id="address" name="address" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <label for="role">Role:</label>
        <select id="role" name="role" required>
            <option value="admin">Administrator</option>
            <option value="employee">Employee</option>
            <option value="customer">Customer</option>
        </select>

        <input type="submit" value="Add User">
    </form>
</body>

</html>