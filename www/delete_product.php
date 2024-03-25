<?php
// Include the database connection file
require 'database.php';

// Check if product ID is provided in the URL parameter
if (isset($_GET['id'])) {
    // Retrieve the product ID from the URL parameter
    $productId = $_GET['id'];

    // Prepare SQL statement to delete the product
    $sql = "DELETE FROM Product WHERE product_id = :product_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':product_id', $productId);

    // Execute the SQL statement
    if ($stmt->execute()) {
        // Product successfully deleted, redirect back to the employee dashboard
        header("Location: employee-dashboard.php");
        exit();
    } else {
        // Error occurred while deleting the product
        echo "Error occurred while deleting the product.";
    }
} else {
    // Product ID is not provided in the URL parameter
    echo "Product ID is missing.";
}
