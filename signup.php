<?php

/*session_start();*/

include_once 'connect.php';
if (isset( $_POST['submit'])) {

        $username = $_POST["username"];
        $password = $_POST["password"];
        $profession = $_POST["profession"];
        $location = $_POST["location"];

        if($_POST['select'] == "option1"){
                mysqli_query($link,"INSERT INTO patient(name, password)
                VALUES ('$username', '$password')");
                header("Location: index.php?signup=success");

        }elseif($_POST['select'] == "option2"){
                mysqli_query($link,"INSERT INTO doctor(profession_id, location, doctor_name, password)
                VALUES ('$profession','$location', '$username', '$password')");
                header("Location: index.php?signup=success");
        }
}
?>