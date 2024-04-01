<?php
session_start();
require 'database.php';

$sql = "SELECT * FROM Product";
$stmt = $conn->prepare($sql);
$stmt->execute();

// Check if search query is provided in the form submission
if (isset($_POST['search'])) {
    $search = '%' . $_POST['search'] . '%';
    // Construct SQL query with search filter
    $sql = "SELECT * FROM Product WHERE naam LIKE :searched";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':searched', $search);
    $stmt->execute();
}

$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Overview</title>
    <link rel="stylesheet" href="styles.css">
    
</head>

<body>
    <?php require 'header.php' ?>
    <form class="search-form" action="product_overzicht.php" method="POST">
        <input type="text" name="search" placeholder="Search for products">
        <button type="submit">Search</button>
    </form>

    <table class="table">
        <thead>
            <tr>
                <th class="table-header">Name</th>
                <th class="table-header">Price</th>
                <th class="table-header">Category</th>
                <th class="table-header">Available Stock</th>
                <th class="table-header">Vegan</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product) : ?>
                <tr>
                    <td><?php echo $product['naam']; ?></td>
                    <td>&euro; <?php echo $product['verkoopprijs']; ?></td>
                    <td><?php echo $product['categorie']; ?></td>
                    <td><?php echo $product['aantal_voorraad']; ?></td>
                    <td><?php echo ($product['is_vega'] == 'Yes') ? 'Yes' : 'No'; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <?php require 'footer.php' ?>
</body>

</html>