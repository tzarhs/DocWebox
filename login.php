<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style2.css">
    <title>Login</title>
</head>
<style>
  .box{
    top: 55%;
  }
</style>

<body>
<nav>
      <input type="checkbox" id="check">
      <label for="check" class="checkbtn">
        <i class="fas fa-bars"></i>
      </label>
      <label class="logo">
        <a href="index.php"><img src="images/logo_doctor.png" alt="logo"></a>
      </label>
      <ul>
        <li><a href="about_us.php">Σχετικά με εμάς</a></li>
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
    $username = mysqli_real_escape_string($link,  $_POST['username']);
    $password = mysqli_real_escape_string($link,  $_POST['password']);
    
    $query1 = "SELECT * FROM doctor WHERE doctor_name='$username' AND password='$password'";
    $result1 = mysqli_query($link, $query1);

    $query2 = "SELECT * FROM patient WHERE name='$username' AND password='$password'";
    $result2 = mysqli_query($link, $query2);

    if (mysqli_num_rows($result1) == 1) {
      session_start();
      $_SESSION['logged_in'] = true;
      $_SESSION['username'] = $username;
      $_SESSION['usertype'] = 'doctor';
      header('location: doctor_profile.php?doctor_login=success');

    }elseif(mysqli_num_rows($result2) == 1){
      session_start();
      $_SESSION['logged_in'] = true;
      $_SESSION['username'] = $username;
      $_SESSION['usertype'] = 'patient';
      header('location: patient_profile.php?patient_login=success');

    }else {
      $error = "Invalid username or password";
      echo "<script type='text/javascript'>alert('$error');</script>";
    }
  }

?>

</body>
</html>