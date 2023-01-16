<?php
include("connect.php");
session_start();

$doc = $_SESSION['doctor_name'];
$patient= $_SESSION['username'];

if(isset($_POST['submit'])){
    $app = mysqli_real_escape_string($link, $_POST['appointment_date']);
    $time = mysqli_real_escape_string($link,$_POST['appointment_time']);
    /*$patient = mysqli_real_escape_string($link, $_POST['fullname']);*/

    $query = "SELECT name FROM patient WHERE name = '$patient' ";
    $result = mysqli_query($link,$query);
    $row = mysqli_fetch_assoc($result);
    if(!($row)){
        echo "<script>alert('Πρέπει να συνδεθέιτε σαν χρήστης!'); 
        window.location.href='create_acc.php';</script>";

    }
    else{
    $query = "SELECT id FROM doctor WHERE doctor_name = '$doc'";
    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_assoc($result);
    $doctor_id = $row['id'];

    $query = "SELECT id FROM patient WHERE name = '$patient' ";
    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_assoc($result);
    $patient_id = $row['id'];

    $query = "INSERT INTO appointment(date,time, doctor_id, patient_id) VALUES ('$app','$time', '$doctor_id', '$patient_id')";
    $result = mysqli_query($link, $query);
    if(!$result){
        echo mysqli_error($link);
        die();
    }else{
        /*Patient*/
        $query = "SELECT id FROM appointment WHERE patient_id = '$patient_id'";
        $result = mysqli_query($link,$query);
        $row = mysqli_fetch_assoc($result);
        $patient_row = $row['id'];
        $query = "UPDATE patient SET appointment_id='$patient_row' WHERE name='$patient' ";
        $result = mysqli_query($link,$query);
        /*Doctor*/
        $query = "SELECT id FROM appointment WHERE doctor_id = '$doctor_id'";
        $result = mysqli_query($link,$query);
        $row = mysqli_fetch_assoc($result);
        $doctor_row = $row['id'];
        $query = "UPDATE doctor SET appointment_id='$doctor_row' WHERE doctor_name='$doc' ";
        $result = mysqli_query($link,$query);

        header("Location: index.php?booking=success");
    }
}
}
mysqli_close($link);
?>
