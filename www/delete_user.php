<?php
session_start();

// Check if user is logged in and has admin role
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    // Redirect to login page if not logged in as admin
    header("Location: loginpage.php");
    exit();
}

// Include database connection file
require 'database.php';

// Check if user ID is provided in the URL parameter
if (isset($_GET['id'])) {
    // Retrieve the user ID from the URL parameter
    $userId = $_GET['id'];

    // Prepare SQL statement to delete user's address from the Adres table
    $sqlDeleteAddress = "DELETE FROM Adres WHERE gebruiker_id = :user_id";
    $stmtDeleteAddress = $conn->prepare($sqlDeleteAddress);
    $stmtDeleteAddress->bindParam(':user_id', $userId);

    // Execute the SQL statement to delete user's address
    if ($stmtDeleteAddress->execute()) {
        // After deleting the address, proceed to delete the user from the Gebruiker table
        $sqlDeleteUser = "DELETE FROM Gebruiker WHERE gebruiker_id = :user_id";
        $stmtDeleteUser = $conn->prepare($sqlDeleteUser);
        $stmtDeleteUser->bindParam(':user_id', $userId);

        // Execute the SQL statement to delete the user
        if ($stmtDeleteUser->execute()) {
            // User successfully deleted, redirect back to the admin dashboard
            header("Location: admin_dashboard.php");
            exit();
        } else {
            // Error occurred while deleting the user
            echo "Error occurred while deleting the user.";
        }
    } else {
        // Error occurred while deleting the user's address
        echo "Error occurred while deleting the user's address.";
    }
} else {
    // User ID is not provided in the URL parameter
    echo "User ID is missing.";
}
