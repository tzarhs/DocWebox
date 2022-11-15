<?php
    $link = mysqli_connect("localhost","root","","docwebox") or die ("No connection");

    mysqli_query($link, "SET NAMES utf8 COLLATE utf8_general_ci");
?>