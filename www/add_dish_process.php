<?php
require 'database.php';

$naam = $_POST['naam'];
$beschrijving = $_POST['beschrijving'];
$inkoopprijs = $_POST['inkoopprijs'];
$verkoopprijs = $_POST['verkoopprijs'];
$afbeelding = $_POST['afbeelding'];
$is_vega = $_POST['is_vega'];
$categorie = $_POST['categorie'];
$aantal_voorraad = $_POST['aantal_voorraad'];

$sql = "INSERT INTO Product (naam, beschrijving, inkoopprijs, verkoopprijs, is_vega, afbeelding, aantal_voorraad, categorie) VALUES (:naam, :beschrijving, :inkoopprijs, :verkoopprijs, :is_vega, :afbeelding, :aantal_voorraad, :categorie)";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':naam', $naam);
$stmt->bindParam(':beschrijving', $beschrijving);
$stmt->bindParam(':inkoopprijs', $inkoopprijs);
$stmt->bindParam(':verkoopprijs', $verkoopprijs);
$stmt->bindParam(':afbeelding', $afbeelding);
$stmt->bindParam(':is_vega', $is_vega);
$stmt->bindParam(':categorie', $categorie);
$stmt->bindParam(':aantal_voorraad', $aantal_voorraad);

if ($stmt->execute()) {
    header("Location: homepage.php");
    exit();
} else {
    echo "Error: Unable to add dish.";
}
