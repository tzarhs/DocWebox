<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style2.css">
    <title>My Profile</title>
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
        <li><a href="appointments.php">Τα ραντεβού μου</a></li>
        <li><a href="#">Το προφίλ μου</a></li>
        <li><a href="disconnect.php">Αποσύνδεση</a></li>
      </ul>
</nav>
<?php
include("connect.php");

session_start();

if (session_status() == PHP_SESSION_ACTIVE) {
  echo 'There is an active session';
} else {
  echo 'There is no active session';
}

?>

</body>
</html>