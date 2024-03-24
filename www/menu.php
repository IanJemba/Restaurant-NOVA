<?php
require 'database.php';

// Fetch all products grouped by category
$sqlProducts = "SELECT * FROM Product ORDER BY categorie";
$stmtProducts = $conn->prepare($sqlProducts);
$stmtProducts->execute();
$products = $stmtProducts->fetchAll(PDO::FETCH_ASSOC);

// Organize products by category
$menuItems = [];
foreach ($products as $product) {
    $menuItems[$product['categorie']][] = $product;
}

// Fetch all menus and their associated products from the Menugang table
$sqlMenus = "SELECT Menugang.menu_id, Menugang.naam AS menu_name, GROUP_CONCAT(Product.naam SEPARATOR ', ') AS product_names
        FROM Menugang
        LEFT JOIN Product ON Menugang.product_id = Product.product_id
        GROUP BY Menugang.menu_id, Menugang.naam";
$stmtMenus = $conn->prepare($sqlMenus);
$stmtMenus->execute();
$menus = $stmtMenus->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link rel="stylesheet" href="style.css"> <!-- Link to your CSS file -->
</head>

<body>
    <div class="menu">
        <?php foreach ($menuItems as $category => $items) : ?>
            <div class="category">
                <h2><?php echo $category; ?></h2>
                <div class="items">
                    <?php foreach ($items as $item) : ?>
                        <div class="item">
                            <img src="<?php echo $item['afbeelding']; ?>" alt="<?php echo $item['naam']; ?>">
                            <h3><?php echo $item['naam']; ?></h3>
                            <p>Description: <?php echo $item['beschrijving']; ?></p>
                            <p>Price: &euro;<?php echo $item['verkoopprijs']; ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endforeach; ?>

        <?php foreach ($menus as $menu) : ?>
            <div class="category">
                <h2><?php echo $menu['menu_name']; ?></h2>
                <div class="items">
                    <p>You will get <?php echo $menu['product_names']; ?> from this menu</p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</body>

</html>