<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
</head>
<body>
<?php

session_start();
include 'connect.php';


if (isset( $_POST['submit'])) {

        $username = $_POST['username'];
        $password = $_POST['password'];
        $profession = $_POST['profession'];
        $location = $_POST['location'];

     
        if($_POST['select'] == "option1"){
                $query1 = "SELECT * FROM patient WHERE name='$username'";
                $result1 = mysqli_query($link, $query1);

                if (mysqli_num_rows($result1) > 0) {
                        $error = "Signup Failed! Username already exists";
                        echo "<script type='text/javascript'>alert('$error');</script>";
                        header('location: login.php?login=failed');
                }else{
                        mysqli_query($link,"INSERT INTO patient(name, password)
                        VALUES ('$username', '$password')");
                        header("Location: index.php?signup=success");    
                }
        }elseif($_POST['select'] == "option2"){
                $query2 = "SELECT * FROM doctor WHERE doctor_name='$username'";
                $result2 = mysqli_query($link, $query2);

                if (mysqli_num_rows($result2) > 0) {
                        $error = "Signup Failed! Username already exists";
                        echo "<script type='text/javascript'>alert('$error');</script>";
                        header('location: login.php?login=failed');
                }else{
                        mysqli_query($link,"INSERT INTO doctor(profession_id, location, doctor_name, password)
                        VALUES ('$profession','$location', '$username', '$password')");
                        header("Location: doctor_profile.php?signup=success");    
                }
        }

        
}
?>
</body>
</html>
