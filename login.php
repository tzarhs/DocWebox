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
        <li><a href="login.php">Σύνδεση/Εγγραφή</a></li>
        <li><a href="#">Σχετικά με εμάς</a></li>
      </ul>
</nav>



<form class="box" method ="POST" >

        <h1>Login</h1>
        <input type="text" id="username" name="username" placeholder="Username" required>
        <input type="password" id="password" name="password" placeholder="Password" required>
        <input type="submit" name="submit" value="Login">

        <a id="acc" href="create_acc.php">Create a new account</a>   
</form>

<?php

  include("connect.php");

  
  if (isset( $_POST['submit'])) {
<<<<<<< HEAD
    $username = mysqli_real_escape_string($link,  $_POST['username']);
    $password = mysqli_real_escape_string($link,  $_POST['password']);
=======
    $username = mysqli_real_escape_string($link,  $_REQUEST['username']);
    $password = mysqli_real_escape_string($link,  $_REQUEST['password']);
>>>>>>> 0d547ae7425add8300e70d52ae792f3b14dfeac8
    $query = "SELECT * FROM login WHERE username='$username' AND password='$password'";

    $result = mysqli_query($link, $query);

    if (mysqli_num_rows($result) == 1) {
      session_start();
      $_SESSION['username'] = $username;
      header('location: index.php');
    }else {
      $error = "Invalid username or password";
      echo "<script type='text/javascript'>alert('$error');</script>";
    }
  }

?>

</body>


</html>



