<?php
session_start();
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "collections";
$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

// Get current user data
$id = $_SESSION['user_id'];
$result = $conn->query("SELECT * FROM user WHERE user_id = $id");
$user = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
    <head>  
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit Profile</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <style>
           
            .container {
                width: 50%;
                height: fit-content;
                max-width: 500px;
                margin-top: 30px;
                margin-left: auto;
                margin-right: auto;
                margin-bottom: 0;
                padding: 5px;
                background-color: #b5c5deff;
                border-radius: 10px;
                box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            }
            h2 {
                text-align: center;
                color: #35424a;
            }
            input[type="text"], input[type="email"], input[type="date"], input[type="file"], select {
                width: 60%;
                padding: 10px;
                margin-bottom: 15px;
                font-size: 15px;
                margin-left: 85px;
                border-radius: 5px;
                border: 1px solid #ccc;
            }
            button {
                width: 100px;
                padding: 10px 16px;
                background-color: #35424a;
                color: white;
                border: none;
                border-radius: 6px;
                margin-left: 150px;
   margin-right: auto;
            }
            button:hover {
                background-color: #2c3e50;
            }
            .btn {
                 width: 100px;
                padding: 10px 16px;
    background-color: #35424a;
    color: white;
   margin-left: auto;
   margin-right: auto;
    text-decoration: none;
    border-radius: 5px;
    font-size: 16px;
}
.btn:hover {
                background-color: #2c3e50;
            }

        </style>
    </head>
    <body>
        <?php include 'header.php'; // Include the header file ?>
        <div class="container">
            <h2>Edit Profile</h2>
            <?php if(isset($_SESSION['message'])): ?>
                <div class="alert alert-success">
                    <?php 
                        echo $_SESSION['message']; 
                        unset($_SESSION['message']);
                    ?>
                </div>
            <?php endif; ?>
 
<form action="updateProfile.php" method="POST">
    
    <input type="text" name="username" value="<?php echo $user['username']; ?>" required>
    <input type="email" name="email" value="<?php echo $user['email']; ?>" required>
    <input type="text" name="phone" value="<?php echo $user['phone']; ?>">
    <input type="text" name="address" value="<?php echo $user['address']; ?>">
    <input type="date" name="dob" value="<?php echo $user['dob']; ?>">
    <select name="gender">
        <option value="Male" <?php if($user['gender']=="Male") echo "selected"; ?>>Male</option>
        <option value="Female" <?php if($user['gender']=="Female") echo "selected"; ?>>Female</option>
    </select>
    <input type="file" name="profile_pic" value="<?php echo $user['profile_pic']; ?>"><br>
    <button type="submit">Update</button>
 <a href="profile.php" class="btn">Cancel</a>
</form>
</div>
<?php
include 'footer.php'; // Include the footer file
?>
    </body> 
</html>