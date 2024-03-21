<?php

require 'database.php';

$sql = "SELECT * FROM Product";
$stmt = $conn->prepare($sql);
$stmt->execute();

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
    <div>
        <?php foreach ($meals as $meal) : ?>
            <div class="container">
                <a href="gerechten-overzicht.php?id=<?php echo $meal["naam"] ?>">
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