<?php
// Include the database connection file
require 'database.php';
// Fetch available dishes and drinks from the database
$sql = "SELECT * FROM Product";
$stmt = $conn->prepare($sql);
$stmt->execute();
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Dashboard</title>
    <link rel="stylesheet" href="stylesheet.css">
</head>

<body>
    <h2>Available Dishes and Drinks</h2>

    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Category</th>
                <th>Available Stock</th>
                <th>Vegan</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product) : ?>
                <tr>
                    <td><?php echo $product['naam']; ?></td>
                    <td>&euro;<?php echo $product['verkoopprijs']; ?></td>
                    <td><?php echo $product['categorie']; ?></td>
                    <td><?php echo $product['aantal_voorraad']; ?></td>
                    <td><?php echo ($product['is_vega'] == 'Yes') ? 'Yes' : 'No'; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>