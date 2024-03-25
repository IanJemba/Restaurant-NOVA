<?php
// Include the database connection file
require 'database.php';

// Retrieve form data
$name = $_POST['name'];
$address = $_POST['address'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT); 
$role = $_POST['role'];

// Insert user data into the database
$sql = "INSERT INTO Gebruiker (naam, adres, email, wachtwoord, rol) VALUES (:name, :address, :email, :password, :role)";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':name', $name);
$stmt->bindParam(':address', $address);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':password', $password);
$stmt->bindParam(':role', $role);

if ($stmt->execute()) {
    // Registration successful
    header("Location: login.php"); // Redirect to login page
    exit();
} else {
    // Registration failed
    echo "Registration failed. Please try again.";
}
