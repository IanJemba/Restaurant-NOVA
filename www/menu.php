<?php
session_start();
// Include database connection script
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

    <link rel="style" href="styles.css">
</head>

<body>
    <div class="menu-container">
        <?php
        // Include database connection script
        require 'database.php';

        // Retrieve Menugang categories
        $sql_menugang = "SELECT * FROM Menugang";
        $stmt_menugang = $conn->prepare($sql_menugang);
        $stmt_menugang->execute();
        $menugangs = $stmt_menugang->fetchAll(PDO::FETCH_ASSOC);

        // Check if there are any Menugang categories
        if ($menugangs) {
            foreach ($menugangs as $menugang) : ?>
                <div class="menu-section">
                    <h2><?php echo $menugang['naam']; ?></h2>
                    <?php
                    // Retrieve products for the current Menugang
                    $menu_id = $menugang['menu_id'];
                    $sql_products = "SELECT * FROM Product WHERE menu_id = :menu_id";
                    $stmt_products = $conn->prepare($sql_products);
                    $stmt_products->bindParam(':menu_id', $menu_id);
                    $stmt_products->execute();
                    $products = $stmt_products->fetchAll(PDO::FETCH_ASSOC);

                    // Display products
                    foreach ($products as $product) : ?>
                        <div class="container">
                            <img src="<?php echo $product['afbeelding'] ?>" alt="pic of meal">
                            <h3><?php echo $product['naam']; ?></h3>
                            <p><?php echo $product['beschrijving']; ?></p>
                            <p>Price: <?php echo $product['verkoopprijs']; ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endforeach; ?>
        <?php } else { ?>
            <p>No Menugang categories found.</p>
        <?php } ?>
    </div>
</body>

</html>