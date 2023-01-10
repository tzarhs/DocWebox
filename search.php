<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/> -->
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
        $prof = ['profession'];


        $query1 ="SELECT * FROM doctor WHERE location='$loc' AND profession_id='$prof' ";
        $result = mysqli_query($link,$query1);

        $query2="SELECT profession.name,doctor.location,doctor.doctor_name
        FROM profession   
        INNER JOIN doctor ON  profession.id = doctor.profession_id";
        $prof_result = mysqli_query($link, $query2);
        ?>
        <table width="100%" cellpadding="2" cellspacing="1" border-color=black>
	      <tr bgcolor="#DCDCDC">
	  	  <td style="font-weight:bold">Όνομα</td>
		    <td style="font-weight:bold">Τοποθεσία</td>
        <td style="font-weight:bold">Ειδικότητα</td>
        
	      </tr>
  <?php
    while ($row = mysqli_fetch_array($prof_result)) {
      
  ?>
		    <tr>
          <td bgcolor="#DCDCDC">
	      <?=$row['doctor_name']?>
		    </td>
        <td bgcolor="#DCDCDC">
		    <?=$row['location']?>
		    </td>
        
        <td bgcolor="#DCDCDC">
		    <?=$row['name']?>
		    </td>
        
      
        <td bgcolor="#DCDCDC">
          <a href="appointment_form.php"><button name="appointment">Κλείστε ραντεβού</button></a><br>
        </td>
        </tr>
       <?php 
       echo "<br>";   
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