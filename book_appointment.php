<?php
include('connect.php');

if(isset($_POST['submit'])){
    $app = $_POST['appointment_date'];
        
    mysqli_query($link,"INSERT INTO appointment(date) VALUES('$app')");
    header("Location: index.php?booking=success");
    
	    }
	mysqli_close($link);
?>