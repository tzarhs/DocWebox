<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style2.css">
    <title>Σχετικά με εμάς</title>
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
        <?php
        if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
          if($_SESSION['usertype'] == 'doctor'){
        ?>
            <li><a href="doctor_profile.php">Το Προφίλ μου</a></li>
        <?php
          }elseif($_SESSION['usertype'] == 'patient'){
            $username = $_SESSION['username'];
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
        </ul>
    </nav>

    <div class="container">
        <div id="page-heading"><h1> Σχετικά με εμάς </h1> </div>
        <div id="about-us-box"><h2> Tα μέλη της ομάδας </h2>
        </div>

    </div>



</body>

<div class="footer">
            <div class="footer-heading footer-1">
                <a href="#"><h3>DocWebox &copy;2022</h3></a></div>
            <div class="footer-heading footer-2">
                <h3>Σχετικά με εμάς</h3>
                <a href="#">Η Εταιρία μας</a>
                <a href="#">Η Ομάδα μας</a></div>
            <div class="footer-heading footer-3">
                <h3><a href="#">Πολιτική Απορρήτου</a></h3></div>
            <div class="footer-heading footer-3">
                <h3><a href="#">Όροι Χρήσης</a></h3></div>
        </div>
        </body>
</html>
