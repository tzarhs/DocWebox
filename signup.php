<?php

session_start();
include 'connect.php';


if (isset( $_POST['submit'])) {

        $username = $_POST['username'];
        $password = $_POST['password'];
        $profession = $_POST['profession'];
        $location = $_POST['location'];

        if($_POST['select'] == "option1"){
                $result = mysqli_query($link,"SELECT * FROM patient WHERE name='$username'");
                $num_rows = mysqli_num_rows($result);
                if ($num_rows) {

                        header("location: create_acc.php?signup=failed"); 
                }else{
                        mysqli_query($link,"INSERT INTO patient(name, password)
                        VALUES ('$username', '$password')");
                        header("Location: index.php?signup=success");    
                }
        }elseif($_POST['select'] == "option2"){
                $result = mysqli_query($link,"SELECT * FROM doctor WHERE doctor_name='$username'");
                $num_rows = mysqli_num_rows($result);
                if ($num_rows) {

                        header("location: create_acc.php?signup=failed"); 
                }else{
                        mysqli_query($link,"INSERT INTO doctor(profession_id, location, doctor_name, password)
                        VALUES ('$profession','$location', '$username', '$password')");
                        header("Location: doctor.php?signup=success");    
                }
        }

        
}
?>