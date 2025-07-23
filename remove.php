<?php
session_start();

if (isset($_GET['product_id'])) {
    $idToRemove = $_GET['product_id'];

    // Remove matching product
    foreach ($_SESSION['cart'] as $index => $item) {
        if ($item['product_id'] == $idToRemove) {
            unset($_SESSION['cart'][$index]);
            break; // Remove only one
        }
    }

    // Re-index array to avoid gaps
    $_SESSION['cart'] = array_values($_SESSION['cart']);
}

header("Location: cart.php");
exit;
