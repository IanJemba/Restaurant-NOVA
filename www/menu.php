<?php
// Start the session
session_start();

// Include the database connection script
require 'database.php';

// Retrieve Menugang categories
$sql_menugang = "SELECT * FROM Menugang";
$stmt_menugang = $conn->prepare($sql_menugang);
$stmt_menugang->execute();
$menugangs = $stmt_menugang->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <style>
        /* Common styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .menu-section {
            margin-bottom: 30px;
            text-align: center;
        }

        .menu-section h2 {
            margin-top: 0;
            font-weight: bold;
        }

        .product {
            width: 250px;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            display: inline-block;
            margin: 0 10px 10px 10px;
            vertical-align: top;
        }

        .product img {
            width: 100%;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <?php require 'header.php' ?>
    <?php foreach ($menugangs as $menugang) : ?>
        <div>
            <h1 style="color:  whitesmoke; text-align:center"><?php echo $menugang['naam']; ?></h1>
            <?php
            // Retrieve products for the current Menugang
            $menu_id = $menugang['menu_id'];
            $sql_products = "SELECT * FROM Product WHERE menu_id = :menu_id";
            $stmt_products = $conn->prepare($sql_products);
            $stmt_products->bindParam(':menu_id', $menu_id);
            $stmt_products->execute();
            $products = $stmt_products->fetchAll(PDO::FETCH_ASSOC);
            ?>
            <?php foreach ($products as $product) : ?>
                <div class="container">
                    <img src="<?php echo $product['afbeelding']; ?>" alt="<?php echo $product['naam']; ?>">
                    <h3><?php echo $product['naam']; ?></h3>
                    <p><?php echo $product['beschrijving']; ?></p>
                    <p>Price: <?php echo $product['verkoopprijs']; ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endforeach; ?>

    <?php require 'footer.php' ?>
</body>

</html>