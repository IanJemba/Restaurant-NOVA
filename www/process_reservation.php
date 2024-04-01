<?php
// Start session (if not started already)
session_start();

// Redirect to login page if user is not logged in as admin
if (!isset($_SESSION['user_id']) || ($_SESSION['role'] !== 'employee' && $_SESSION['role'] !== 'customer')) {
    header("Location: loginpage.php");
    exit();
}

// Include your existing database connection script
require 'database.php';

// Process reservation form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Retrieve form data
    $date = $_POST['date'];
    $time = $_POST['time'];
    $persons = $_POST['persons'];
    $table = $_POST['table']; // Retrieve selected table number from the form

    // Check if the selected table has enough seats
    $sql = "SELECT * FROM Tafel WHERE table_id = :table AND seats >= :persons";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':table', $table);
    $stmt->bindParam(':persons', $persons);
    $stmt->execute();
    $table_info = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($table_info) { // If the selected table has enough seats
        // Get gebruiker_id from session
        $gebruiker_id = $_SESSION['user_id'];

        // Prepare SQL statement
        $stmt = $conn->prepare("INSERT INTO Reservering (gebruiker_id, datum, tijd, aantal_personen, tafelnummer) VALUES (:gebruiker_id, :datum, :tijd, :aantal_personen, :tafelnummer)");

        // Bind parameters
        $stmt->bindParam(':gebruiker_id', $gebruiker_id);
        $stmt->bindParam(':datum', $date);
        $stmt->bindParam(':tijd', $time);
        $stmt->bindParam(':aantal_personen', $persons);
        $stmt->bindParam(':tafelnummer', $table); // Assign the selected table number to the statement

        // Execute the prepared statement
        if ($stmt->execute()) {
            echo "Reservation made successfully!";
        } else {
            echo "Error: Unable to execute statement.";
        }
    } else {
        echo "Error: The selected table does not have enough seats.";
    }
}
