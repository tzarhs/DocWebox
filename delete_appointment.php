<?php
session_start();
include('connect.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style2.css">
    <title>Delete Appointment</title>
</head>

<body>
    <div id="contentbox" >
    <script type="text/javascript">

        function countdown() {
            var i = document.getElementById('timecount');
            if (parseInt(i.innerHTML)<=1) {
                location.href = 'index.php';
            }
            i.innerHTML = parseInt(i.innerHTML)-1;
        }   

    setInterval(function(){ countdown(); },1000);
    </script>

    <?php

    

    $id=$_SESSION['id'];
    $a_id=$_GET['value'];

    $sql1="SELECT * FROM appointment WHERE id= '$a_id' and patient_id='$id'";
    $result1=mysqli_query($link, $sql1);




    if(mysqli_num_rows($result1) == 1) {
    ?>
        <br><b>
    <?php
        $sql3="DELETE FROM appointment WHERE id= '$a_id'";
        $result3=mysqli_query($link, $sql3);

        echo " <div align='center'>";
        echo "Your Appointment Deleted Sucessfully.";
        echo " <a href='appointments.php' >Click here</a> to go back. ";
        echo "</div> ";
    }elseif(!isset($a_id) || $$a_id==NULL) {
        header("Location: index.php");}
       else {
        echo "Unable to delete Your Appointment ";
    
    }
    ?>
        </b>
</div>
</body>
</html>
</div>