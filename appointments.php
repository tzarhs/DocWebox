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
        <?php 
            $user_id = $_SESSION['id'];

            if ($_SESSION['id'] && $_SESSION['usertype'] == 'doctor') {                
             echo '<li><a href="doctor_profile.php">Το προφίλ μου</a></li>';

            }else if ($_SESSION['id'] && $_SESSION['usertype'] == 'patient'){
              echo '<li><a href="patient_profile.php">Το προφίλ μου</a></li>';

          }else{
            echo '<li><a href="login.php">Σύνδεση/Εγγραφή</a></li>';

          }
        
        ?>
        <li><a href="logout.php">Αποσύνδεση</a></li>
      </ul>
</nav>

<div id="appointments">

  <h1>Τα ραντεβού μου</h1>
  <ul>
    <?php
    
    //$user_id = $_SESSION['id'];

    if ($_SESSION['id'] && $_SESSION['usertype'] == 'doctor') {                

      $query = "SELECT * FROM appointment WHERE doctor_id = $user_id";
      $result = mysqli_query($link, $query);
      $query1 = "SELECT * FROM patient  join appointment on patient.id=appointment.patient_id and doctor_id = $user_id";
      $result1 = mysqli_query($link, $query1);

      while ($appointment = mysqli_fetch_assoc($result)) {
        
        $data = mysqli_fetch_assoc($result1);

        echo "<li>" ."Ραντεβού με τον ". $data['name'] . " στις " . $appointment['date'] .
        '<input id="appointment_edit" type="submit" value="Τροποποίηση ραντεβού" onclick="location.href=\'\'" >'. "</li>";
      }
    }else if ($_SESSION['id'] && $_SESSION['usertype'] == 'patient'){

      $query = "SELECT * FROM appointment WHERE patient_id = $user_id";
      $result = mysqli_query($link, $query);
      $query1 = "SELECT * FROM doctor inner join appointment on doctor.id=appointment.doctor_id and patient_id= $user_id";
      $result1 = mysqli_query($link, $query1);
      
      while ($appointment = mysqli_fetch_assoc($result)) {

        $data = mysqli_fetch_assoc($result1);

        echo "<li>" ."Ραντεβού με τον ". $data['doctor_name'] . " στις " . $appointment['date'] .
        '<input id="appointment_edit" type="submit" value="Τροποποίηση ραντεβού" onclick="location.href=\'\'" >'. "</li>";
      }

    }
    ?>
  </ul>
</div>

</body>
</html>