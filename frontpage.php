<?php
include 'header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Collections</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      font-family: sans-serif;
      background-color: #f1f1f1;
      position: relative;
      min-height: 100vh;
    }

    .grid-container {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
      gap: 10px;
      padding: 20px;
    }

    .bg-image {
      height: 200px;
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
      border-radius: 8px;
      transition: transform 0.3s ease;
    }

    .bg-image:hover {
      transform: scale(1.05);
      cursor: pointer;
    }

    .img1 { background-image: url("img/img1.jpeg"); }
    .img2 { background-image: url("img/img2.jpeg"); }
    .img3 { background-image: url("img/img3.jpeg"); }
    .img4 { background-image: url("img/img4.jpeg"); }
    .img5 { background-image: url("img/img5.jpeg"); }
    .img6 { background-image: url("img/img6.jpeg"); }
    .img7 { background-image: url("img/img7.jpeg"); }
    .img8 { background-image: url("img/img8.jpeg"); }
    .img9 { background-image: url("img/img9.jpeg"); }
    .img10 { background-image: url("img/img10.jpeg"); }
    .img11 { background-image: url("img/img11.jpeg"); }
    .img12 { background-image: url("img/img12.jpeg"); }
    .bg-text {
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      background-color: rgba(0, 0, 0, 0.5);
      color: white;
      font-weight: bold;
      font-size: 40px;
      padding: 20px 30px;
      border: 3px solid #f1f1f1;
      border-radius: 10px;
      z-index: 10;
      text-align: center;
    }
  </style>
</head>
<body>

  <div class="grid-container">
    <div class="bg-image img1"></div>
    <div class="bg-image img2"></div>
    <div class="bg-image img3"></div>
    <div class="bg-image img4"></div>
    <div class="bg-image img5"></div>
    <div class="bg-image img6"></div>
    <div class="bg-image img7"></div>
    <div class="bg-image img8"></div>
    <div class="bg-image img9"></div>
    <div class="bg-image img10"></div>
    <div class="bg-image img11"></div>
    <div class="bg-image img12"></div>
    <div class="bg-image img3"></div>
    <div class="bg-image img4"></div>
    <div class="bg-image img5"></div>
    <div class="bg-image img6"></div>
    <div class="bg-image img7"></div>
    <div class="bg-image img8"></div>
    <div class="bg-image img9"></div>
    <div class="bg-image img10"></div>
    <div class="bg-image img11"></div>
  </div>

  <div class="bg-text">Collections</div>

</body>
</html>
