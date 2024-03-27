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

        try {
            // Start a transaction
            $conn->beginTransaction();

            // Delete user's address from the Adres table
            $sql_delete_address = "DELETE FROM Adres WHERE gebruiker_id = :user_id";
            $stmt_delete_address = $conn->prepare($sql_delete_address);
            $stmt_delete_address->bindParam(':user_id', $user_id);
            $stmt_delete_address->execute();

            // Delete user from the Gebruikers table
            $sql_delete_user = "DELETE FROM Gebruikers WHERE gebruiker_id = :user_id";
            $stmt_delete_user = $conn->prepare($sql_delete_user);
            $stmt_delete_user->bindParam(':user_id', $user_id);
            $stmt_delete_user->execute();

            // Commit the transaction
            $conn->commit();

            // Logout the user and redirect to a confirmation page
            session_destroy();
            header("Location: account_deleted.php");
            exit();
        } catch (Exception $e) {
            // Rollback the transaction if an error occurred
            $conn->rollback();
            // Handle deletion error
            echo "Error: Unable to delete account. " . $e->getMessage();
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
    <form action="delete_account.php" method="POST">
        <button type="submit" name="confirm">Yes, Delete My Account</button>
        <button type="submit" name="cancel">No, Cancel</button>
    </form>
</body>

</html>