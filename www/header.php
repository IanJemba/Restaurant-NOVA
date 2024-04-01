<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">

</head>

<body>
    <header>
        <div class="logo">
            <img src="https://static.vecteezy.com/system/resources/previews/024/603/343/original/mexican-restaurant-logo-with-a-combination-of-a-skull-sombrero-hat-and-herbs-in-vintage-style-vector.jpg" alt="Logo">
        </div>
        <div class="name">
            <strong>
                <h1 style="color: #ff7043;">Viva</h1>
            </strong>
            <h1 style="color: whitesmoke ;">LaVida</h1>
        </div>
        <nav>
            <ul>
                <!-- Session-Based Navigation Links -->
                <?php if (isset($_SESSION['user_id'])) : ?>
                    <?php if ($_SESSION['role'] === 'employee') : ?>
                        <li><a href="employee_dashboard.php">Dashboard</a></li>
                        <li><a href="confirm_reservation.php">Check Reservation</a></li>
                        <li><a href="meals.php">Meals in Stock</a></li>
                        <li><a href="register_customer.php">Add Customer</a></li>
                        <li><a href="product_overzicht.php">Products</a></li>
                        <li><a href="employee_overzicht.php">Employees</a></li>
                        <li><a href="logout.php">Logout</a></li>
                    <?php elseif ($_SESSION['role'] === 'customer') : ?>
                        <li><a href="customer_dashboard.php">Dashboard</a></li>
                        <li><a href="menu.php">Menu</a></li>
                        <li><a href="reservationpage.php">Make Reservation</a></li>
                        <li><a href="logout.php">Logout</a></li>
                    <?php elseif ($_SESSION['role'] === 'admin') : ?>
                        <li><a href="admin_dashboard.php">Dashboard</a></li>
                        <li><a href="gebruiker_toevoegen.php">Add User</a></li>
                        <li><a href="meals.php">Meals in Stock</a></li>
                        <li><a href="product_overzicht.php">Products</a></li>
                        <li><a href="employee_overzicht.php">Employees</a></li>
                        <li><a href="logout.php">Logout</a></li>
                    <?php endif; ?>
                <?php else : ?>
                    <!-- Static Navigation Links -->
                    <li><a href="homepage.php">Home</a></li>
                    <li><a href="register_customer.php">Create Account</a></li>
                    <li><a href="loginpage.php">Login</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>
</body>

</html>