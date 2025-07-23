<?php
session_start();
$conn = new mysqli("localhost", "root", "", "collections");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

$stmt = $conn->prepare("SELECT user_id, password FROM user WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($row = $result->fetch_assoc()) {
    if (password_verify($password, $row['password'])) {
        $_SESSION['user_id'] = $row['user_id'];
if (isset($_SESSION['pending_add_to_cart'])) {
    header("Location: cart.php");
} else {
    header("Location: frontpage.php");
}
exit;
    } else {
        echo "Invalid password.";
    }
} else {
    echo "User not found.";
}
?>
