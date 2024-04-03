<?php
require 'database.php';

// Retrieve menu options
$sql = "SELECT * FROM Menugang";
$stmt = $conn->prepare($sql);
$stmt->execute();
$menu_options = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Dish</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <?php require 'header.php' ?>
    <div class="form-container">
        <h2 class="form-title">Add product</h2>
        <form method="post" action="add_dish_process.php">
            <div class="form-group">
                <label for="naam">Name:</label><br>
                <input type="text" id="naam" name="naam" required>
            </div>

            <div class="form-group">
                <label for="beschrijving">Description:</label><br>
                <textarea id="beschrijving" name="beschrijving" required></textarea>
            </div>

            <div class="form-group">
                <label for="inkoopprijs">Purchase Price:</label><br>
                <input type="text" id="inkoopprijs" name="inkoopprijs" required>
            </div>

            <div class="form-group">
                <label for="verkoopprijs">Sale Price:</label><br>
                <input type="text" id="verkoopprijs" name="verkoopprijs" required>
            </div>

            <div class="form-group">
                <label for="afbeelding">Image URL:</label><br>
                <input type="text" id="afbeelding" name="afbeelding">
            </div>

            <div class="form-group">
                <label for="is_vega">Is Vegetarian:</label><br>
                <select id="is_vega" name="is_vega" required>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
            </div>

            <div class="form-group">
                <label for="categorie">Category:</label><br>
                <select id="categorie" name="categorie" required>
                    <option value="Food">Food</option>
                    <option value="Water">Water</option>
                </select>
            </div>

            <div class="form-group">
                <label for="menu">Menu:</label><br>
                <select id="menu" name="menu" required>
                    <?php
                    foreach ($menu_options as $menu_option) {
                        echo "<option value='" . $menu_option['naam'] . "'>" . $menu_option['naam'] . "</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="aantal_voorraad">Stock Quantity:</label><br>
                <input type="number" id="aantal_voorraad" name="aantal_voorraad" required>
            </div>

            <button type="submit" class="form-submit">Add Product</button>
        </form>
    </div>
    <?php require 'footer.php' ?>
</body>

</html>