<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
       
/*body div*/
body{
    background-color: #ffffff;
}
        .container-fluid {
            width: 100%;
            margin: auto;
            overflow: hidden;
        }
        header {
            display: flex;
            align-items: center;
            justify-content:space-between; /* aligns items to the left */
            background: #35424a;
            color: #ffffff;
            padding: 20px ;
            text-align: center;
            font-size: large;
        }

        .logo img{
            width: 100px;
            height: 100px;
        }
.nav-items ul {
      list-style: none;
      display: flex;
      gap: 20px;
      padding: 0;
      margin-bottom: 20px;
    }

    .nav-items a {
      color: white;
      text-decoration: none;
      font-weight: bold;
    }

    .nav-items a:hover {
      text-decoration: underline;}
.toggle-btn {
    position: absolute;
    top: 10px;
    right: 20px;
    color: white;
    border: 6px solid rgba(255,255,255,0.3);
    backdrop-filter: blur(10px);
    padding: 10px 20px;
    border-radius: 10px;
    font-weight: bold;
    z-index: 2;
    transition: all 0.3s ease;
}

.toggle-btn:hover {
    background: rgba(255,255,255,0.2);
}
      
        
    </style>
</head>
<body>
    <div class="container-fluid">
        <header>
            <div class="logo">
            <img src="img\img2.png" alt="Logo" style="width: 100; height: 100px;">
            </div>
            <h1>Collections</h1>
            <nav class="nav-items"> 
            
    
 <ul>
        <!-- Common Menu -->
        <li><a class="active" href="frontpage.php"><i class="fas fa-home"></i> Home</a></li>
        <li><a class="active" href="about.php"><i class="fa-solid fa-circle-info"></i> About</a></li>
        <li><a class="active" href="contact.php"><i class="fas fa-envelope"></i> Contact</a></li>
        <li><a class="active" href="product.php"><i class="fa-solid fa-person-dress"></i> Services</a></li>
        <!-- Conditional Menu -->
        <?php if (!isset($_SESSION['user_id'])): ?>
            <li><a class="active" href="login.php"><i class="fa-solid fa-right-to-bracket"></i> Login</a></li>
            <li><a class="active" href="signup.php"><i class="fa-solid fa-user-plus"></i> Sign Up</a></li>
        <?php else: ?>
            <li><a class="active" href="profile.php"><i class="fa-solid fa-user"></i> Profile</a></li>
            <li><a class="active" href="logout.php"><i class="fa-solid fa-right-from-bracket"></i> Logout</a></li>
        <?php endif; ?>
    </ul>
      
        </nav></header></div>
 
</body>
</html>