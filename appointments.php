<?php
    session_start();
    include("connect.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style2.css">
    <title>My appointments</title>
</head>
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
        <?php
        if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
          if($_SESSION['usertype'] == 'doctor'){
        ?>
            <li><a href="doctor_profile.php">Το Προφίλ μου</a></li>
        <?php
          }elseif($_SESSION['usertype'] == 'patient'){
        ?>
           <li><a href="patient_profile.php">Το Προφίλ μου</a></li>         
        <?php
        }
        }else{
        ?>
          <li><a href="login.php">Σύνδεση/Εγγραφή</a></li>
        <?php
        }
        ?>
        <li><a href="logout.php">Αποσύνδεση</a></li>
      </ul>
</nav>