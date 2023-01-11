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
        <li><a href="doctor_profile.php">Το προφίλ μου</a></li>
      </ul>
</nav>


  <div id="center-content">
      <h1 align='center'>Καλωσήρθες <?php echo $_SESSION['username']; ?>!</h1>
      <div class="profile-container">
      <div id="contentbox">
        <?php                   
          $username =  $_SESSION['username'];
  
          $query = "SELECT * FROM doctor WHERE doctor_name = '$username'";
          $result = mysqli_query($link, $query);

          while($row=mysqli_fetch_array($result)){
            if (mysqli_num_rows($result) == 1) {
              $_SESSION['location'] = $row['location'];

              $prof_query="SELECT profession.name, doctor.id
                          FROM profession   
                          INNER JOIN doctor ON profession.id = doctor.profession_id
                          WHERE doctor.doctor_name = '$username'";
              $prof_result = mysqli_query($link, $prof_query);

              while($row = mysqli_fetch_array($prof_result)){
                  $_SESSION['profession'] = $row['name'];
                  $_SESSION['id'] = $row['id'];
                }  
            
          }   
        ?>
          <div id="signup-info">
            <div id="signup-st">
              <form action="" method="POST" id="signin" id="reg">
                <div id="reg-head" class="headrg">Το Προφίλ του Γιατρού</div>
                  <table border="0" align="center" cellpadding="2" cellspacing="0">
                  <tr id="trow-1">
                    <td class="tl-1"><div align="left" id="tb-name">ID:</div></td>
                    <td class="tl-4"> <?php echo '&nbsp;&nbsp;' . $_SESSION['id']; ?></td>
                    </tr>           
                    <tr id="trow-1">
                    <td class="tl-1"><div align="left" id="tb-name">Username:</div></td>
                    <td class="tl-4"> <?php echo '&nbsp;&nbsp;' . $_SESSION['username']; ?></td>
                    </tr>                                
                                        
                    <tr id="trow-1">
                    <td class="tl-1"><div align="left" id="tb-name">Profession:</div></td>   
                    <td class="tl-4"> <?php echo '&nbsp;&nbsp;' . $_SESSION['profession']; ?></td>
                    </tr>
                                      
                    <tr id="trow-1">
                    <td class="tl-1"><div align="left" id="tb-name">Location:</div></td>                
                    <td class="tl-4"> <?php echo '&nbsp;&nbsp;' . $_SESSION['location']; ?></td>
                    </tr>
                  </table>
              </form>
                </div>
          </div>
          <div id="func-bts">
            <div id="func-bts-sg">
              <div id="bottom-sec"><a href="edit.php" id="bottom-sec-btn">Τροποποίηση Στοιχείων</a></div>
              <div id="bottom-sec"><a href="logout.php" id="bottom-sec-btn">Αποσύνδεση</a></div>
              <div id="bottom-sec"><a href="delete_acc.php" id="bottom-sec-btn">Διαγραφή Λογαρισμού</a></div>
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

