<?php
include('connect.php');
session_start();

$doc = $_SESSION['doctor_name'];



if(isset($_POST['submit'])){
    $app = $_POST['appointment_date'];
    $patient = $_POST['fullname'];
        
    $query = "SELECT doctor.id FROM doctor WHERE doctor.doctor_name = '$doc' ";
    
    mysqli_query($link,"INSERT INTO appointment(date, doctor_id) 
    VALUES ('$app','$query')");
    header("Location: index.php?booking=success");
    
	    }
	mysqli_close($link);
?>