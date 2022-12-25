<?php
include_once 'connect.php';

$username = $_POST['name'];
$password = $_POST['password'];
$usertype = $_POST['select'];

if($_POST['select'] == "option1"){
$usertype = 2;
}
elseif($_POST['select'] == "option2"){
$usertype = 3;
}

mysqli_query($link,"INSERT INTO login(name, password, user_type)
        VALUES ('$username', '$password', '$usertype')");

header("Location: index.php?signup=success");
?>