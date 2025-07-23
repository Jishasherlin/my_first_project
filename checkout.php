<?php
session_start();
include 'header.php'; // Assuming you have a header file for navigation
$conn = new mysqli("localhost", "root", "", "collections");

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
$product_id = $_SESSION['buy_now'];
$user_id = $_SESSION['user_id'];

// Get product details
$product = $conn->query("SELECT * FROM products WHERE product_id = $product_id")->fetch_assoc();

// Handle form submit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $address = $_POST['address'];

    $stmt = $conn->prepare("INSERT INTO orders (user_id, product_id, address) VALUES (?, ?, ?)");
    $stmt->bind_param("iis", $user_id, $product_id, $address);
    $stmt->execute();

    // Clear buy now session after placing order
    unset($_SESSION['buy_now']);

    echo "<h3 style='background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
            padding: 30px 40px;
            border-radius: 10px;
            text-align: center;
            margin-top: 40px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);'>✅ Order placed successfully!</h3>";
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Checkout</title>

    <style>
        .box {
            width: 400px;
            margin: auto;
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 10px;
        }
        input, textarea {
            width: 100%;
            margin-bottom: 15px;
            padding: 10px;
        }
        button {
            background: #35424a;
            color: white;
            padding: 10px;
            border: none;
            cursor: pointer;
            width: 100%;
        }
    </style>
</head>
<body>

<div class="box">
    <h2>Checkout</h2>
    <p><strong>Product:</strong> <?php echo $product['productName']; ?></p>
    <p><strong>Price:</strong> ₹<?php echo $product['price']; ?></p>

    <form method="POST">
        <label for="address">Shipping Address:</label>
        <textarea name="address" id="address" required></textarea>

        <button type="submit">Place Order</button>
    </form>
</div>

</body>
</html>
