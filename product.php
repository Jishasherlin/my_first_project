<?php
session_start();
include 'header.php';

$conn = new mysqli("localhost", "root", "", "collections");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get all products
$products = $conn->query("SELECT * FROM products");
?>

<!DOCTYPE html>
<html>
<head>
    <title>All Products</title>
    <style>
        .product-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            padding: 20px;
        }

        .product-box {
            width: 300px;
            border: 1px solid #ccc;
            padding: 15px;
            border-radius: 10px;
            background: #64879dff;
            color: white;
            line-height: 1.6;
        }

        img {
            width: 100%;
            height: 250px;
            object-fit: cover;
        }
        .h1{
            
            text-align: center;
        }

        .actions button {
            margin: 10px 5px;
            padding: 10px;
        }
    </style>
</head>
<body>

<div class="product-grid">
    <?php while ($product = $products->fetch_assoc()): ?>
        <div class="product-box">
        

<img src="<?php echo htmlspecialchars($product['productImage']); ?>" alt="Product Image">
            <h2 style="text-align: center;" ><?php echo $product['productName']; ?></h2>
            <p>Price: ₹<?php echo $product['price']; ?></p>
            <p>Available Sizes: <?php echo $product['sizes_available']; ?></p>
            <p><?php echo $product['description']; ?></p>

            <div class="actions">
                <form action="add_to_cart.php" method="POST" style="display:inline;">
                    <input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>">
                     <input type="hidden" name="qty" value="1" min="1">
                    <button type="submit">Add to Cart</button>
                </form>

                <form action="buynow.php" method="POST" style="display:inline;">
                    <input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>">
                    <button type="submit">Buy Now</button>
                </form>
            </div>
        </div>
    <?php endwhile; ?>
</div>

</body>
</html>
