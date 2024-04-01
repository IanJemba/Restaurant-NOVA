<?php
session_start();

require 'database.php';

// Fetch all products from the Product table
$sql = "SELECT * FROM Product";
$stmt = $conn->prepare($sql);
$stmt->execute();
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $menuName = $_POST['menu_name'];
    $selectedProducts = $_POST['products'];

    // Insert new menu item into the Menugang table for each selected product
    foreach ($selectedProducts as $productId) {
        $sql = "INSERT INTO Menugang (naam, product_id) VALUES (:menu_name, :product_id)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':menu_name', $menuName);
        $stmt->bindParam(':product_id', $productId);

        if (!$stmt->execute()) {
            // Handle error
            $error = "Error occurred while creating menu item.";
            break; // Exit loop if an error occurs
        }
    }

    if (!isset($error)) {
        // Redirect to a success page or display a success message
        header("Location: menu.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Menu</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <?php require 'header.php' ?>
    <div class="form-container">
        <h2 class="form-title">Create New Menu</h2>
        <?php if (isset($error)) : ?>
            <p>Error: <?php echo $error; ?></p>
        <?php endif; ?>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="form-group">
                <label for="menu_name">Menu Name:</label>
                <input type="text" id="menu_name" name="menu_name" required>
            </div>

            <div class="form-group">
                <label for="products">Select Products:</label><br>
                <select id="products" name="products[]" multiple required>
                    <?php foreach ($products as $product) : ?>
                        <option value="<?php echo $product['product_id']; ?>"><?php echo $product['naam']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <button type="submit" class="form-submit">Create Menu</button>
        </form>
    </div>
    <?php require 'footer.php' ?>
</body>

</html>