<?php
require 'database.php';

$name = $_POST['name'];
$adres = $_POST['address'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$role = $_POST['role'];

$sql = "INSERT INTO Gebruiker (naam, adres, email, wachtwoord,rol) VALUES (:name, :address, :email, :password, :role)";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':name', $name);
$stmt->bindParam(':address', $adres);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':password', $password);
$stmt->bindParam(':role', $role);

if ($stmt->execute()) {
    header("Location: homepage.php");
    exit;
}

echo "Something went wrong";
