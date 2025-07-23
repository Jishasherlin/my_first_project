<?php include 'header.php'; ?>

<!DOCTYPE html>
<html>
<head>
  <title>Contact Us</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f4f4f4;
    }
    .contact-container {
      max-width: 600px;
      margin: 40px auto;
      background: white;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    h2 {
      text-align: center;
      color: #2c3e50;
    }
    form label {
      display: block;
      margin-top: 15px;
      font-weight: bold;
    }
    input[type="text"],
    input[type="email"],
    textarea {
      width: 100%;
      padding: 10px;
      margin-top: 5px;
      border-radius: 5px;
      border: 1px solid #ccc;
      resize: vertical;
    }
    textarea {
      height: 120px;
    }
    .btn {
      margin-top: 20px;
      background: #2c3e50;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }
    .btn:hover {
      background-color: #748375ff;
    }
    .info {
      margin-top: 30px;
      color: #444;
    }
  </style>
</head>
<body>

<div class="contact-container">
  <h2>Contact Us</h2>
  <form action="#" method="POST">
    <label for="name">Your Name</label>
    <input type="text" name="name" id="name" required>

    <label for="email">Your Email</label>
    <input type="email" name="email" id="email" required>

    <label for="message">Your Message</label>
    <textarea name="message" id="message" required></textarea>

    <button type="submit" class="btn">Send Message</button>
  </form>

  <div class="info">
    <p><strong>📧 Email:</strong> collections@gmail.com</p>
    <p><strong>📞 Phone:</strong> 9000000001</p>
    <p><strong>📍 Location:</strong> Coimbatore, Tamilnadu, India</p>
  </div>
</div>

</body>
</html>
