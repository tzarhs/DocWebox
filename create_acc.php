<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style2.css">
    <title>Login</title>
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
        <li><a class="active" href="#">Ειδικότητες</a></li>
        <li><a href="#">Σύνδεση/Εγγραφή</a></li>
        <li><a href="#">Σχετικά με εμάς</a></li>
      </ul>
</nav>

<form action="signup.php" class="box" method ="POST">

        <h1>Sign up</h1>
        <br> 
        <div class="wrapper">
            <input type="radio" name="select" id="option1" value="option1" checked>
            <input type="radio" name="select" id="option2" value="option2">
             <label for="option1" class="option option1">  
                <span>Patient</span>
            </label>
            <label for="option2" class="option option2">
                <span>Doctor</span>
            </label>
        </div>
        <input type="text" id="username" name="username" placeholder="Full name" required>
        <input type="password" id="password" name="password" placeholder="Password" required>

          <?php
              include("connect.php");
              
              $sql = "SELECT * FROM profession";
              $result = mysqli_query($link, $sql);
              
              if (mysqli_num_rows($result) > 0) {
                echo '<select id="profession" name="profession" placeholder="Profession" style="display:none">';
                echo ' ';
                while ($row = mysqli_fetch_assoc($result)) {
                  echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
                }
                echo '</select>';
              } else {
                echo "No results found.";
              }

          ?>

     
        <input type="text" id="location" name="location" placeholder="Location" style="display:none" >
        <input type="submit" name="submit" value="Sign up">

        <a id="acc" href="login.php">Already have an account?</a>
</form>

<script src="script.js"></script>



</body>

</html>

