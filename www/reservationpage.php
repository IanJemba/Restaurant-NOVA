<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Make a Reservation</title>
</head>

<body>
    <?php require 'header.php' ?>
    <h1>Make a Reservation</h1>
    <form action="process_reservation.php" method="post">
        <label for="date">Date:</label>
        <input type="date" id="date" name="date" required><br><br>

        <label for="time">Time:</label>
        <input type="time" id="time" name="time" required><br><br>

        <label for="persons">Number of Persons:</label>
        <input type="number" id="persons" name="persons" min="1" required><br><br>

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
        </select><br><br>

        <input type="submit" value="Submit Reservation">
    </form>
    <?php require 'footer.php' ?>

</body>

</html>