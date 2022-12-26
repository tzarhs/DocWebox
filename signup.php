<?php

/*session_start();*/

include_once 'connect.php';
if (isset( $_POST['submit'])) {

<<<<<<< HEAD
$username = $_POST['username'];
$password = $_POST['password'];
$usertype = $_POST['select'];
=======
        $username = $_POST["username"];
        $password = $_POST["password"];
        $profession = $_POST["profession"];
        $location = $_POST["location"];
>>>>>>> 0d547ae7425add8300e70d52ae792f3b14dfeac8

        if($_POST['select'] == "option1"){
                mysqli_query($link,"INSERT INTO patient(name, password)
                VALUES ('$username', '$password')");
                header("Location: index.php?signup=success");

<<<<<<< HEAD
mysqli_query($link,"INSERT INTO login(username, password, user_type)
        VALUES ('$username', '$password', '$usertype')");
  
header("Location: index.php?signup=success");
=======
        }elseif($_POST['select'] == "option2"){
                mysqli_query($link,"INSERT INTO doctor(profession_id, location, doctor_name, password)
                VALUES ('$profession','$location', '$username', '$password')");
                header("Location: index.php?signup=success");
        }
>>>>>>> 0d547ae7425add8300e70d52ae792f3b14dfeac8
}
?>