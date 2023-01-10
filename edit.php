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

  <div id="center-content">
      <h2 align='center'>Τροποποίησε τις Λεπτομέρειες του Λογαριασμού σου</h2>
      <div class="profile-container">
      <div id="contentbox">
    <!--Άμα ο χρήστης ειναι γιατρός και εχει αλλαξει τα στοιχεια του -->
          <div id="signup-info">
            <div id="signup-st"> 
            <?php

            if (isset($_POST['username']) && $_SESSION['usertype'] == 'doctor') {                
                              
                $id =  $_SESSION['id'];
                $username = $_POST['username'];
                //$profession = $_POST['choose_prof'];
                $location = $_POST['location'];
                $profession_id = $_POST['profession_id'];

                

                $query1 = "UPDATE doctor set doctor_name='$username', profession_id='$profession_id', location='$location'
                          WHERE id = '$id'";                
                $result1 = mysqli_query($link, $query1) or die("Query error: " . mysqli_error($link));
                      

                $query2 = "SELECT profession.name
                            FROM profession 
                            INNER JOIN doctor ON profession.id = doctor.profession_id
                            WHERE doctor.doctor_name = '$username'";
                $result2 = mysqli_query($link, $query2) or die("Query error: " . mysqli_error($link));
                while($row2 = mysqli_fetch_array($result2)){
            ?>

                  <form action="" method="POST" id="signin" id="reg">
                    <div id="reg-head" class="headrg">Το Προφίλ του Γιατρου </div>
                      <table border="0" align="center" cellpadding="2" cellspacing="0">
                        <tr id="trow-1">
                          <td class="tl-1"><div align="left" id="tb-name">Username:</div></td>
                          <td class="tl-4"> <input id = "tb-input" name="username" type="text" value="<?=$username;?>" size="50"></td>
                        </tr>                                
                                  
                        <tr id="trow-1">
                          <td class="tl-1"><div align="left" id="tb-name">Profession:</div></td>   
                          <td class="tl-4"> <input id ="tb-input" name="profession" type="text" value="<?=$row2[0];?>" size="50"></td>
                        </tr>
                                              
                        <tr id="trow-1">
                          <td class="tl-1"><div align="left" id="tb-name">Location:</div></td>                
                          <td class="tl-4"> <input id ="tb-input" name="location" type="text" value="<?=$location;?>" size="50"></td>
                        </tr>

                        <tr>
                          <td colspan="2"><input name="submit-edit" type="submit"></td>
                        </tr>
                          </table>
                    </form>
                    
                    <?php
                }             
            /* Άμα ο χρήστης είναι γιατρός και δεν έχει αλλάξει τα στοιχεία του */     
            }else if ($_SESSION['id'] && $_SESSION['usertype'] == 'doctor') {
                $gid=$_SESSION['id'];
                          
                $result3 = mysqli_query($link,"SELECT doctor.doctor_name, profession.name, doctor.location
                                                FROM profession   
                                                INNER JOIN doctor ON profession.id = doctor.profession_id
                                                WHERE doctor.id = '$gid'");
                while ($row3 = mysqli_fetch_array($result3)) {
                ?>
                    <form action="" method="POST" id="signin" id="reg">
                    
                        <div id="reg-head" class="headrg">Το Προφίλ του Γιατρού </div>
                        <table border="0" align="center" cellpadding="2" cellspacing="0">
                            <tr id="trow-1">
                            <td class="tl-1"><div align="left" id="tb-name">Username:</div></td>
                            <td class="tl-4"> <input id = "tb-input" name="username" type="text" value="<?=$row3[0];?>" size="50"></td>
                            </tr>                                
                                 
                            <tr id="trow-1">
                            <td class="tl-1"><div align="left" id="tb-name">Profession:</div></td>   
                            <td class="tl-4"> 
                            <?php
                           
                            $result4 = mysqli_query($link, "SELECT * FROM profession");
                            
                            if (mysqli_num_rows($result4) > 0) {
                              echo '<select id="profession" name="profession_id" placeholder="' . $row3[1] . '">';
                              echo ' ';
                              while ($row4 = mysqli_fetch_array($result4)) {
                                echo '<option value="' . $row4['id'] . '">' . $row3[1] . '</option>';
                              }
                              echo '</select>';
                            } else {
                              echo "No results found.";
                            }
                            ?>
                            </td>
                            </tr>
                                            
                            <tr id="trow-1">
                            <td class="tl-1"><div align="left" id="tb-name">Location:</div></td>                
                            <td class="tl-4"> <input id ="tb-input" name="location" type="text" value="<?=$row3[2];?>" size="50"></td>
                            </tr>

                            <tr>
                            <td colspan="2"><input name="submit-edit" type="submit"></td>
                            </tr>
                        </table>
                    </form>
                    </div>
            </div>

            <?php 
                }
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

