<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <?php require 'header.php' ?>
    <div class="form-container">
        <h2 class="form-title">Add User</h2>
        <form action="gebruiker_toevoegen_process.php" method="post">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
            </div>

            <div class="form-group">
                <label for="street">Street:</label>
                <input type="text" id="street" name="street" required>
            </div>

            <div class="form-group">
                <label for="huisnummer">House Number:</label>
                <input type="text" id="huisnummer" name="huisnummer" required>
            </div>

            <div class="form-group">
                <label for="postcode">Postal Code:</label>
                <input type="text" id="postcode" name="postcode" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>

            <div class="form-group">
                <label for="role">Role:</label>
                <select id="role" name="role" required>
                    <option value="admin">Administrator</option>
                    <option value="employee">Employee</option>
                    <option value="customer">Customer</option>
                </select>
            </div>

            <button type="submit" class="form-submit">Add User</button>
        </form>
    </div>
    <?php require 'footer.php' ?>
</body>

</html>