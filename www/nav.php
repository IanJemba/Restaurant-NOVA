<?php


// Define navigation links
$navLinks = array();
if (isset($_SESSION['user_id'])) {
    // If user is logged in
    if ($_SESSION['role'] === 'employee') {
        // Navigation links for employee
        $navLinks = array(
            'Dashboard' => 'employee_dashboard.php',
            'Check Reservation' => 'confirm_reservation.php',
            'Meals in stock' => 'meals.php',
            'Make Menu' => 'create_menu.php',
            'Products' => 'product_overzicht.php',
            'Employees' => 'employee_overzicht.php',
            'Delete account' => 'delete_account.php',
            'Logout' => 'logout.php'

        );
    } elseif ($_SESSION['role'] === 'customer') {
        // Navigation links for customer
        $navLinks = array(
            'Home' => 'customer_dashboard.php',
            'Profile' => 'user_profile.php',
            'Menu' => 'menu.php',
            'Make Reservation' => 'make_reservation.php',
            'Delete account' => 'delete_account.php',
            'Logout' => 'logout.php'

        );
    } elseif ($_SESSION['role'] === 'admin') {
        // Navigation links for admin
        $navLinks = array(
            'Dashboard' => 'admin_dashboard.php',
            'Meals in stock' => 'meals.php',
            'Products' => 'product_overzicht.php',
            'Employees' => 'employee_overzicht.php',
            'Logout' => 'logout.php'

        );
    }
} else {
    // If no active session
    $navLinks = array(
        'Create Account' => 'create_account.php',
        'Login' => 'loginpage.php'
    );
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <nav>
        <ul>
            <?php foreach ($navLinks as $label => $url) : ?>
                <li><a href="<?php echo $url; ?>"><?php echo $label; ?></a></li>
            <?php endforeach; ?>
        </ul>
    </nav>
</body>

</html>