<?php
session_start();
// Include the database connection file
require 'database.php';

// Check if user is logged in and has customer role
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'customer') {
    // Redirect to login page if not logged in as customer
    header("Location: loginpage.php");
    exit();
}

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
    <title>Account</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* Additional CSS for Delete Account page */
        .container {
            max-width: 1200px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .meal-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .meal-item {
            flex-basis: calc(33.33% - 20px);
            /* Adjust as needed */
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .meal-item img {
            width: 100%;
            height: auto;
            border-radius: 5px;
        }

        .meal-item h1,
        .meal-item h2,
        .meal-item p {
            margin: 0;
        }
    </style>
</head>

<body>
    <?php require 'header.php' ?>
    <div class="profile">
        <h1>User Profile</h1>
        <div>
            <p><strong>Name:</strong> <?php echo isset($_SESSION['name']) ? $_SESSION['name'] : ''; ?></p>
            <p><strong>Email:</strong> <?php echo isset($_SESSION['email']) ? $_SESSION['email'] : ''; ?></p>
            <p>You are logged in as a <?php echo isset($_SESSION['role']) ? $_SESSION['role'] : ''; ?></p>
            <a href="update_user.php">Edit Profile</a>
        </div>
    </div>


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


    <div class="profile">
        <h2 style="color: orangered;">Delete Account</h2>
        <p>Are you sure you want to delete your account?</p>
        <form action="delete_account.php" method="POST">
            <button type="submit" name="confirm">Yes, Delete My Account</button>
        </form>
    </div>

    <?php require 'footer.php' ?>
</body>

</html>