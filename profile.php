<?php
session_start();
$host = "localhost";
$user = "root";
$pass = ""; 
$dbname = "collections";
$conn = new mysqli($host, $user, $pass, $dbname); 
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}   

// Check if user is NOT logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page
    header("Location: login.php");
    exit();
}

 
$id = $_SESSION['user_id']; // Example: customer.php?id=3

// Using prepared statements to prevent SQL injection
// Note: Ensure that 'user_id' is the correct column name in your database
$sql = "SELECT * FROM user WHERE user_id = $id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $customer = $result->fetch_assoc();
} else {
    echo "Customer not found.";
}
$conn->close();

?>
<!DOCTYPE html>
<html lang="en">    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Profile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        
        .card {
             width: 60%;
             height: 75vh;
             display: flex;
             justify-content: center;
                align-items: center;             
            max-width: 500px;
            margin-top: 10px;
            margin-left: auto;
            margin-right: auto; 
            margin-bottom: auto;
            padding: 10px;
            background-color: #b5c5deff;
            border-radius: 6px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        h2 {
            text-align: center;
            color: #35424a ;
        }
        p {
            font-size: 18px;
            line-height: 1.6;
        }
        .profile-image img {
            display: flex;
            align-items: center;
            justify-content: center;
            margin: auto;
    width: 120px;
    height: 120px;
    object-fit: cover;
    border-radius: 50%;
    border: 3px solid rgba(255,255,255,0.3);
}

.profile-details {
    flex: 1;
}

.edit-btn {
    display: inline-block;
    text-align: center;
    justify-content: center;
    margin:auto;
    margin-top: 10px;
    margin-left: 40%;
    padding: 8px 12px;
    background-color: #3498db;
    color: white;
    text-decoration: none;
    border-radius: 6px;
    font-weight: bold;
    transition: background-color 0.3s;
}

.edit-btn:hover {
    background-color: #2980b9;
    
}

        
        </style>
</head>
<body>
    <?php
    include 'header.php'; // Include the header file
     ?>
    <div class="card">
        <div class="row">
            
        <h2>Profile Details</h2>
        
        <div class="profile-image">
        <img src="<?php echo $customer['profile_pic'] ?? 'img/default.jpeg'; ?>" alt="Profile Image">
    </div>
        <p><strong>Username:</strong> <?php echo htmlspecialchars($customer['username']); ?></p>
        <p><strong>Address:</strong> <?php echo htmlspecialchars($customer['address']); ?></p>
        <p><strong>Phone:</strong> <?php echo htmlspecialchars($customer['phone']); ?></p>
        <p><strong>Date of Birth:</strong> <?php echo htmlspecialchars($customer['dob']); ?></p>
        <p><strong>Gender:</strong><?php echo htmlspecialchars(string: $customer['gender']);?></p>
        <p><strong>Email:</strong> <?php echo htmlspecialchars($customer['email']); ?></p>
        <div class="profile-actions">
        <a href="editProfile.php" class="edit-btn"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
        </div><br><br></div>
   </body>
   

</html>
 