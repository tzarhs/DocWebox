<?php
	include("connect.php");

	if(mysqli_query($link,"DESCRIBE patient")){

	}
	else{
		echo "Ο πίνακας patient δεν υπάρχει... ";

		$sql="CREATE TABLE IF NOT EXISTS patient (	id INT(100) AUTO_INCREMENT PRIMARY KEY,	name VARCHAR(60) NOT NULL,	appointment_id INT(100) NOT NULL)";
		if($link->query($sql)===TRUE){
			echo "ΔΗΜΙΟΥΡΓΗΘΗΚΕ!<br/>";
			mysqli_query($link,"INSERT INTO patient VALUES(NULL, 'test name', '1')");
		}
		else{
			echo "Πρόβλημα στη δημιουργία του πίνακα data: ".$link->error."<br/>";
		}
	}
   
   if(mysqli_query($link,"DESCRIBE doctor  ")){

	}
	else{
		echo "Ο πίνακας doctor δεν υπάρχει... ";

		$sql="CREATE TABLE IF NOT EXISTS doctor (id INT(100) AUTO_INCREMENT PRIMARY KEY, profession_id INT(100) not null,appointment_id INT(100) not null,location VARCHAR(30) NOT NULL,	doctor_name varchar(60) NOT NULL)";
		if($link->query($sql)===TRUE){
			echo "ΔΗΜΙΟΥΡΓΗΘΗΚΕ!<br/>";
			mysqli_query($link,"INSERT INTO doctor VALUES(NULL, '1', '1', 'thessaloniki', 'aasd')");
		}
		else{
			echo "Πρόβλημα στη δημιουργία του πίνακα data: ".$link->error."<br/>";
		}
}

   if(mysqli_query($link,"DESCRIBE usertype")){
        //Ο πίνακας υπάρχει ήδη
	}
    else {
        $sql="CREATE TABLE IF NOT EXISTS usertype(id INT(100) AUTO_INCREMENT PRIMARY KEY,user_type VARCHAR(60) NOT NULL	)";
        if($link->query($sql)===TRUE){
            echo "Δημιουργήθηκε ο πίνακας usertype!<br/>";
            mysqli_query($link,"INSERT INTO usertype VALUES(NULL, 'admin')");
            mysqli_query($link,"INSERT INTO usertype VALUES(NULL, 'patient')");
            mysqli_query($link,"INSERT INTO usertype VALUES(NULL, 'doctor')");
            
        }
        else{
			echo "Πρόβλημα στη δημιουργία του πίνακα data: ".$link->error."<br/>";
		}
   }
   

    
    if(mysqli_query($link,"DESCRIBE  profession ")){
        // Αν υπάρχει μην κάνεις τίποτε
    }else{
        // Αν δεν υπάρχει δημιούργησέ τον
        echo "Ο πίνακας profession δεν υπάρχει... ";
		// Δημιουργία πίνακα profession
		$sql = "CREATE TABLE IF NOT EXISTS profession (
		id INT(11) AUTO_INCREMENT PRIMARY KEY NULL,
		name VARCHAR(250) NOT NULL
		)";
        if ($link->query($sql) === TRUE) {
             mysqli_query($link, "INSERT INTO profession (name) VALUES ('Αιματολόγος')");
             mysqli_query($link, "INSERT INTO profession (name) VALUES ('Αλεργιολόγος')");
             mysqli_query($link, "INSERT INTO profession (name) VALUES ('Αναισθησιολόγος')");
             mysqli_query($link, "INSERT INTO profession (name) VALUES ('Γενικός Ιατρός')");
             mysqli_query($link, "INSERT INTO profession (name) VALUES ('Γαστρεντερολόγος')");
             mysqli_query($link, "INSERT INTO profession (name) VALUES ('Γυναικολόγος')");
             mysqli_query($link, "INSERT INTO profession (name) VALUES ('Δερματολόγος')");
             mysqli_query($link, "INSERT INTO profession (name) VALUES ('Διαιτολόγος')");
             mysqli_query($link, "INSERT INTO profession (name) VALUES ('Καρδιολόγος')");
             mysqli_query($link, "INSERT INTO profession (name) VALUES ('Λογοθεραπευτής')");
             mysqli_query($link, "INSERT INTO profession (name) VALUES ('Μαστολόγος')");
             mysqli_query($link, "INSERT INTO profession (name) VALUES ('Νευρολόγος')");
             mysqli_query($link, "INSERT INTO profession (name) VALUES ('Ογκολόγος')");
             mysqli_query($link, "INSERT INTO profession (name) VALUES ('Οδοντίατρος')");
             mysqli_query($link, "INSERT INTO profession (name) VALUES ('Ορθοπεδικός')");
             mysqli_query($link, "INSERT INTO profession (name) VALUES ('Οφθαλμίατρος')");
             mysqli_query($link, "INSERT INTO profession (name) VALUES ('Παθολόγος')");
             mysqli_query($link, "INSERT INTO profession (name) VALUES ('Παιδίατρος')");
             mysqli_query($link, "INSERT INTO profession (name) VALUES ('Πλαστικός Χειρούργος')");
             mysqli_query($link, "INSERT INTO profession (name) VALUES ('Ρευματολόγος')");
             mysqli_query($link, "INSERT INTO profession (name) VALUES ('Φυσικοθεραπευτής')");
             mysqli_query($link, "INSERT INTO profession (name) VALUES ('Ψυχίατρος')");
             mysqli_query($link, "INSERT INTO profession (name) VALUES ('Ωτορινολαρυγγολόγος')");
             echo "ΔΗΜΙΟΥΡΓΗΘΗΚΕ!<br/>";
        } else {
            echo "Πρόβλημα στη δημιουργία του πίνακα profession: " . $link->error . "<br/>";
        }
    } 

    if(mysqli_query($link,"DESCRIBE login")){
       
	}
    else {
        $sql="CREATE TABLE IF NOT EXISTS login (id INT(100) AUTO_INCREMENT PRIMARY KEY, username VARCHAR(60) NOT NULL, password VARCHAR(60) NOT NULL, user_type VARCHAR(60) NOT NULL)";
        if($link->query($sql)===TRUE){
        echo("Δημιουργήθηκε ο πίνακας login!");
        }
        else{
			echo "Πρόβλημα στη δημιουργία του πίνακα login: ".$link->error."<br/>";
		}
   }

    if(mysqli_query($link,"DESCRIBE  appointment")){
        
     }else{
        // Αν δεν υπάρχει δημιούργησέ τον
        echo "Ο πίνακας appointment δεν υπάρχει... ";
        // Δημιουργία πίνακα food
        $sql = "CREATE TABLE IF NOT EXISTS appointment (id INT(11) AUTO_INCREMENT PRIMARY KEY, date DATETIME,doctor_id INT(11),patient_id INT(11))";
        if ($link->query($sql) === TRUE) {
            echo "ΔΗΜΙΟΥΡΓΗΘΗΚΕ!<br/>";

        } else {
            echo "Πρόβλημα στη δημιουργία του πίνακα appointment: " . $link->error . "<br/>";
        }
   }


    mysqli_close($link);

?>