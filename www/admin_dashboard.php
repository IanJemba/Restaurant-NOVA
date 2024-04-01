<?php
session_start();

// Redirect to login page if user is not logged in as admin
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: loginpage.php");
    exit();
}

require 'database.php';

// Fetch users with their addresses from the database
$sql = "SELECT G.gebruiker_id, G.naam, A.street, A.huisnummer, A.postcode, G.email, G.rol 
        FROM Gebruiker G
        INNER JOIN Adres A ON G.gebruiker_id = A.gebruiker_id";
$stmt = $conn->prepare($sql);
$stmt->execute();
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <?php require 'header.php' ?>
    <div class="profile">
        <h1>User Profile</h1>
        <div class="user-info">
            <p><strong>Name:</strong> <?php echo $_SESSION['name']; ?></p>
            <p><strong>Email:</strong> <?php echo $_SESSION['email']; ?></p>
            <p>You are logged in as a <?php echo $_SESSION['role']; ?></p>
        </div>
    </div>
    <h2 style="text-align: center;">Manage Users</h2>
    <table class="employee-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Street</th>
                <th>House Number</th>
                <th>Postcode</th>
                <th>Email</th>
                <th>Role</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user) : ?>
                <tr>
                    <td><?php echo $user['naam']; ?></td>
                    <td><?php echo $user['street']; ?></td>
                    <td><?php echo $user['huisnummer']; ?></td>
                    <td><?php echo $user['postcode']; ?></td>
                    <td><?php echo $user['email']; ?></td>
                    <td><?php echo $user['rol']; ?></td>
                    <td>
                        <?php if ($user['rol'] != 'admin') : ?>
                            <a href="delete_user.php?id=<?php echo $user['gebruiker_id']; ?>" class="delete-link">Delete</a>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <?php require 'footer.php' ?>
</body>

</html>