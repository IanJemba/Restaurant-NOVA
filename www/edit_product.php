<?php
session_start();
require 'database.php';

// Check if user is logged in and has employee role
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'employee') {
    // Redirect to login page if not logged in as employee
    header("Location: loginpage.php");
    exit();
}
$product_id = $_GET['product_id'];
// Check if product_id is provided
if (!isset($_GET['product_id'])) {
    // No ID provided
    echo "No ID provided.";
    exit();
}



// Retrieve the meal information based on the ID
$sql = "SELECT * FROM Product WHERE product_id = :id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':id', $product_id);
$stmt->execute();
$product = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$product) {
    // Meal not found
    echo "Meal not found.";
    exit();
}

// Handle form submission to update meal
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $stock = $_POST['stock'];
    $vegan = isset($_POST['vegan']) ? 'Yes' : 'No';

    $sql = "UPDATE Product SET naam = :name, verkoopprijs = :price, categorie = :category, aantal_voorraad = :stock, is_vega = :vegan WHERE product_id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':category', $category);
    $stmt->bindParam(':stock', $stock);
    $stmt->bindParam(':vegan', $vegan);
    $stmt->bindParam(':id', $product_id);

    if ($stmt->execute()) {
        // Update successful, redirect to employee dashboard
        header("Location: employee_dashboard.php");
        exit();
    } else {
        // Update failed
        echo "Failed to update meal.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Meal</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <?php require 'header.php' ?>
    <h1>Edit Meal</h1>
    <form action="edit_product.php?product_id=<?php echo $product_id; ?>" method="POST">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" value="<?php echo $product['naam']; ?>" required><br><br>

        <label for="price">Price:</label><br>
        <input type="number" id="price" name="price" value="<?php echo $product['verkoopprijs']; ?>" required><br><br>

        <label for="category">Category:</label><br>
        <input type="text" id="category" name="category" value="<?php echo $product['categorie']; ?>" required><br><br>

        <label for="stock">Available Stock:</label><br>
        <input type="number" id="stock" name="stock" value="<?php echo $product['aantal_voorraad']; ?>" required><br><br>

        <label for="vegan">Vegan:</label>
        <input type="checkbox" id="vegan" name="vegan" <?php echo ($product['is_vega'] == 'Yes') ? 'checked' : ''; ?>><br><br>

        <button type="submit">Update Meal</button>
    </form>
    <?php require 'footer.php' ?>
</body>

</html>