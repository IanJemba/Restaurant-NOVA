<?php
// Include the database connection file
require 'database.php';

// Retrieve form data
$name = $_POST['name'];
$street = $_POST['street'];
$huisnummer = $_POST['huisnummer'];
$postcode = $_POST['postcode'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$role = $_POST['role'];

// Insert user data into the database
$sql_user = "INSERT INTO Gebruiker (naam, email, wachtwoord, rol) VALUES (:name, :email, :password, :role)";
$stmt_user = $conn->prepare($sql_user);
$stmt_user->bindParam(':name', $name);
$stmt_user->bindParam(':email', $email);
$stmt_user->bindParam(':password', $password);
$stmt_user->bindParam(':role', $role);

if ($stmt_user->execute()) {
    // Get the inserted user ID
    $gebruiker_id = $conn->lastInsertId();

    // Insert address data into the Adres table
    $sql_address = "INSERT INTO Adres (gebruiker_id, street, huisnummer, postcode) VALUES (:gebruiker_id, :street, :huisnummer, :postcode)";
    $stmt_address = $conn->prepare($sql_address);
    $stmt_address->bindParam(':gebruiker_id', $gebruiker_id);
    $stmt_address->bindParam(':street', $street);
    $stmt_address->bindParam(':huisnummer', $huisnummer);
    $stmt_address->bindParam(':postcode', $postcode);

    if ($stmt_address->execute()) {
        // Registration successful
        header("Location: login.php"); // Redirect to login page
        exit();
    } else {
        // Registration failed
        echo "Registration failed. Please try again.";
    }
} else {
    // Registration failed
    echo "Registration failed. Please try again.";
}
?>
