<?php
// Include the database connection file
require 'database.php';

session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the "confirm" button is clicked
    if (isset($_POST['confirm'])) {
        // Delete the user account from the database
        $user_id = $_SESSION['user_id'];
        $sql = "DELETE FROM Gebruiker WHERE gebruiker_id = :user_id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':user_id', $user_id);
        if ($stmt->execute()) {
            // Logout the user and redirect to a confirmation page
            session_destroy();
            header("Location: account_deleted.php");
            exit();
        } else {
            // Handle deletion error
            echo "Error: Unable to delete account.";
        }
    } elseif (isset($_POST['cancel'])) {
        // If user clicks cancel, redirect back to account page
        header("Location: account.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Account</title>
</head>

<body>
    <h2>Delete Account</h2>
    <p>Are you sure you want to delete your account?</p>
    <form action="delete_account_process.php" method="POST">
        <button type="submit" name="confirm">Yes, Delete My Account</button>
        <button type="submit" name="cancel">No, Cancel</button>
    </form>
</body>

</html>