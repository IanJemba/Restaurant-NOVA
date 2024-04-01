<?php
require 'database.php';

// Retrieve form data
$product_id = $_GET['product_id'];
$name = $_POST['naam'];
$description = $_POST['beschrijving'];
$purchase_price = $_POST['inkoopprijs'];
$sale_price = $_POST['verkoopprijs'];
$image_url = $_POST['afbeelding'];
$is_vegetarian = $_POST['is_vega'];
$category = $_POST['categorie'];
$menu = $_POST['menu'];
$stock_quantity = $_POST['aantal_voorraad'];

// Update product data in the database
$sql_update_product = "UPDATE Product SET naam = :name, beschrijving = :description, inkoopprijs = :purchase_price, 
                    verkoopprijs = :sale_price, afbeelding = :image_url, is_vega = :is_vegetarian, categorie = :category, 
                    menu = :menu, aantal_voorraad = :stock_quantity WHERE product_id = :product_id";
$stmt_update_product = $conn->prepare($sql_update_product);
$stmt_update_product->bindParam(':product_id', $product_id);
$stmt_update_product->bindParam(':name', $name);
$stmt_update_product->bindParam(':description', $description);
$stmt_update_product->bindParam(':purchase_price', $purchase_price);
$stmt_update_product->bindParam(':sale_price', $sale_price);
$stmt_update_product->bindParam(':image_url', $image_url);
$stmt_update_product->bindParam(':is_vegetarian', $is_vegetarian);
$stmt_update_product->bindParam(':category', $category);
$stmt_update_product->bindParam(':menu', $menu);
$stmt_update_product->bindParam(':stock_quantity', $stock_quantity);

if ($stmt_update_product->execute()) {
    // product updated successfully
    header("Location: product_overzicht.php"); // Redirect to product list page
    exit();
} else {
    // Update failed
    echo "Update failed. Please try again.";
}
