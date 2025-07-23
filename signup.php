<!DOCTYPE html>
<html lang="en"> 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">


<style>
       form {
    display: flex;
    flex-direction: column;
    padding: 10px;
    gap: 0px;
    width: 80%;
    margin-left: auto;
}

form input[type="text"],
form input[type="email"],
form input[type="password"],
form input[type="tel"],
form input[type="date"],
form input[type="submit"] {
    width: 80%;
    padding: 10px;
    margin-bottom: 15px;
    font-size: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

label {
    margin-bottom: 5px;
    font-weight: bold;
}

.card {
    background-color: #b5c5deff;
        margin-top: 30px;
    margin-left: 35%;
    margin-bottom: 30px;
    padding: 25px;
    width: 500px;
    min-height: 70vh;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
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
.button-group {
    display: flex;
    gap: 10px;
    margin-top: 10px;
}

.password-field {
    display: flex;
    align-items: center;
    width: 80%;
    margin-bottom: 15px;
}
.password-field input {
    flex: 1;
}
.password-field i {
    margin-bottom: 14px;
    margin-left: -30px;
    cursor: pointer;
    color: #666;
}
password-field i:hover {
    color: #000;

}

        </style>  </head>
<body>
  
<?php
include 'header.php';
?>

        <div class="container">        

    <div class="card">
        <form action="submit.php" method="POST" enctype="multipart/form-data">

           
                     

            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="address">Address:</label>
            <input type="text" id="address" name="address" required>

            <label for="phone">Phone:</label>
            <input type="tel" id="phone" name="phone" required> 

            <label for="dob">Date of Birth:</label>
            <input type="date" id="dob" name="dob" required>    

            <label for="gender">Gender</label>
            <div style="margin-bottom: 15px;">
            <input type="radio" id="male" name="gender" value="Male">Male
            <input type="radio" id="female" name="gender" value="Female">Female
            <input type="radio" id="other" name="gender" value="Other">Other  
            </div>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Password:</label>
            <div class="password-field">
            <input type="password" id="password" name="password" required>
            <i class="fa fa-eye" id="togglePassword" ></i>
            </div>

            <label>Upload Profile Image:</label>
            <input type="file" name="profile_pic" required>
            
            <div class="button-group">
    <button type="submit">Sign Up</button>
    <button type="reset">Cancel</button>
</div>

        </form>
    </div>
    
<script>
    const toggle = document.getElementById('togglePassword');
    const password = document.getElementById('password');

    toggle.addEventListener('click', function () {
        // Toggle type
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);

        // Toggle icon
        this.classList.toggle('fa fa-eye');
    });
</script>
<?php include 'footer.php'; ?>
</body>
</html>