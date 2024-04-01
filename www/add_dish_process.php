<?php

require 'database.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $naam = $_POST['naam'];
    $beschrijving = $_POST['beschrijving'];
    $inkoopprijs = $_POST['inkoopprijs'];
    $verkoopprijs = $_POST['verkoopprijs'];
    $afbeelding = $_POST['afbeelding'];
    $is_vega = $_POST['is_vega'];
    $categorie = $_POST['categorie'];
    $aantal_voorraad = $_POST['aantal_voorraad'];
    $menu_naam = $_POST['menu'];

    // Get menu_id corresponding to the selected menu name
    $sql_menu = "SELECT menu_id FROM Menugang WHERE naam = ?";
    $stmt_menu = $conn->prepare($sql_menu);
    $stmt_menu->execute([$menu_naam]);
    $menu_id_row = $stmt_menu->fetch(PDO::FETCH_ASSOC);
    $menu_id = $menu_id_row['menu_id'];

    // Insert data into Product table
    $sql_insert = "INSERT INTO Product (naam, beschrijving, inkoopprijs, verkoopprijs, afbeelding, is_vega, categorie, aantal_voorraad, menu_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt_insert = $conn->prepare($sql_insert);
    $stmt_insert->execute([$naam, $beschrijving, $inkoopprijs, $verkoopprijs, $afbeelding, $is_vega, $categorie, $aantal_voorraad, $menu_id]);

    // Redirect after insertion
    header("Location: product_overzicht.php"); // Change index.php to the appropriate page
    exit();
}
