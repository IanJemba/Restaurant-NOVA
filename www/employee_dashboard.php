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
    <title>Document</title>
    <link rel="stylesheet" href="stylesheet.css">
</head>

<body>
    <nav>
        <ul>
            <li><a href="product_overzicht.php">Available Meals</a></li>
            <li><a href="employee_overzicht.php">Registered Employees</a></li>
            <li><a href="logout.php">logout</a></li>
        </ul>
    </nav>
    <h2>Edit Dishes and Drinks</h2>

    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Category</th>
                <th>Available Stock</th>
                <th>Vegan</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product) : ?>
                <tr>
                    <td><?php echo $product['naam']; ?></td>
                    <td>&euro;<?php echo $product['verkoopprijs']; ?></td>
                    <td><?php echo $product['categorie']; ?></td>
                    <td><?php echo $product['aantal_voorraad']; ?></td>
                    <td><?php echo ($product['is_vega'] == 'Yes') ? 'Yes' : 'No'; ?></td>
                    <td><a href="delete_product.php?id=<?php echo $product['product_id']; ?>">Delete</a></td> <!-- Delete link -->
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>


    <form action="create_table_process.php" method="POST">
        <h2>Create a Table</h2>
        <label for="table_number">Table Number:</label><br>
        <input type="text" id="table_number" name="table_number" required><br><br>

        <label for="seats">Number of Seats:</label><br>
        <input type="number" id="seats" name="seats" min="1" required><br><br>

        <button type="submit">Create Table</button>
    </form>
</body>

</html>