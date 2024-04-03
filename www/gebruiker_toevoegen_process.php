<?php
session_start();
require 'database.php';

$name = $_POST['name'];
$email = $_POST['email'];
$street = $_POST['street'];
$huisnummer = $_POST['huisnummer'];
$postcode = $_POST['postcode'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$role = $_POST['role'];

$sql = "INSERT INTO Gebruiker (naam, email, wachtwoord, rol) VALUES (:name, :email, :password, :role)";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':name', $name);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':password', $password);
$stmt->bindParam(':role', $role);

if ($stmt->execute()) {
    // Get the inserted user ID
    $gebruiker_id = $conn->lastInsertId();


    $sql_adres = "INSERT INTO Adres (gebruiker_id, street, huisnummer, postcode) VALUES (:gebruiker_id, :street, :huisnummer, :postcode)";
    $stmt_adres = $conn->prepare($sql_adres);
    $stmt_adres->bindParam(':gebruiker_id', $gebruiker_id);
    $stmt_adres->bindParam(':street', $street);
    $stmt_adres->bindParam(':huisnummer', $huisnummer);
    $stmt_adres->bindParam(':postcode', $postcode);

    if ($stmt_adres->execute()) {
        header("Location: admin_dashboard.php");
        exit;
    } else {
        echo "Failed to insert address information";
    }
} else {
    echo "Failed to insert user information";
}
