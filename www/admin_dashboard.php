<?php
session_start();
if (!isset($_SESSION['user_id']) || !isset($_SESSION['role'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$role = $_SESSION['role'];


require 'database.php';
require 'logout.php';
// Fetch all users from the Gebruiker table
$sql = "SELECT * FROM Gebruiker";
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
    <link rel="stylesheet" href="stylesheet.css">
</head>

<body>
    <nav>
        <ul>
            <li><a href="product_overzicht.php">Available Meals</a></li>
            <li><a href="employee_overzicht.php">Registered Employees</a></li>
            <li><a href="logout.php">logout</a></li>
        </ul>
    </nav>
    <h1>Admin Dashboard</h1>
    <p> <?php echo "Welcome, User ID: $user_id, Role: $role";?>
</p>
    <h2>Manage Users</h2>

    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Address</th>
                <th>Email</th>
                <th>Role</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user) : ?>
                <tr>
                    <td><?php echo $user['naam']; ?></td>
                    <td><?php echo $user['adres']; ?></td>
                    <td><?php echo $user['email']; ?></td>
                    <td><?php echo $user['rol']; ?></td>
                    <td>
                        <?php if ($user['rol'] != 'admin') : ?>
                            <a href="delete_user.php?id=<?php echo $user['gebruiker_id']; ?>">Delete</a>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>