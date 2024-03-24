<?php
require 'database.php';

// Check if meal ID is provided in the URL
if (isset($_GET['id'])) {
    $meal_id = $_GET['id'];

    // Fetch meal details from the database
    $sql = "SELECT * FROM Product WHERE product_id = :meal_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':meal_id', $meal_id, PDO::PARAM_INT);
    $stmt->execute();
    $meal = $stmt->fetch(PDO::FETCH_ASSOC);

    // Check if meal exists
    if (!$meal) {
        // Redirect to error page or display error message
        echo "Meal not found.";
        exit;
    }
} else {
    // Redirect to error page or display error message
    echo "Meal ID not provided.";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $meal['naam']; ?> Details</title>
    <link rel="stylesheet" href="stylesheet.css">
</head>

<body>
    <?php require 'header.php'; ?>
    <div class="container">
        <h2><?php echo $meal['naam']; ?></h2>
        <img src="<?php echo $meal['afbeelding']; ?>" alt="<?php echo $meal['naam']; ?>">
        <p><strong>Price:</strong> &euro; <?php echo $meal['verkoopprijs']; ?></p>
        <p><strong>Description:</strong> <?php echo $meal['beschrijving']; ?></p>
        <p><strong>Category:</strong> <?php echo $meal['categorie']; ?></p>
        <!-- Add more details as needed -->
    </div>
    <?php require 'footer.php'; ?>
</body>

</html>