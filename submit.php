<?php
$host = "localhost";
$user = "root";
$pass = ""; 
$dbname = "collections";

// Enable MySQLi exceptions
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$conn = new mysqli($host, $user, $pass, $dbname);
$conn->set_charset("utf8mb4"); // Avoid charset issues

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $result = $conn->query("SELECT user_id FROM user ORDER BY user_id DESC LIMIT 1");
        $row = $result->fetch_assoc();
        $newId = $row ? $row['user_id'] + 1 : 1001;

        $username = $_POST['username'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $dob = $_POST['dob'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $profile_pic = $_FILES['profile_pic'];
$picName = "img/default.jpeg"; // default fallback

if ($profile_pic['size'] > 0) {
    $ext = pathinfo($profile_pic['name'], PATHINFO_EXTENSION);
    $allowed = ['jpg', 'jpeg', 'png', 'gif'];
    
    if (in_array(strtolower($ext), $allowed)) {
        $picName = "img/" . uniqid() . "." . $ext;
        move_uploaded_file($profile_pic['tmp_name'], $picName);
    }
}

        $stmt = $conn->prepare("INSERT INTO user (profile_pic, username, address, phone, dob, gender, email, password) VALUES (?,?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssss", $picName,$username, $address, $phone, $dob, $gender, $email, $password);
        $stmt->execute();

        header("Location: login.php");
        exit();

    } catch (mysqli_sql_exception $e) {
        if ($e->getCode() == 1062) {
            echo '<p style="color:red;">❌ This email is already registered. Please use a different one.</p>';
        } else {
            echo '<p style="color:red;">❌ Database error: ' . $e->getMessage() . '</p>';
        }
    }
} else {
    die("Invalid request method.");
}

$conn->close();
?>
