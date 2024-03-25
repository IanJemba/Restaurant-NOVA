<?php
// Include the database connection file
require 'database.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $table_number = $_POST['table_number'];
    $seats = $_POST['seats'];

    // Insert new table into the database
    $sql = "INSERT INTO Table (table_number, seats) VALUES (:table_number, :seats)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':table_number', $table_number);
    $stmt->bindParam(':seats', $seats);

    if ($stmt->execute()) {
        // Redirect to a success page or display a success message
        header("Location: tables.php");
        exit();
    } else {
        // Handle error
        echo "Error occurred while creating table.";
    }
}
?>
