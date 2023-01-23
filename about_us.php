<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <title>Σχετικά με εμάς</title>

</head>

<body>
    <nav>
      <input type="checkbox" id="check">
      <label for="check" class="checkbtn">
        <i class="fas fa-bars"></i>
      </label>
      <label class="logo">
        <a href="index.php"><img src="images/logo_doctor.png"></a>
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
    <style>
    @media(max-width:540px){
     nav{ 
      position:static;
     }
    }
      </style>

    

    <div class="about_us">
    <h1>Σχετικά με εμάς</h1>
    <p>Καλώς ήρθατε στην ιστοστελίδα μας! Είμαστε μια ομάδα φοιτητών του Πανεπιστημίου Μακεδονίας , του τμήματος Εφαρμοσμένης Πληροφορικής.</p>
    <h2>Ο στόχος μας</h2>
    <p>Η ομάδα οργανώθηκε με στόχο την επιτυχή ολοκλήρωση της εργασίας Ζ εξαμήνου του μαθήματος Ειδικά Θέματα Προγραμματισμού Διαδικτύου, της διδάσκουσας Αικατερίνης Τζαφίλκου.</p>
    <h2>Γνωρίστε την ομάδα</h2>
    <ul class="team">
      <li>Γιάννης Τζαρής - ics20120</li>
      <li>Δημήτρης Χίος - ics20095</li>
      <li>Γιάννης Σταμκόπουλος - ics20118</li>
      <li>Γιάννης Παρματάς - ics20090</li>
    </ul>
    <h2>Επικοινωνήστε μαζί μας</h2>
    <p>Για τυχόν απορίες ή σχόλια, επικοινωνήστε μάζι μας στις διευθύνσεις email που αναγράφονται παραπάνω. </p>
    

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
