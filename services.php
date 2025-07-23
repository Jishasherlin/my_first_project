<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<style>
    .navbar ul {
        list-style: none;
        padding: 0;
        margin: 0;
        font-size: x-large;
        justify-content: center; /* center horizontally */
    }

    .navbar li {
        padding: 30px;
        text-align: center;
        border-bottom: 1px solid #fff;
    }

    .navbar a {
        text-decoration: none;
        color:darkblue;
        font-weight:bold;
    }
  .navbar a:hover {
    color: darkslateblue;
    background-color: white;
    text-decoration: underline;
}

</style></head>
<?php
include 'header.php';
?>

</head>
<body>
    <div class="navbar">      
        <ul>
        <li><a href="kids.php"> Kids</a></li>
        <li><a href="girls.php">Girls</a></li>
        <li><a href="boys.php">Boys</a></li>
        <li><a href="women.php">Women</a></li>
        <li><a href="men.php">Men</a></li></ul>
        </div>
<?php
include 'footer.php'; ?>
</body>
</html>