<?php
    include("connect.php");

    if(isset($_POST['submit'])){
        $loc = $_POST['location'];

    $result = mysqli_query($link,"SELECT doctor_name FROM doctor WHERE location='$loc' ");
        while ($row = mysqli_fetch_array($result)) {
		    echo "$row[1]";
	    }
	mysqli_close($link);
    }
    
  
?>