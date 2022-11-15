<?php
    include("connect.php");

    // Έλεγχος αν υπάρχει ο πίνακας appointment
    if(mysqli_query($link,"DESCRIBE  appointment ")){
        // Αν υπάρχει μην κάνεις τίποτε
    }else{
        // Αν δεν υπάρχει δημιούργησέ τον
        echo "Ο πίνακας appointment δεν υπάρχει... ";
        // Δημιουργία πίνακα food
        $sql = "CREATE TABLE IF NOT EXISTS appointment (
        id INT(11) AUTO_INCREMENT PRIMARY KEY,
        date DATETIME,
        doctor_id INT(11),
        patient_id INT(11),
        )";
        if ($link->query($sql) === TRUE) {
            echo "ΔΗΜΙΟΥΡΓΗΘΗΚΕ!<br/>";
            
        } else {
            echo "Πρόβλημα στη δημιουργία του πίνακα appointment: " . $link->error . "<br/>";
        }
    } 

    // Έλεγχος αν υπάρχει ο πίνακας doctor
    if(mysqli_query($link,"DESCRIBE  doctor ")){
        // Αν υπάρχει μην κάνεις τίποτε
    }else{
        // Αν δεν υπάρχει δημιούργησέ τον
        echo "Ο πίνακας doctor δεν υπάρχει... ";
        // Δημιουργία πίνακα doctor
        $sql = "CREATE TABLE IF NOT EXISTS doctor (
        id INT(11) AUTO_INCREMENT PRIMARY KEY,
        doctor_name VARCHAR(250) NOT NULL,
        location VARCHAR(250) NOT NULL,
        profession_id INT(11) NOT NULL,
        appointment_id INT(11) NOT NULL,
        )";
        if ($link->query($sql) === TRUE) {
            echo "ΔΗΜΙΟΥΡΓΗΘΗΚΕ!<br/>";
            
        } else {
            echo "Πρόβλημα στη δημιουργία του πίνακα doctor: " . $link->error . "<br/>";
        }
    } 

    mysqli_close($link);

?>