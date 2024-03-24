<?php

require 'database.php';

$sql = "SELECT * FROM Product";
$stmt = $conn->prepare($sql);
$stmt->execute();



// Check if search query is provided in the form submission
if (isset($_POST['search'])) {
    $search = '%' . $_POST['search'] . '%';
    // Construct SQL query with search filter
    $sql = "SELECT * FROM Product WHERE naam LIKE :searched";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':searched', $search);
    $stmt->execute();
}


$meals = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meals</title>
</head>
<link rel="stylesheet" href="stylesheet.css">

<body>
    <?php require 'header.php' ?>
    <form action="meals.php" method="POST">
        <input type="text" name="search" placeholder="Search for dishes">
        <button type="submit">Search</button>
    </form>

    <div>
        <?php foreach ($meals as $meal) : ?>
            <div class="container">
                <a href="meal_detail.php?id=<?php echo $meal["product_id"] ?>">
                    <img src="<?php echo $meal['naam'] ?>">
                    <img src="<?php echo $meal['afbeelding'] ?>">
                    <p> &euro; <?php echo $meal['verkoopprijs'] ?> </p>
                    <h2><?php echo $meal['categorie'] ?></h2>
                    <p><?php echo $meal['beschrijving'] ?> </p>

                </a>

            </div>
        <?php endforeach; ?>
        <?php require 'footer.php' ?>

</body>

</html>