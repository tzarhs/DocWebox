<?php
    include("connect.php");

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
    

    if(mysqli_query($link,"DESCRIBE login")){
        //Ο πίνακας υπάρχει ήδη
	}
    else {
        $sql="CREATE TABLE IF NOT EXISTS login(id INT(100) AUTO_INCREMENT PRIMARY KEY, username VARCHAR(60) NOT NULL, password VARCHAR(60) NOT NULL, user_type VARCHAR(60) NOT NULL";
        if($link->query($sql)===TRUE){
        echo("Δημιουργήθηκε ο πίνακας login!");
        }
        else{
			echo "Πρόβλημα στη δημιουργία του πίνακα login: ".$link->error."<br/>";
		}
    }
    mysqli_close($link);
?>