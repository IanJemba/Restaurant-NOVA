<?php
session_start();

if (!isset($_SESSION['user_id']) || !isset($_SESSION['role'])) {
    header("Location: login.php");
    exit();
}

$_SESSION['user_id'] = $user['gebruiker_id'];
$_SESSION['email'] = $user['email'];
$_SESSION['name'] = $user['naam'];
$_SESSION['role'] = $user['rol'];


echo "<h2>Welcome, User ID: $user_id, Role: $role</h2>";
