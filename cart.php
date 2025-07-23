<?php
session_start();

include 'header.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
$user_id = $_SESSION['user_id'];
// 🛒 Handle 'Add to Cart' after login (only once)
if (isset($_SESSION['pending_add_to_cart']) && !isset($_SESSION['cart_handled'])) {
    $productId = (int)$_SESSION['pending_add_to_cart'];
    unset($_SESSION['pending_add_to_cart']); // Remove so it doesn't repeat
    $_SESSION['cart_handled'] = true;

    if (!isset($_SESSION['cart'])) $_SESSION['cart'] = [];

    if (!isset($_SESSION['cart'][$productId])) {
        $_SESSION['cart'][$productId] = 1;
    } else {
        $_SESSION['cart'][$productId]++;
    }

    header("Location: cart.php"); // Reload the page once
    exit;
}

// Clear the flag after reload
unset($_SESSION['cart_handled']);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Your Cart</title>
    <style>
        body { font-family: Arial; }
        .cart-card{
             width: 300px;
            border: 1px solid #ccc;
            padding: 15px;
            border-radius: 10px;
            background: #64879dff;
            color: white;
            line-height: 1;
        }
        img {
            width: 100%;
            height: 250px;
            object-fit: cover;
        }
        .actions { margin-top: 30px; text-align: center; }
        .btn { padding: 10px; text-decoration: none; background: #35424a;  color: white; border: none; border-radius: 4px; margin: 5px; cursor: pointer; }
        .btn:hover { background: #a9bacaff; color:black}
    </style>
</head>
<body>
    <h2 style="text-align: center;">🛒 Your Shopping Cart</h2>

<?php
if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    echo "<p style='text-align:center;'>Your cart is empty.</p>";
    echo '<a href="frontpage.php" class="btn">Back to Shop</a>';
} else {
    echo '<div class="cart-container">';
    foreach ($_SESSION['cart'] as $item) {
        // var_dump($item['image_url']); // Uncomment for debugging if needed
        // use null coalescing to avoid errors
        $image = htmlspecialchars($item['image_url'] ?? 'placeholder.jpeg');
        $name = htmlspecialchars($item['productName'] ?? 'Unknown Product');
        $qty = max(1, intval($_POST['qty'] ?? '0'));
        $price = htmlspecialchars($item['price'] ?? '0');
        $sizes = htmlspecialchars($item['sizes_available'] ?? 'N/A');
        $desc = htmlspecialchars($item['description'] ?? '');
        $id = urlencode($item['product_id'] ?? '');
        ?>
        <div class="cart-card" style="border:1px solid #ccc; padding:10px; margin:5px; width:250px; display:inline-block; vertical-align:top;">
            <img src="<?php echo htmlspecialchars($item['productImage']); ?>" alt="Product Image">
            <div class="cart-body">
                <h2 style="text-align: center;"><?= $name ?></h2>
                <p>Quantity: <?=$qty ?></p>
                <p>Price: ₹<?= $price ?></p>
                <p>Available Sizes: <?= $sizes ?></p>
                <p><?= $desc ?></p>
            </div>
        
        

    <div class="actions">
        <a href="remove.php?product_id=<?= $id ?>" class="btn">Remove</a>
        
        <?php if (!empty($_SESSION['cart'])): ?>
            <a href="checkout.php" class="btn">Buy Now</a>
        <?php endif; ?>
        
    </div></div>
    
    <?php
    }
    echo '</div>';
    echo '<div class="actions"> <br> <a href="remove_all.php" class="btn" style="padding:10px; margin:20px;"> 🗑️ Remove All</a>
   <br><br> <a href="product.php" class="btn"> ⬅️ Back to Shopping</a> </div> ';
}
?>
</body>
</html>
