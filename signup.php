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
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <title>Document</title>
</head>
<body>
<?php

if (isset( $_POST['submit'])) {

        $username = $_POST['username'];
        $password = $_POST['password'];
        $profession = $_POST['profession'];
        $city = $_POST['city'];
        $address = $_POST['address'];
        $email = $_POST['email'];
        $tel = $_POST['tel'];

     
        if($_POST['select'] == "option1"){
                $query1 = "SELECT * FROM patient WHERE name='$username'";
                $result1 = mysqli_query($link, $query1);

                if (mysqli_num_rows($result1) > 0) {
                        $_SESSION['alert_message_error'] = 'Signup Failed! Username already exists';
                        header('location: create_acc.php?login=failed');
                        exit;
                }else{
                        mysqli_query($link,"INSERT INTO patient(name, password, email)
                        VALUES ('$username', '$password', '$email')");
                         $_SESSION['logged_in'] = true;
                         $_SESSION['username'] = $username;
                         $_SESSION['usertype'] = 'patient';
                        header("location: index.php?signup=success");    
                }
        }elseif($_POST['select'] == "option2"){
                $query2 = "SELECT * FROM doctor WHERE doctor_name='$username'";
                $result2 = mysqli_query($link, $query2);

                if (mysqli_num_rows($result2) > 0) {
                        $_SESSION['alert_message_error'] = 'Signup Failed! Username already exists';
                        header('location: create_acc.php?login=failed');
                        exit;
                }else{
                        mysqli_query($link,"INSERT INTO doctor(profession_id, city, doctor_name, password, adress, tel)
                        VALUES ('$profession','$city', '$username', '$password', '$address', '$tel')");
                        $_SESSION['logged_in'] = true;
                        $_SESSION['username'] = $username;
                        $_SESSION['usertype'] = 'doctor';
                        header("location: doctor_profile.php?signup=success");    
                }
        }

        
}
?>
</body>
</html>
