<?php
require 'database.php';

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM Gebruiker WHERE email = :email ";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':email', $email);
// $stmt->bindParam(':password', $password);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user) {
    //if statement compare form password against $user password
    if(password_verify($password, $user['wachtwoord']))

    session_start();
    $_SESSION['user_id'] = $user['gebruiker_id'];
    $_SESSION['email'] = $user['email'];
    $_SESSION['name'] = $user['naam'];
    $_SESSION['role'] = $user['rol'];

    if ($_SESSION['role'] == 'admin') {
        header("Location: admin_dashboard.php");
    } elseif ($_SESSION['role'] == 'employee') {
        header("Location: employee_dashboard.php");
    } else {
        header("Location: customer_dashboard.php");
    }
    exit();
} else {
    echo "Invalid email or password";
}
