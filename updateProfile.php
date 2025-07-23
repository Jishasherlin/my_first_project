<?php
session_start();
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "collections";
$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

$id = $_SESSION['user_id'];

$username = $_POST['username'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$dob = $_POST['dob'];
$gender = $_POST['gender'];
$profile_pic = $_POST['profile_pic'];

$sql = "UPDATE user SET 
    username='$username', 
    email='$email', 
    phone='$phone', 
    address='$address',
    dob='$dob',
    gender='$gender',
    profile_pic='$profile_pic',
    updated_at=NOW()
    WHERE user_id=$id";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Profile updated successfully'); window.location.href='profile.php';</script>";
} else {
    echo "Error: " . $conn->error;
}
?>
