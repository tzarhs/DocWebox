<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <title>DocWebox-Οι καλύτεροι γιατροί στην διάθεση σου!</title>
</head>

<body>
    <nav>
      <input type="checkbox" id="check">
      <label for="check" class="checkbtn">
        <i class="fas fa-bars"></i>
      </label>
      <label class="logo">
        <a href="index.php"><img src="logo_doctor.png"></a>
      </label>
      <ul>
        <li><a class="active" href="#">Ειδικότητες</a></li>
        <li><a href="login.php">Σύνδεση/Εγγραφή</a></li>
        <li><a href="about_us.php">Σχετικά με εμάς</a></li>
      </ul>
    </nav>

  <?php
    include("connect.php");
    session_start();
    $_SESSION['doctor_name'] = $_POST['doctor_name'];
    /*$username = $_SESSION['username'];*/
    
  ?>

  <div class="appointment">
  <form action="book_appointment.php" method="POST">
    Appointment day: <input type="date" name="appointment_date" required>
    Appointment time: <input type="time" name="appointment_time" required>
    <!--<input type="text" placeholder="Ονοματεπώνυμο" name="fullname" required>-->
    <input type="submit" name="submit">
  </form>
    </div>
  </body>
</html>

<?php
    include("connect.php");
?>