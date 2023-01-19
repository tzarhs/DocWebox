<?php
    include("connect.php");
    session_start();
?>
   
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
        
        
        <?php
        if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
          if($_SESSION['usertype'] == 'doctor'){
        ?>
            <li><a href="doctor_profile.php">Το Προφίλ μου</a></li>
        <?php
          }elseif($_SESSION['usertype'] == 'patient'){
            $username = $_SESSION['username'];
        ?>
           <li><a href="patient_profile.php">Το Προφίλ μου</a></li>         
        <?php
        }
        }else{
        ?>
          <li><a href="login.php">Σύνδεση/Εγγραφή</a></li>
        <?php
        }
        ?>
        <li><a href="about_us.php">Σχετικά με εμάς</a></li>
      </ul>
    </nav>

    

  <div class="container">
      <div id="sidebar">
        <header>Ειδικότητες</header>
      
        <?php
          include("connect.php");
          $sql = "SELECT * FROM profession";
              $result = mysqli_query($link, $sql);
              
              if (mysqli_num_rows($result) > 0) {
                echo '<ul id="sidebar_data" name="sidebar_data" > ';
                echo ' ';
                while ($row = mysqli_fetch_assoc($result)) {
                  echo '<li  value="' . $row['id'] . '"> <a href="search.php?name=' . $row['name'] . '">' . $row['name'] . '</a></li>';
                }
                echo '</ul>'; }
      ?>
        

      </div>
   
    <h1>Health is Wealth</h1>


    <form action="search.php" class="search-bar" method="POST">
  <input type="text" id="prof" placeholder="Ειδικότητα" name="profession" oninput="searchProfession()">
  
  <input type="text" id="loc" placeholder="Περιοχή" name="location" oninput="searchLocation()">
     
  <button type="submit" name="submit"><img src="search.png"></button>
</form>

<div id="search-results"></div>

<script>
    function searchProfession() {
        var input = document.getElementById("prof").value;
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var searchResults = document.getElementById("search-results");
                searchResults.innerHTML = this.responseText;
                if (input.length > 0) {
                    searchResults.classList.add("active");
                    var resultElements = searchResults.getElementsByTagName("div");
                    for (var i = 0; i < resultElements.length; i++) {
                        resultElements[i].addEventListener("click", function() {
                            document.getElementById("prof").value = this.innerHTML;
                            searchResults.classList.remove("active");
                        });
                    }
                } else {
                    searchResults.classList.remove("active");
                }
            }
        };
        xhttp.open("GET", "search_profession.php?q="+input, true);
        xhttp.send();
    }
    function searchLocation() {
        var input = document.getElementById("loc").value;
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var searchResults = document.getElementById("search-results");
                searchResults.innerHTML = this.responseText;
                if (input.length > 0) {
                    searchResults.classList.add("active");
                    var resultElements = searchResults.getElementsByTagName("div");
                    for (var i = 0; i < resultElements.length; i++) {
                        resultElements[i].addEventListener("click", function() {
                            document.getElementById("loc").value = this.innerHTML;
                            searchResults.classList.remove("active");
                        });
                    }
                } else {
                    searchResults.classList.remove("active");
                }
            }
        };
        xhttp.open("GET", "search_location.php?q="+input, true);
        xhttp.send();
      }
</script>



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
   
