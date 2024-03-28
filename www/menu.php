<?php
require 'database.php';

// Fetch all menus and their associated products from the Menugang table
$sqlMenus = "SELECT Menugang.menu_id, Menugang.naam AS menu_name, Product.naam AS product_name, Product.beschrijving, Product.verkoopprijs
             FROM Menugang
             LEFT JOIN Product ON Menugang.menu_id = Product.menu_id
             ORDER BY Menugang.menu_id";
$stmtMenus = $conn->prepare($sqlMenus);
$stmtMenus->execute();
$menus = $stmtMenus->fetchAll(PDO::FETCH_ASSOC);

// Organize menus and their associated products
$menuItems = [];
foreach ($menus as $menu) {
    $menuItems[$menu['menu_name']][] = $menu;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link rel="stylesheet" href="stylesheet.css">
</head>

<body>
    <?php require 'header.php' ?>
    <div class="menu">
        <?php foreach ($menuItems as $menuName => $items) : ?>
            <div class="category">
                <h2><?php echo $menuName; ?></h2>
                <div class="items-container">
                    <?php foreach ($items as $item) : ?>
                        <div class="item">
                            <div class="item-content">
                                <img src="<?php echo $item['afbeelding']; ?>" alt="<?php echo $item['naam']; ?>">
                                <h3><?php echo $item['naam']; ?></h3>
                                <p>Description: <?php echo $item['beschrijving']; ?></p>
                                <p>Price: &euro;<?php echo $item['verkoopprijs']; ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <?php require 'footer.php' ?>
</body>

</html>