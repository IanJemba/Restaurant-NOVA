<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Make a Reservation</title>
    <link rel="stylesheet" href="styles.css">

</head>

<body>
    <?php require 'header.php' ?>
    <div class="form-container">
        <h1 class="form-title">Make a Reservation</h1>
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
            </div>

            <button type="submit" class="form-submit">Submit Reservation</button>
        </form>
    </div>
    <?php require 'footer.php' ?>

</body>

</html>