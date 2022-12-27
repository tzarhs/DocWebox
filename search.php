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
        <li><a href="#">Σχετικά με εμάς</a></li>
      </ul>
    </nav>

  <div class="list">
<?php
    include("connect.php");

    if(isset($_POST['submit'])){
        $loc = $_POST['location'];
        
        echo "<h1>Doctors List</h1><br><br><br>";
    $result = mysqli_query($link,"SELECT doctor_name FROM doctor WHERE location='$loc' ");
        while ($row = mysqli_fetch_array($result)) {
		      echo "Name:".$row['doctor_name']."<br>";
          ?>
          <a href="appointment_form.php"><button name="appointment"></button></a>
       <?php    
	    }
	mysqli_close($link);
    }
    
?>
  </div>

  </body>
</html>

<?php
    include("connect.php");
?>