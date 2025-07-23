<!DOCTYPE html>
<html lang="en">    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">


<style>
    body {
        flex:1;}
       
              
        form {
            padding: 20px; 
            border-radius: 5px; 
        }

        

        input[type="text"],
input[type="email"],
input[type="password"] {
    width: 90%;        /* Wider input fields */
    padding: 12px;     /* Taller and more spaced */
    font-size: 15px;   /* Bigger input text */
    border: 1px solid #ccc;
    border-radius: 10px;
    margin-bottom: 15px;
}

button {
    background-color: #35424a;
    color: white;
    padding: 10px 10px;
    font-size: 16px;
    border: none;
    border-radius: 5px;
    margin-right: 10px;
    cursor: pointer;
}
        button:hover {
            background-color:#2c3e50; 
        }
    .card{
            background-color: #b5c5deff; 
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 30px;
            margin-left: 35%;
            margin-bottom: 0;
            padding: 10px; 
            min-height: 40vh;
            width: 400px;
        }
        label {
    display: block;
    margin-bottom: 10px;
    font-size: 16px; /* Increase label size */
    font-weight: bold; /* Optional: make it more readable */
} 
</style></head>
<body>
     
<?php
include 'header.php';
?>

             <div class="container">
    <div class="card" style="align-items: center;">
  
       <div class="row">    
        <h2 style="text-align: center;">Login</h2>
     <form action="submit2.php" method="post">

            <label for="email">Email:</label>
            <input type="text" id="email" name="email" required><br><br>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
                <i class="fa fa-eye" id="togglePassword" style="cursor: pointer; margin-left: -30px;"></i><br><br>

            <button type="submit">Login</button>
            <button type="reset">Cancel</button>
        </form><br><br>
        <p style="text-align: center;">Don't have an account? <a href="signup.php">Sign Up</a></p>
        </div>
        </div>
        </div>
        
   
    
<script>
    const toggle = document.getElementById('togglePassword');
    const password = document.getElementById('password');

    toggle.addEventListener('click', function () {
        // Toggle type
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);

        // Toggle icon
        this.classList.toggle('fa-eye-slash');
    });
</script>
<?php
include 'footer.php';   
?></body>
</html>