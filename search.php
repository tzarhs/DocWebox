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
    session_Start();
    /*$username = $_SESSION['username'];*/
    
    if(isset($_POST['submit'])){
        $loc = $_POST['location'];
        $prof = $_POST['name'];
        

    if(!empty($loc) && !empty($prof)){
        $query="SELECT profession.name,doctor.doctor_name,doctor.city,doctor.adress,
        doctor.tel
        FROM profession   
        INNER JOIN doctor ON  profession.id = doctor.profession_id
        WHERE doctor.city='$loc' AND profession.name='$prof' ";
    } else {
      
         $query="SELECT profession.name,doctor.doctor_name,doctor.city,doctor.adress,
         doctor.tel
        FROM profession   
        INNER JOIN doctor ON  profession.id = doctor.profession_id
        WHERE doctor.city='$loc' OR profession.name='$prof' ";
    }

        $prof_result = mysqli_query($link, $query);
        ?>
        

        <table>
	      <tr bgcolor="#DCDCDC">
	  	  <td style="font-weight:bold">Όνομα</td>
		    <td style="font-weight:bold">Τοποθεσία</td>
        <td style="font-weight:bold">Ειδικότητα</td>
        <td style="font-weight:bold">Οδός</td>
        <td style="font-weight:bold">Τηλέφωνο</td>
	      </tr>
  <?php
    while ($row = mysqli_fetch_array($prof_result)) {
     
  ?>
    
		    <tr>
          <td bgcolor="#DCDCDC">
	      <?=$row['doctor_name']?>
		    </td>

        <td bgcolor="#DCDCDC">
		    <?=$row['city']?>
		    </td>
        
        <td bgcolor="#DCDCDC">
		    <?=$row['name']?>
		    </td>

        <td bgcolor="#DCDCDC">
		    <?=$row['adress']?>
		    </td>

        <td bgcolor="#DCDCDC">
		    <?=$row['tel']?>
		    </td>
        
      
        <td bgcolor="#DCDCDC">
          <a href="appointment_form.php"><button name="appointment">Κλείστε ραντεβού</button></a><br>
        </td>
        </tr>
      
       <?php 
       echo "<br>";   
        $_SESSION['doctor_name'] = $row['doctor_name'];
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

