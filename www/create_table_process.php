<?php
// Include the database connection file
require 'database.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Insert new table into the database
    $seats = $_POST['seats'];

    // Insert the new table into the database
    $sql = "INSERT INTO `Tafel` (seats) VALUES (:seats)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':seats', $seats);

    if ($stmt->execute()) {
        // Redirect to a success page or display a success message
        header("Location: reservationpage.php");
        exit();
    } else {
        // Handle error
        echo "Error occurred while creating table.";
    }
}
