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
    <title>Edit Profile</title>
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

  <div id="center-content-edit">
      <h2 align='center'>Τροποποίησε τα στοιχεία του λογαριασμού σου</h2>
      <div class="profile-container">
        <div id="contentbox">
          <div id="signup-info">
            <div id="signup-st"> 
            <!--Άμα ο χρήστης ειναι γιατρός και εχει αλλαξει τα στοιχεια του -->
            <?php

            if (isset($_POST['username']) && $_SESSION['usertype'] == 'doctor') {                
                              
                $id =  $_SESSION['id'];
                $username = $_POST['username'];
                $password = $_POST['password'];
                $location = $_POST['location'];
                $profession_id = $_POST['profession_id'];

                $query1 = "UPDATE doctor set doctor_name='$username', password = '$password', profession_id='$profession_id', location='$location'
                          WHERE id = '$id'";                
                $result1 = mysqli_query($link, $query1) or die("Query error: " . mysqli_error($link)); 
                
                header('location: doctor_profile.php?doctor_update=success');
            /* Άμα ο χρήστης είναι γιατρός και δεν έχει αλλάξει τα στοιχεία του */     
            }else if ($_SESSION['id'] && $_SESSION['usertype'] == 'doctor') {
                $gid=$_SESSION['id'];
                          
                $result3 = mysqli_query($link,"SELECT doctor.doctor_name, profession.name, profession.id, doctor.location, doctor.password
                                                FROM profession   
                                                INNER JOIN doctor ON profession.id = doctor.profession_id
                                                WHERE doctor.id = '$gid'");
                while ($row3 = mysqli_fetch_array($result3)) {
                ?>
                    <form action="" method="POST" id="signin" id="reg">
                    
                        <div id="reg-head" class="headrg">Το Προφίλ του Γιατρού </div>
                        <table border="0" align="center" cellpadding="2" cellspacing="0">
                            <tr id="trow-1">
                            <td class="tl-name"><div align="left" id="tb-name">Username:</div></td>
                            <td class="tl-data"> <input id = "tb-input" name="username" type="text" value="<?=$row3[0];?>" size="50"></td>
                            </tr> 
                            
                            <tr id="trow-1">
                            <td class="tl-name"><div align="left" id="tb-name">Password:</div></td>
                            <td class="tl-data"> <input id = "tb-input" name="password" type="text" value="<?=$row3[4];?>" size="50"></td>
                            </tr>      
                                 
                            <tr id="trow-1">
                            <td class="tl-name"><div align="left" id="tb-name">Profession:</div></td>   
                            <td class="tl-data"> 
                            <?php
                           
                            $result4 = mysqli_query($link, "SELECT * FROM profession");
                            
                            if (mysqli_num_rows($result4) > 0) {
                              echo '<select id="profession" name="profession_id" >';
                              echo '<option value="' . $row3[2] . '" disabled hidden selected>' . $row3[1] . '</option>';
                              
                              while ($row4 = mysqli_fetch_array($result4)) {
                                echo '<option value="' . $row4['id'] . '">' . $row4['name'] . ' </option>';
                              }
                              echo '</select>';
                            } else {
                              echo "No results found.";
                            }
                            ?>
                            </td>
                            </tr>
                                            
                            <tr id="trow-1">
                            <td class="tl-name"><div align="left" id="tb-name">Location:</div></td>                
                            <td class="tl-data"> <input id ="tb-input" name="location" type="text" value="<?=$row3[3];?>" size="50"></td>
                            </tr>

                            <tr>
                            <td id="edit-btn" colspan="2"><input name="submit1" type="submit"></td>
                            </tr>
                        </table>
                    </form>
                    
            <!--Άμα ο χρήστης ειναι ασθενής και εχει αλλαξει τα στοιχεια του -->
            <?php 
           }
            }elseif (isset($_POST['username']) && $_SESSION['usertype'] == 'patient') {                
                              
                $id =  $_SESSION['id'];
                $username = $_POST['username'];
                $password = $_POST['password'];
      
                $query5 = "UPDATE patient set name='$username', password = '$password'
                          WHERE id = '$id'";                
                $result5 = mysqli_query($link, $query5) or die("Query error: " . mysqli_error($link));

                header('location: patient_profile.php?patient_update=success');

            /* Άμα ο χρήστης είναι ασθενής και δεν έχει αλλάξει τα στοιχεία του */     
            }else if ($_SESSION['id'] && $_SESSION['usertype'] == 'patient') {
              $gid=$_SESSION['id'];
                        
              $result6 = mysqli_query($link,"SELECT name, password FROM patient WHERE id = '$gid'");
              while ($row6 = mysqli_fetch_array($result6)) {
              ?>
                  <form action="" method="POST" id="signin" id="reg">
                  
                      <div id="reg-head" class="headrg">Το Προφίλ του Ασθενή </div>
                      <table border="0" align="center" cellpadding="2" cellspacing="0">
                          <tr id="trow-1">
                          <td class="tl-name"><div align="left" id="tb-name">Username:</div></td>
                          <td class="tl-data"> <input id = "tb-input" name="username" type="text" value="<?=$row6[0];?>" size="50"></td>
                          </tr> 
                          
                          <tr id="trow-1">
                          <td class="tl-name"><div align="left" id="tb-name">Password:</div></td>
                          <td class="tl-data"> <input id = "tb-input" name="password" type="text" value="<?=$row6[1];?>" size="50"></td>
                          </tr>      
                           
                          <tr>
                          <td colspan="2"><input name="submit-edit" type="submit"></td>
                          </tr>
                      </table>
                  </form>
                <?php
              }
            }
            ?>  
          </div>
        </div>             
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

