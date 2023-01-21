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
    <title>My appointments</title>
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



<div id="appointments">

  <h1>Τα ραντεβού μου</h1>
  <ul>
    <?php
    
    //$user_id = $_SESSION['id'];

    if ($_SESSION['id'] && $_SESSION['usertype'] == 'doctor') {                

      $query = "SELECT * FROM appointment WHERE doctor_id = $user_id";
      $result = mysqli_query($link, $query);
      $query1 = "SELECT * FROM patient  join appointment on patient.id=appointment.patient_id and doctor_id = $user_id";
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
              <th>Επικοινωνία</th>
              <th>Επιλογές</th>
            </tr>
            <tr> 
              <td><?php echo  $data['name'] ?> </td>
              <td><?php echo  $appointment['date'] ?></br><?php echo date('h:i a', strtotime($appointment['time']))  ?> </td>
              <td><?php echo  $data['email'] ?> </td>
              <td>
							<div class="dropdown open">
								<a href="#!" class="px-2" id="triggerId1" data-toggle="dropdown" aria-haspopup="true"
										aria-expanded="false">
											<i class="fa fa-ellipsis-v"></i>
								</a>
                <?php $value=$appointment['id'];?>
								<div class="dropdown-menu" aria-labelledby="triggerId1">
									<a class="dropdown-item" href="edit_appointment.php?value=<?php echo $value;?>"><i class="fa fa-pencil mr-1"></i> Edit</a>
									<a class="dropdown-item text-danger" href="delete_appointment.php?<?php echo $value; ?>"><i class="fa fa-trash mr-1"></i> Delete</a>
								</div>
							</div>
						  </td>
            </tr>

          </table>

          </li>
          <?php
        }
      
      }
    }else if ($_SESSION['id'] && $_SESSION['usertype'] == 'patient'){

      $query = "SELECT * FROM appointment WHERE patient_id = $user_id";
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
              <th>Επικοινωνία</th>
              <th>Επιλογές</th>
            </tr>
            <tr>
              <td><?php echo  $data['doctor_name'] ?> </td>
              <td><?php echo  $appointment['date'] ?></br><?php echo date('h:i a', strtotime($appointment['time'])) ?> </td>
              <td><?php echo  $data['tel'] ?> </td>
              <td>
							<div class="dropdown open" style="position: static">
								<a href="#!" class="px-2" id="triggerId1" data-toggle="dropdown" aria-haspopup="true"
										aria-expanded="false">
											<i class="fa fa-ellipsis-v"></i>
								</a>
                <?php $value=$appointment['id'];?>
								<div class="dropdown-menu" aria-labelledby="triggerId1">
									<a class="dropdown-item" href="edit_appointment.php?value=<?php echo $value;?>"><i class="fa fa-pencil mr-1"></i> Edit</a>
									<a class="dropdown-item text-danger" href="delete_appointment.php?value=<?php echo $value;?>"><i class="fa fa-trash mr-1"></i> Delete</a>
								</div>
							</div>
						</td>
            </tr>

          </table>

        </li>
          <?php
        }
        
      }
    }
    ?>
  </ul>
</div>



<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
<style>


th{
  color:  rgb(59, 176, 230);
}
td{
  color: #FDE3A7;
}
</style>
</html>