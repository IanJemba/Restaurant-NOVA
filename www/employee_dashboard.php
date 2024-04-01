<?php
require 'database.php';
session_start();

// Check if user is logged in and has employee role
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'employee') {
    // Redirect to login page if not logged in as employee
    header("Location: loginpage.php");
    exit();
}

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
    <link rel="stylesheet" href="styles.css">

</head>

<body>
    <?php require 'header.php' ?>
    <div class="profile">
        <h1>Welcome, <?php echo $_SESSION['name']; ?></h1>
        <div class="user-info">
            <p>Email: <?php echo $_SESSION['email']; ?></p>
            <p>You are logged in as a <?php echo $_SESSION['role']; ?></p>
        </div>
    </div>
    <table class="employee-table">
        < <thead>
            <tr>
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Category</th>
                <th>Available Stock</th>
                <th>Vegan</th>
                <th>Action</th>
            </tr>
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
                        <td><a href="edit_product.php?product_id=<?php echo $product['product_id']; ?>" class="edit-link">Edit</a></td>
                        <td><a href="delete_product.php?id=<?php echo $product['product_id']; ?>" class="delete-link">Delete</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
    </table>

    <div class="create-table-section">
        <form action="create_table_process.php" method="POST">
            <h2>Create a Table</h2>

            <label for="seats">Number of Seats:</label><br>
            <input type="number" id="seats" name="seats" min="1" required><br><br>

            <button type="submit">Create Table</button>
        </form>
    </div>
    <?php require 'footer.php' ?>
</body>

</html>