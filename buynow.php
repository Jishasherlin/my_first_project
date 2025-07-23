<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $product_id = $_POST['product_id'];

    // Check if user is logged in
    if (!isset($_SESSION['user_id'])) {
        // Not logged in – redirect to login page
        header("Location: login.php");
        exit();
    }

    // Logged in – proceed to payment
    $_SESSION['buy_now'] = $product_id;

    header("Location: checkout.php");
    exit();
}
?>
