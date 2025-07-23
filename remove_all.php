<?php
session_start();

// Remove all cart items
unset($_SESSION['cart']);

// Optional: Redirect back to cart or home
header("Location: cart.php");
exit;
?>
