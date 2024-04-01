<?php
session_start();
// Include the database connection file
require 'database.php';

// Retrieve form data
$gebruiker_id = $_POST['gebruiker_id'];
$name = $_POST['name'];
$street = $_POST['street'];
$huisnummer = $_POST['huisnummer'];
$postcode = $_POST['postcode'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$role = $_POST['role'];

// Update user data in the database
$sql_update_user = "UPDATE Gebruiker SET naam = :name, email = :email, wachtwoord = :password, rol = :role WHERE gebruiker_id = :gebruiker_id";
$stmt_update_user = $conn->prepare($sql_update_user);
$stmt_update_user->bindParam(':gebruiker_id', $gebruiker_id);
$stmt_update_user->bindParam(':name', $name);
$stmt_update_user->bindParam(':email', $email);
$stmt_update_user->bindParam(':password', $password);
$stmt_update_user->bindParam(':role', $role);

if ($stmt_update_user->execute()) {
    // Update address data in the database
    $sql_update_address = "UPDATE Adres SET street = :street, huisnummer = :huisnummer, postcode = :postcode WHERE gebruiker_id = :gebruiker_id";
    $stmt_update_address = $conn->prepare($sql_update_address);
    $stmt_update_address->bindParam(':gebruiker_id', $gebruiker_id);
    $stmt_update_address->bindParam(':street', $street);
    $stmt_update_address->bindParam(':huisnummer', $huisnummer);
    $stmt_update_address->bindParam(':postcode', $postcode);

    if ($stmt_update_address->execute()) {
        // Update successful
        header("Location: customer_dashboard.php"); // Redirect to profile page
        exit();
    } else {
        // Update failed
        echo "Update failed. Please try again.";
    }
} else {
    // Update failed
    echo "Update failed. Please try again.";
}
