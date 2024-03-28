<?php
// Include the database connection file
require 'database.php';

// Fetch all employees with their addresses from the database
$sql = "SELECT G.naam, A.street, A.huisnummer, A.postcode, G.email, G.rol 
        FROM Gebruiker G
        INNER JOIN Adres A ON G.gebruiker_id = A.gebruiker_id
        WHERE G.rol = 'employee'";
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
    <?php require 'header.php' ?>
    <h1>Employee Overview</h1>

    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Street</th>
                <th>House Number</th>
                <th>Postcode</th>
                <th>Email</th>
                <th>Role</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($employees as $employee) : ?>
                <tr>
                    <td><?php echo $employee['naam']; ?></td>
                    <td><?php echo $employee['street']; ?></td>
                    <td><?php echo $employee['huisnummer']; ?></td>
                    <td><?php echo $employee['postcode']; ?></td>
                    <td><?php echo $employee['email']; ?></td>
                    <td><?php echo $employee['rol']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php require 'footer.php' ?>

</body>

</html>