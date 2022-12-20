<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style2.css">
    <title>Login</title>
</head>
<body>

<nav>
      <input type="checkbox" id="check">
      <label for="check" class="checkbtn">
        <i class="fas fa-bars"></i>
      </label>
      <label class="logo">
        <a href="index.php"><img src="logo_doctor.png" alt="logo"></a>
      </label>
      <ul>
        <li><a class="active" href="#">Ειδικότητες</a></li>
        <li><a href="#">Σύνδεση/Εγγραφή</a></li>
        <li><a href="#">Σχετικά με εμάς</a></li>
      </ul>
</nav>

<form action="signup.php" class="box" method ="POST">

        <h1>Sign up</h1>

        <input type="text" id="username" name="username" placeholder="Username">
        <input type="text" id="password" name="password" placeholder="Password">
        <input type="text"id="email" name="email" placeholder="Email">
        <div class="wrapper">
            <input type="radio" name="select" id="option-1" value="option-1" checked>
            <input type="radio" name="select" id="option-2" value="option-2">
             <label for="option-1" class="option option-1">  
             <br> 
                <span>Patient</span>
            </label>
            <label for="option-2" class="option option-2">
            <br>
                <span>Doctor</span>
            </label>
        </div>

        <input type="submit" value="Sign up">
        <a href="login.php"><input type="submit1" class="button" value="Already have an account?"></a>
</form>
      
</body>

</html>

<?php
    include("connect.php");

?>