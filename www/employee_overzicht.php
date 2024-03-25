<?php
// Include the database connection file
require 'database.php';

// Fetch all employees from the database
$sql = "SELECT * FROM Gebruiker WHERE rol = 'employee'";
$stmt = $conn->prepare($sql);
$stmt->execute();
$employees = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Overview</title>
    <link rel="stylesheet" href="stylesheet.css">
</head>

<body>
    <h1>Employee Overview</h1>

    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Address</th>
                <th>Email</th>
                <th>Role</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($employees as $employee) : ?>
                <tr>
                    <td><?php echo $employee['naam']; ?></td>
                    <td><?php echo $employee['adres']; ?></td>
                    <td><?php echo $employee['email']; ?></td>
                    <td><?php echo $employee['rol']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>