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
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <title>Edit appointment</title>
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
        <?php 
            $user_id = $_SESSION['id'];

            if ($_SESSION['id'] && $_SESSION['usertype'] == 'doctor') {                
             echo '<li><a href="doctor_profile.php">Το προφίλ μου</a></li>';

            }else if ($_SESSION['id'] && $_SESSION['usertype'] == 'patient'){
              echo '<li><a href="patient_profile.php">Το προφίλ μου</a></li>';

          }else{
            echo '<li><a href="login.php">Σύνδεση/Εγγραφή</a></li>';

          }
        
        ?>
        <li><a href="logout.php">Αποσύνδεση</a></li>
      </ul>
</nav>


<form method="post" action="" id="appointments">

  <h1>Επεξεργασία ραντεβού</h1>
  
  <ul>

<?php 

$a_id=$_GET['value'];

if ($_SESSION['id'] && $_SESSION['usertype'] == 'doctor') {                

$query = "SELECT * FROM appointment WHERE id = $a_id";
$result = mysqli_query($link, $query);
$query1 = "SELECT * FROM patient inner join appointment on patient.id=appointment.patient_id and doctor_id= $user_id";
$result1 = mysqli_query($link, $query1);

while ($appointment = mysqli_fetch_assoc($result)) {

    $data = mysqli_fetch_assoc($result1);

if(true){
          ?>

   <li>
          <table id="appoinment_table" style="width:100%">
            <tr>
              <th>Ασθενής</th>
              <th>Ημερομηνία</th>
              <th>Ώρα</th>

            </tr>
            <tr>
              <?php $time=date('G:i', strtotime($appointment['time']))?>
              <td> <?php echo  $data['name'];  ?> </td>
              <td> <input type="date" id="appointment_date" name="appointment_date" value="<?php echo  $appointment['date'] ?>"> </td>
              <td> <input type="time" id="appointment_time" name="appointment_time" value="<?php  echo $time ?>" > </td>
            </tr>
          </table>

          <input id="appointment_button" name="submit1" type="submit">

        </li>
   
  </ul>
</div>

<?php
        }
    }

}else if ($_SESSION['id'] && $_SESSION['usertype'] == 'patient'){
    $query = "SELECT * FROM appointment WHERE id = $a_id";
    $result = mysqli_query($link, $query);
    $query1 = "SELECT * FROM doctor inner join appointment on doctor.id=appointment.doctor_id and patient_id= $user_id";
    $result1 = mysqli_query($link, $query1);
    
    while ($appointment = mysqli_fetch_assoc($result)) {
    
        $data = mysqli_fetch_assoc($result1);
    
    if(true){
              ?>
    
       <li>
              <table id="appoinment_table" style="width:100%">
                <tr>
                  <th>Γιατρός</th>
                  <th>Ημερομηνία</th>
                  <th>Ώρα</th>
                </tr>
                <tr>
                  <?php $time=date('G:i', strtotime($appointment['time']))?>
                  <td> <?php echo  $data['doctor_name'];  ?> </td>
                  <td> <input type="date" id="appointment_date" name="appointment_date" value="<?php echo  $appointment['date'] ?>"> </td>
                  <td> <input type="time" id="appointment_time" name="appointment_time" value="<?php echo $time ?>" > </td>
                
                  
                </tr>
              </table>

              <input id="appointment_button" name="submit" type="submit">
       
            </li>

      </ul>
    </form>
    
    <?php
            }
        } 
}


?>
<?php
            if ( isset($_POST['submit'])){

              $date = $_POST['appointment_date'];
              $time = $_POST['appointment_time'];
              
              $query1 = "UPDATE appointment set date='$date', time = '$time' WHERE id = '$a_id'";                
              $result1 = mysqli_query($link, $query1) or die("Query error: " . mysqli_error($link)); 
                
                header('location: appointments.php?appointment_update=success');

            }
            ?>  



</body>
<style>


th{
  color:  rgb(59, 176, 230);
}
td{
  color: #FDE3A7;
}

#appointment_table tr td {
    padding: 8px;
   
}

#appointment_date {
    color: #FDE3A7;
    border: none;
    background-color: transparent;
    font-size: 16px;
    padding: 8px;
}

#appointment_time {
    color: #FDE3A7;
    border: none;
    background-color: transparent;
    font-size: 16px;
    padding: 8px;
}
#appointment_button{
    
  text-align:center;
  padding:10px 21px 10px 21px;
  background-color:#3498DB;
  border:none;
  color:#fff;
  cursor:pointer;
  border-radius:8px;
  line-height:1;
 margin-top: 10px;
}


</style>
</html>