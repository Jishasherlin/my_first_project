<?php
session_start();
$conn = new mysqli("localhost", "root", "", "collections");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["product_id"])) {
$id = (int) $_POST["product_id"]; // always cast to int
$qty = intval($_POST['qty'] ?? 1);

// Check if product is already in cart for this user
$user_id = $_SESSION['user_id'] ?? 0; // Make sure user_id is set in session
$product_id = $id;
$stmt = $conn->prepare("SELECT qty FROM cart WHERE user_id = ? AND product_id = ?");
$stmt->bind_param("ii", $user_id, $product_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Product is already in cart → increase quantity
    $row = $result->fetch_assoc();
    $new_qty = $row['qty'] + $qty;

    $update = $conn->prepare("UPDATE cart SET qty = ? WHERE user_id = ? AND product_id = ?");
    $update->bind_param("iii", $new_qty, $user_id, $product_id);
    $update->execute();
} else {
    // New product → insert it
    $insert = $conn->prepare("INSERT INTO cart (user_id, product_id, qty) VALUES (?, ?, ?)");
    $insert->bind_param("iii", $user_id, $product_id, $qty);
    $insert->execute();
}
// Fetch product details from database
$stmt = $conn->prepare("SELECT * FROM products WHERE product_id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($product = $result->fetch_assoc()) {
        $image = $_POST['image_url']; 
        $item = [
            'product_id' => $product["product_id"],
            'productImage' => $product["productImage"], 
            'productName' => $product["productName"],
            'price' => $product["price"],
            'sizes_available' => $product["sizes_available"],
            'description' => $product["description"],
            'image_url' => $image,
            'qty' => intval($_POST['qty'] ?? 1)
        ];

        // Initialize cart session
        if (!isset($_SESSION["cart"])) {
            $_SESSION["cart"] = [];
        }

        $found = false;

        // Check if item already in cart
        foreach ($_SESSION["cart"] as &$cartItem) {
            if ($cartItem["product_id"] == $id) {
                $cartItem["quantity"] += 1;
                $found = true;
                break;
            }
        }

        if (!$found) {
            $_SESSION["cart"][] = $item;
        }

        header("Location: cart.php");
        exit;
    } else {
        echo "Invalid product ID.";
    }
} else {
    echo "Invalid request.";
}
?>
