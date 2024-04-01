<?php
session_start();
require 'database.php';

$sql = "SELECT * FROM Product";
$stmt = $conn->prepare($sql);
$stmt->execute();

// Check if search query is provided in the form submission
if (isset($_POST['search'])) {
    $search = '%' . $_POST['search'] . '%';
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
    <link rel="stylesheet" href="styles.css">

    <style>
        /* Form CSS */

        /* Form container */
        .search-form {
            background-color: #f2f2f2;
            /* Light grey background */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            /* Shadow effect */
            max-width: 400px;
            /* Limit width of the form container */
            margin: 0 auto;
            /* Center the form horizontally */
        }

        /* Form title */
        .search-form .form-title {
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
        }

        /* Form fields */
        .search-form .form-group {
            margin-bottom: 20px;
        }

        .search-form .form-group label {
            display: block;
            font-weight: bold;
        }

        .search-form .form-group input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            /* Ensure padding and border are included in width */
        }

        /* Form submit button */
        .search-form .form-submit {
            width: 100%;
            padding: 10px;
            background-color: #4caf50;
            /* Green submit button */
            border: none;
            color: #fff;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            /* Smooth hover effect */
        }

        .search-form .form-submit:hover {
            background-color: #45a049;
            /* Darker green on hover */
        }

        /* Form link */
        .search-form .form-link {
            text-align: center;
            margin-top: 10px;
        }

        .search-form .form-link a {
            color: #007bff;
            /* Blue link color */
        }
    </style>
</head>

<body>
    <?php require 'header.php' ?>
    <?php if (isset($_SESSION['user_id']) && $_SESSION['role'] === 'employee') : ?>
        <form class="search-form" action="meals.php" method="POST">
            <input type="text" name="search" placeholder="Search for dishes">
            <button type="submit">Search</button>
        </form>
    <?php endif; ?>

    <div>
        <?php foreach ($meals as $meal) : ?>
            <div class="container">
                <a href="meal_detail.php?id=<?php echo $meal["product_id"] ?>">
                    <img src="<?php echo $meal['afbeelding'] ?>">
                    <h1><?php echo $meal['naam'] ?></h1>
                    <h2 class="category"><?php echo $meal['categorie'] ?></h2>
                    <p class="price">&euro; <?php echo $meal['verkoopprijs'] ?> </p>
                    <p class="description"><?php echo $meal['beschrijving'] ?> </p>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
    <?php require 'footer.php' ?>
</body>

</html>