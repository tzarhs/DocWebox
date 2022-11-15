<?php
	include('connect.php');



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


	mysqli_close($link);
?>