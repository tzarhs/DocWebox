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
        <a href="#"><img src="logo_doctor.png" alt="logo"></a>
      </label>
      <ul>
        <li><a class="active" href="#">Ειδικότητες</a></li>
        <li><a href="#">Σύνδεση/Εγγραφή</a></li>
        <li><a href="#">Σχετικά με εμάς</a></li>
      </ul>
    </nav>

    <div class="container">
    <form action="" class="search-bar">
        <input type="text" placeholder="Ειδικότητα" name="profession">
        <input type="text" placeholder="Περιοχή" name="location">
        <button type="submit"><img src="search.png"></button>
    </form>
</div>
    
  </body>
</html>

<?php
    include("connect.php");
?>