<?php
session_start();

// Check if user is logged in and has employee role
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'employee') {
    // Redirect to login page if not logged in as employee
    header("Location: loginpage.php");
    exit();
}

// Include your existing database connection script
require 'database.php';

// Initialize variables
$date = $time = $persons = $table = '';
$confirmMessage = '';

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $date = $_POST['date'];
    $time = $_POST['time'];
    $persons = $_POST['persons'];
    $table = $_POST['table'];

    // Check if all fields are filled
    if (!empty($date) && !empty($time) && !empty($persons) && !empty($table)) {
        // Perform reservation confirmation
        $sql = "SELECT Reservering.*, Gebruiker.name 
                FROM Reservering 
                JOIN Gebruiker ON Reservering.gebruiker_id = Gebruiker.gebruiker_id 
                WHERE Reservering.datum = :date AND Reservering.tijd = :time 
                AND Reservering.aantal_personen = :persons AND Reservering.tafelnummer = :table";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':date', $date);
        $stmt->bindParam(':time', $time);
        $stmt->bindParam(':persons', $persons);
        $stmt->bindParam(':table', $table);
        $stmt->execute();

        $reservation = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($reservation) {
            $confirmMessage = "Reservation confirmed successfully! User: " . $reservation['name'];
        } else {
            $confirmMessage = "Reservation not found.";
        }
    } else {
        $confirmMessage = "Please fill in all fields.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm Reservation</title>
</head>

<body>
    <?php require 'header.php' ?>

    <h1>Confirm Reservation</h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="date">Date:</label>
        <input type="date" id="date" name="date" required><br><br>

        <label for="time">Time:</label>
        <input type="time" id="time" name="time" required><br><br>

        <label for="persons">Number of Persons:</label>
        <input type="number" id="persons" name="persons" min="1" required><br><br>

        <label for="table">Table Number:</label>
        <input type="number" id="table" name="table" min="1" required><br><br>

        <input type="submit" value="Confirm Reservation">
    </form>

    <!-- Display confirmation message -->
    <?php if (!empty($confirmMessage)) : ?>
        <p><?php echo $confirmMessage; ?></p>
    <?php endif; ?>
    <?php require 'footer.php' ?>

</body>

</html>