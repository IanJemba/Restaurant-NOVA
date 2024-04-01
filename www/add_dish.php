<?php
require 'database.php';

// Retrieve menu options
$sql = "SELECT * FROM Menugang";
$stmt = $conn->prepare($sql);
$stmt->execute();
$menu_options = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Retrieve product details
$product_id = $_GET['id']; // Assuming product ID is passed in the URL
$sql_product = "SELECT * FROM Product WHERE product_id = :product_id";
$stmt_product = $conn->prepare($sql_product);
$stmt_product->bindParam(':product_id', $product_id);
$stmt_product->execute();
$product = $stmt_product->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update product</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <?php require 'header.php' ?>
    <div class="form-container">
        <h2 class="form-title">Update product</h2>
        <form method="post" action="update_product_process.php">
            <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">

            <div class="form-group">
                <label for="naam">Name:</label><br>
                <input type="text" id="naam" name="naam" value="<?php echo $product['naam']; ?>" required>
            </div>

            <div class="form-group">
                <label for="beschrijving">Description:</label><br>
                <textarea id="beschrijving" name="beschrijving" required><?php echo $product['beschrijving']; ?></textarea>
            </div>

            <div class="form-group">
                <label for="inkoopprijs">Purchase Price:</label><br>
                <input type="text" id="inkoopprijs" name="inkoopprijs" value="<?php echo $product['inkoopprijs']; ?>" required>
            </div>

            <div class="form-group">
                <label for="verkoopprijs">Sale Price:</label><br>
                <input type="text" id="verkoopprijs" name="verkoopprijs" value="<?php echo $product['verkoopprijs']; ?>" required>
            </div>

            <div class="form-group">
                <label for="afbeelding">Image URL:</label><br>
                <input type="text" id="afbeelding" name="afbeelding" value="<?php echo $product['afbeelding']; ?>">
            </div>

            <div class="form-group">
                <label for="is_vega">Is Vegetarian:</label><br>
                <select id="is_vega" name="is_vega" required>
                    <option value="Yes" <?php if ($product['is_vega'] == 'Yes') echo 'selected'; ?>>Yes</option>
                    <option value="No" <?php if ($product['is_vega'] == 'No') echo 'selected'; ?>>No</option>
                </select>
            </div>

            <div class="form-group">
                <label for="categorie">Category:</label><br>
                <select id="categorie" name="categorie" required>
                    <option value="Food" <?php if ($product['categorie'] == 'Food') echo 'selected'; ?>>Food</option>
                    <option value="Water" <?php if ($product['categorie'] == 'Water') echo 'selected'; ?>>Water</option>
                </select>
            </div>

            <div class="form-group">
                <label for="menu">Menu:</label><br>
                <select id="menu" name="menu" required>
                    <?php
                    foreach ($menu_options as $menu_option) {
                        $selected = ($product['menu'] == $menu_option['naam']) ? 'selected' : '';
                        echo "<option value='" . $menu_option['naam'] . "' $selected>" . $menu_option['naam'] . "</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="aantal_voorraad">Stock Quantity:</label><br>
                <input type="number" id="aantal_voorraad" name="aantal_voorraad" value="<?php echo $product['aantal_voorraad']; ?>" required>
            </div>

            <button type="submit" class="form-submit">Update</button>
        </form>
    </div>
    <?php require 'footer.php' ?>
</body>

</html>