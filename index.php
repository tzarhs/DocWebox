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
        <li><a href="#sidebar" id="toggle">Ειδικότητες</a></li>
        <li><a href="login.php">Σύνδεση/Εγγραφή</a></li>
        <li><a href="#">Σχετικά με εμάς</a></li>
      </ul>
    </nav>

    <div id="sidebar">
      <header>Ειδικότητες</header>
      <ul>
        <li><a href="#">Αιματολόγος</a></li>
        <li><a href="#">Αλεργιολόγος</a></li>
        <li><a href="#">Αναισθησιολόγος</a></li>
        <li><a href="#">Γενικός Ιατρός</a></li>
        <li><a href="#">Γαστρεντερολόγος</a></li>
        <li><a href="#">Γυναικολόγος</a></li>
        <li><a href="#">Δερματολόγος</a></li>
        <li><a href="#">Διαιτολόγος</a></li>
        <li><a href="#">Καρδιολόγος</a></li>
        <li><a href="#">Λογοθεραπευτής</a></li>
        <li><a href="#">Μαστρολόγος</a></li>
        <li><a href="#">Νευρολόγος</a></li>
        <li><a href="#">Ογκολόγος</a></li>
        <li><a href="#">Οδοντίατρος</a></li>
        <li><a href="#">Ορθοπεδικός</a></li>
        <li><a href="#">Οφθαλμίατος</a></li>
        <li><a href="#">Παθολόγος</a></li>
        <li><a href="#">Παιδίατρος</a></li>
        <li><a href="#">Πλαστικός Χειρούργος</a></li>
        <li><a href="#">Ρευματολόγος</a></li>
        <li><a href="#">Φυσικοθεραπευτής</a></li>
        <li><a href="#">Ψυχίατρος</a></li>
        <li><a href="#">Ωτορινολαρυγγολόγος</a></li>
      </ul>
    </div>

    <div class="container">
      <!-- <h1>Αναζητήστε τον γιατρό που θέλετε!</h1> -->
      <form action="search.php" class="search-bar" method="POST">
        <input type="text" placeholder="Ειδικότητα" name="profession">
        <input type="text" placeholder="Περιοχή" name="location">
        <button type="submit" name="submit"><img src="search.png"></button>
      </form>
    </div>
    
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

<script>
  const toggle = document.getElementById('toggle');
  const sidebar = document.getElementById('sidebar');

  document.onclick = function(e){
    if(e.target.id !== 'sidebar' && e.target.id !== 'toggle'){
      toggle.classList.remove('active');
      sidebar.classList.remove('active');

    }
  }


  toggle.onclick = function(){
    toggle.classList.toggle('active');
    sidebar.classList.toggle('active');
  }

  
</script>

<?php
    include("connect.php");
?>
   