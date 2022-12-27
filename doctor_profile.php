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
    <title>My Profile</title>
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
        <li><a href="#">Το προφίλ μου</a></li>
        <li><a href="#">Αποσύνδεση</a></li>
      </ul>
</nav>

<div id="center">
  <div class="profile-container">
      <h1 align='center'>Καλωσήρθες <?php echo $loggedin_session; ?>,</h1>
      <h3 align='center'>Είσαι συνδεδεμένος. Μπορείς να αποσυνδεθείς πατώντας το κουμπί Αποσύνδεση πάνω δεξία στην οθόνη.</h3>
    <div id="contentbox">
      <?php
      $sql="SELECT * FROM doctor WHERE id=$loggedin_id";
      $result=mysqli_query($link,$sql);
      ?>
      <?php
      while($rows=mysqli_fetch_array($result)){
      ?>
        <div id="signup">
          <div id="signup-st">
            <form action="" method="POST" id="signin" id="reg">
              <div id="reg-head" class="headrg">Το Προφίλ σου</div>
                <table border="0" align="center" cellpadding="2" cellspacing="0">
                  <tr id="lg-1">
                  <td class="tl-1"><div align="left" id="tb-name">Username:</div></td>
                  <td class="tl-4"><?php echo $rows['doctor_name']; ?></td>
                  </tr>
                  
                  <?php
                    include("connect.php");

                    $prof_query="SELECT profession.name
                                FROM profession   
                                INNER JOIN doctor ON profession.id = doctor.profession_id";
                    $prof_result = mysqli_query($link, $prof_query);

                    if(mysqli_num_rows($prof_result) > 0){   
                      echo '<tr id="lg-1">';
                      echo '<td class="tl-1"><div align="left" id="tb-name">Profession:</div></td>';    
                      while($row = mysqli_fetch_assoc($result)){
                        echo '<td class="tl-4">' . $row['name'] . '</td>';
                      }
                      echo '</tr>';
                    }else {
                      echo 'No profession found.';
                    }         
                  ?>

                  <tr id="lg-1">
                  <td class="tl-1"><div align="left" id="tb-name">Location:</div></td>
                  
                  
                  <td class="tl-4"><?php echo $rows['location']; ?></td>
                  </tr>
                </table>
            </form>
          </div>
        </div>
      <?php 
        }
      ?>
    </div>     
  </div>
</div>
</br>


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

