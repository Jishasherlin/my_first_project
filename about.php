<?php include 'header.php'; // include your common header ?>

<!DOCTYPE html>
<html>
<head>
  <title>About Us</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f4f4f4;
      margin: 0;
      padding: 0;
    }
    .about-container {
      max-width: 800px;
      margin: 40px auto;
      background: #baccddff;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    h2 {
      color: #333;
      text-align: center;
    }
    p {
      font-size: 16px;
      line-height: 1.6;
      color: #444;
    }
    .btn {
      display: inline-block;
      margin-top: 20px;
      padding: 10px 20px;
      background: #2c3e50;
      color: white;
      text-decoration: none;
      border-radius: 5px;
    }
    .btn:hover {
      background: #45a049;
    }
    .center {
      text-align: center;
    }
  </style>
</head>
<body>

<div class="about-container">
  <h2>About Us</h2>
  <p>Welcome to <strong>Collections</strong> – your one-stop shop for stylish and affordable essentials. Founded in 2025, we’re a small, passionate team committed to making online shopping simple, personal, and joyful.</p>
  
  <p>Our mission is to deliver high-quality products at fair prices, while ensuring every order is packaged with care. We believe in great design, customer happiness, and supporting local talent.</p>
  
  <p>Whether you're here for fashion, lifestyle, or unique handmade items — we're here to make sure you enjoy every step of the journey.</p>
  
  <p class="center"><a href="product.php" class="btn">⬅ Back to Shopping</a></p>
</div>
<?php
include 'footer.php';
?>
</body>
</html>
