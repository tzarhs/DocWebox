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
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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

        /* Επικύρωση της μορφής email και τηλεφώνου*/
        if ((filter_var($email, FILTER_VALIDATE_EMAIL))) {
                if($_POST['select'] == "option1"){
                        $query1 = "SELECT * FROM patient WHERE name='$username'";
                        $result1 = mysqli_query($link, $query1);
        
                        if (mysqli_num_rows($result1) > 0) {
                                $_SESSION['alert_message_error'] = 'Η Εγγραφή απέτυχε! Το username υπάρχει ήδη.';
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
                }elseif(($_POST['select'] == "option2") && (preg_match("/^\d{2} \d{4} \d{4}$/", $tel))){
                        $query2 = "SELECT * FROM doctor WHERE doctor_name='$username'";
                        $result2 = mysqli_query($link, $query2);
        
                        /* Error alert άμα το username υπάρχει στην βάση*/
                        if (mysqli_num_rows($result2) > 0) {
                                $_SESSION['alert_message_error'] = 'Η Εγγραφή απέτυχε! Το username υπάρχει ήδη.';
                                header('location: create_acc.php?login=failed');
                                exit;
                        }else{
                                mysqli_query($link,"INSERT INTO doctor(profession_id, city, doctor_name, password, address, tel)
                                VALUES ('$profession','$city', '$username', '$password', '$address', '$tel')");
                                $_SESSION['logged_in'] = true;
                                $_SESSION['username'] = $username;
                                $_SESSION['usertype'] = 'doctor';
                                header("location: doctor_profile.php?signup=success");    
                        }
                 /* Error alert άμα το format του τηλεφώνου είναι λανθασμένο*/
                }elseif((($_POST['select'] == "option2")) && (!(preg_match("/^\d{2} \d{4} \d{4}$/", $tel)))){
                        $_SESSION['alert_tel_error'] = 'Λανθασμένη Μορφή Τηλεφώνου. Πρέπει να είναι της μορφής "55-5555-5555".';
                        header('location: create_acc.php?login=failed');
                }
        /* Error alert άμα το format του e-mail είναι λανθασμένο*/
        }elseif(!(filter_var($email, FILTER_VALIDATE_EMAIL))) {
                        $_SESSION['alert_email_error'] = 'Λανθασμένη Μορφή E-Mail. Πρέπει να είναι της μορφής "example@example.com".';
                        header('location: create_acc.php?login=failed');
               
        }
        /* Errors alerts άμα το format είναι λανθασμένο*/
             
}
?>
</body>
</html>
