<?php
// Start session
session_start();

// Include database connection script
require 'database.php';

// Retrieve reservations data
$sql = "SELECT R.*, U.naam 
        FROM Reservering R
        INNER JOIN Gebruiker U ON R.gebruiker_id = U.gebruiker_id";
$stmt = $conn->prepare($sql);
$stmt->execute();
$reservations = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Retrieve users with role "customer"
$sql = "SELECT * FROM Gebruiker WHERE rol = 'customer'";
$stmt = $conn->prepare($sql);
$stmt->execute();
$customers = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm Reservations</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <?php require 'header.php'; ?>

    <div class="reservation-container">
        <h1 class="reservation-title">Confirmed Reservations</h1>
        <div class="table-container">
            <table class="reservation-table">
                <thead>
                    <tr>
                        <th>Reservation ID</th>
                        <th>User</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Number of Persons</th>
                        <th>Table Number</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($reservations as $reservation) : ?>
                        <tr>
                            <td><?php echo $reservation['reservering_id']; ?></td>
                            <td><?php echo $reservation['naam']; ?></td>
                            <td><?php echo $reservation['datum']; ?></td>
                            <td><?php echo $reservation['tijd']; ?></td>
                            <td><?php echo $reservation['aantal_personen']; ?></td>
                            <td><?php echo $reservation['tafelnummer']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <div class="reservation-form-container">
            <h1>Make a Reservation for a Customer</h1>
            <form action="process_reservation.php" method="post">
                <div class="form-group">
                    <label for="date">Date:</label>
                    <input type="date" id="date" name="date" required>
                </div>

                <div class="form-group">
                    <label for="time">Time:</label>
                    <input type="time" id="time" name="time" required>
                </div>

                <div class="form-group">
                    <label for="persons">Number of Persons:</label>
                    <input type="number" id="persons" name="persons" min="1" required>
                </div>

                <div class="form-group">
                    <label for="table">Select Table:</label>
                    <select id="table" name="table" required>
                        <?php
                        require 'database.php';

                        $sql = "SELECT * FROM Tafel";
                        $stmt = $conn->prepare($sql);
                        $stmt->execute();

                        $available_tables = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        // Loop through available tables and display them as options
                        foreach ($available_tables as $table) {
                            echo "<option value='" . $table['table_id'] . "'>Table " . $table['table_id'] . " (Seats: " . $table['seats'] . ")</option>";
                        }
                        ?>
                    </select>
                    <div class="form-group">
                        <label for="customer">Select Customer:</label>
                        <select id="customer" name="customer" required>
                            <?php foreach ($customers as $customer) : ?>
                                <option value="<?php echo $customer['gebruiker_id']; ?>"><?php echo $customer['naam']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <button type="submit" class="btn-submit">Submit Reservation</button>
            </form>
        </div>
    </div>

    <?php require 'footer.php'; ?>
</body>

</html>