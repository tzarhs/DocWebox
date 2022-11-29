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

<form class="box" mehtod ="post">

        <h1>Login</h1>
        <input type="text" id="username" name="username" placeholder="Username">
        <input type="text" id="password" name="password" placeholder="Password">
        <input type="submit" value="Login">
        <a href="createAcc.php"><input type="submit1" class="button" value="Create a new account"></a>
</form>

<nav>
      <input type="checkbox" id="check">
      <label for="check" class="checkbtn">
        <i class="fas fa-bars"></i>
      </label>
      <label class="logo">
        <a href="index.php"><img src="doctor_logo4.png" alt="logo"></a>
      </label>
      <ul>
        <li><a class="active" href="#">Ειδικότητες</a></li>
        <li><a href="#">Σύνδεση/Εγγραφή</a></li>
        <li><a href="#">Σχετικά με εμάς</a></li>
      </ul>
</nav>

</body>

</html>

<?php
    include("connect.php");
?>