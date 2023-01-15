<?php
	include("connect.php");

	//if(mysqli_query($link,"DESCRIBE patient")){

	//}
	//else{
		echo "Ο πίνακας patient δεν υπάρχει... ";

		$sql="CREATE TABLE IF NOT EXISTS patient (	id INT(100) AUTO_INCREMENT PRIMARY KEY,	name VARCHAR(60) NOT NULL, password VARCHAR(60) NOT NULL, appointment_id INT(100) NOT NULL, email VARCHAR(100) NOT NULL)";
		if($link->query($sql)===TRUE){
			echo "ΔΗΜΙΟΥΡΓΗΘΗΚΕ!<br/>";
		}
		else{
			echo "Πρόβλημα στη δημιουργία του πίνακα data: ".$link->error."<br/>";
		}
	//}
   
  //if(mysqli_query($link,"DESCRIBE doctor  ")){

	//}
	//else{
		echo "Ο πίνακας doctor δεν υπάρχει... ";

		$sql="CREATE TABLE IF NOT EXISTS doctor (id INT(100) AUTO_INCREMENT PRIMARY KEY, profession_id INT(100) not null,appointment_id INT(100) not null, doctor_name VARCHAR(60) NOT NULL, password VARCHAR(60) NOT NULL, city VARCHAR(60) NOT NULL, adress VARCHAR(100) NOT NULL, tel VARCHAR(30) NOT NULL )";
		if($link->query($sql)===TRUE){
             mysqli_query($link, "INSERT INTO doctor (profession_id, doctor_name, password, city, adress, tel) VALUES (2, 'Φαίδων Παλαιολής', 12345, 'Αθήνα', 'Λεωφόρος Αναγνώστου, 415, 22007', '21 1072 3580')");
             mysqli_query($link, "INSERT INTO doctor (profession_id, doctor_name, password, city, adress, tel) VALUES (3, 'Απόστολος Τσουκαλάς', 12345, 'Θεσσαλονίκη', 'Λεωφόρος Αναγνώστου, 41-63, 923 18, Νεάπολη-Συκιές', '21 7700 7311')");
             mysqli_query($link, "INSERT INTO doctor (profession_id, doctor_name, password, city, adress, tel) VALUES (4, 'Γεώργιος Μανιάκης', 12345, 'Αγρίνιο', 'Όδος Κωνσταντινίδου, 073-808, 262 31, Ανώγεια', '21 0418 8264')");
             mysqli_query($link, "INSERT INTO doctor (profession_id, doctor_name, password, city, adress, tel) VALUES (5, 'Ελευθέριος Καντζιλιέρης', 12345, 'Πάτρα', 'Λεωφόρος Γούσιος, 848, 781 16, Πάτρα', '21 2788 5257')");
             mysqli_query($link, "INSERT INTO doctor (profession_id, doctor_name, password, city, adress, tel) VALUES (6, 'Σταμάτιος Γιωτόπουλος ', 12345, 'Αθήνα', 'Λεωφόρος Ανυφαντή, 5-2, 482 92, Παρασκευή', '21 0321 3293')");
             mysqli_query($link, "INSERT INTO doctor (profession_id, doctor_name, password, city, adress, tel) VALUES (7, 'Ιάκωβος Μαυρογένης', 12345, 'Πάτρα', 'Όδος Σακελλαρίου, 443, 253 35, Πάτρα', '21 5855 7463')");
             mysqli_query($link, "INSERT INTO doctor (profession_id, doctor_name, password, city, adress, tel) VALUES (8, 'Στέργιος Μεταξάς ', 12345, 'Αθήνα', 'Όδος Ρούσσος, 5-3, 219 06, Κερατσίνι-Δραπετσώνα', '21 1072 3458')");
             mysqli_query($link, "INSERT INTO doctor (profession_id, doctor_name, password, city, adress, tel) VALUES (9, 'Ιορδάνης Μαυρίδης ', 12345, 'Θεσσαλονίκη', 'Λεωφόρος Δελής, 949, 15990, Αμπελόκηποι-Μενεμένη', '21 1080 3560')");
             mysqli_query($link, "INSERT INTO doctor (profession_id, doctor_name, password, city, adress, tel) VALUES (10, 'Άγγελος Γεννηματάς', 12345, 'Αθήνα', 'Όδος Κολιάτσος, 673, 58275, Γαύδος', '21 7284 3884')");
             mysqli_query($link, "INSERT INTO doctor (profession_id, doctor_name, password, city, adress, tel) VALUES (11, 'Παρθένα Γούναρη', 12345, 'Αθήνα', 'Λεωφόρος Παπαγεωργίου, 7-1, 50429, Γαύδος', '21 0384 7884')");
             mysqli_query($link, "INSERT INTO doctor (profession_id, doctor_name, password, city, adress, tel) VALUES (12, 'Ιωάννα Μεταξά ', 12345, 'Θεσσαλονίκη', 'Λεωφόρος Αγγελίδης, 6-3, 770 79, Θεσσαλονίκη', '23 1041 0412')");
             mysqli_query($link, "INSERT INTO doctor (profession_id, doctor_name, password, city, adress, tel) VALUES (13, 'Παρθένα Κορακάκη ', 12345, 'Αθήνα', 'Όδος Γαλάνη, 159-357, 775 56, Μαρούσι', '21 0421 0235')");
             mysqli_query($link, "INSERT INTO doctor (profession_id, doctor_name, password, city, adress, tel) VALUES (14, 'Ευστάθιος Ιωάννου', 12345, 'Θεσσαλονίκη', 'Λεωφόρος Παπαδάκης, 37, 50632, Καλαμαριά', '23 1105 4810')");
             mysqli_query($link, "INSERT INTO doctor (profession_id, doctor_name, password, city, adress, tel) VALUES (15, 'Αργυρός Χρηστόπουλος', 12345, 'Αθήνα', 'Λεωφόρος Νικολαΐδης, 48-52, 349 49, Νέα Σμύρνης', '21 3412 6713')");
             mysqli_query($link, "INSERT INTO doctor (profession_id, doctor_name, password, city, adress, tel) VALUES (16, 'Παναγιώτα Κονδύλη', 12345, 'Πάτρα', 'Όδος Σκλαβούνος, 2-2, 098 01', '21 3451 5891')");
             mysqli_query($link, "INSERT INTO doctor (profession_id, doctor_name, password, city, adress, tel) VALUES (17, 'Σταμάτιος Παπαγεωργίου', 12345, 'Θεσσαλονίκη', 'Λεωφόρος Κωστόπουλος, 926, 75894, Νεάπολη', '23 1124 2140')");
             mysqli_query($link, "INSERT INTO doctor (profession_id, doctor_name, password, city, adress, tel) VALUES (18, 'Ευφροσύνη Δελή', 12345, 'Ρέθυμνο', 'Όδος Κεδίκογλου, 60-10, 25299, Ρέθυμνο', '21 9128 8215')");
             mysqli_query($link, "INSERT INTO doctor (profession_id, doctor_name, password, city, adress, tel) VALUES (19, 'Βάιος Μάμος ', 12345, 'Αθήνα', Λεωφόρος Ράφτη, 4-7, 052 45, Μαρούσι', '21 0123 0178')");
             mysqli_query($link, "INSERT INTO doctor (profession_id, doctor_name, password, city, adress, tel) VALUES (20, 'Στέργιος Καζάκος', 12345, 'Ξάνθη', 'Όδος Κωνσταντίνου, 61-93, 848 14, Ξάνθη', '241 1239 0718')");
             mysqli_query($link, "INSERT INTO doctor (profession_id, doctor_name, password, city, adress, tel) VALUES (21, 'Βάιος Λαζόπουλος', 12345, 'Χανιά', 'Όδος Θεωδωρίδου, 7-8, 560 78, Πλατανιάς', '24 5123 4891')");
             mysqli_query($link, "INSERT INTO doctor (profession_id, doctor_name, password, city, adress, tel) VALUES (22, 'Ανδρεάς Γιαλαμάς ', 12345, 'Δράμα', 'Όδος Φωτιάδου, 07, 66771, Δράμα', '21 1204 8019')");
             mysqli_query($link, "INSERT INTO doctor (profession_id, doctor_name, password, city, adress, tel) VALUES (23, 'Στεριανή Παπανδρέου', 12345, 'Αθήνα', 'Όδος Παπαδοπούλου, 37, 325 34, Μαρούσι', '21 0891 0812')");
             mysqli_query($link, "INSERT INTO doctor (profession_id, doctor_name, password, city, adress, tel) VALUES (1, 'Γλυκερία Ελευθεριάδη', 12345, 'Αθήνα'. 'Λεωφόρος Βιτάλης, 208-335, 83396, Αιγάλεω', '21 9109 7381')");
             mysqli_query($link, "INSERT INTO doctor (profession_id, doctor_name, password, city, adress, tel) VALUES (2, 'Ελπίδα Αργυράκη', 12345, 'Αθήνα', 'Λεωφόρος Κολιάτσος, 539-790, 34057, Βουλιαγμένη', '21 0192 0128')");
             mysqli_query($link, "INSERT INTO doctor (profession_id, doctor_name, password, city, adress, tel) VALUES (3, 'Ανέστης Λιακόπουλος', 12345, 'Καβάλα', 'Λεωφόρος Γεωγιάδου, 471-833, 427 36, Αγία Βαρβάρα','23 0120 9102')");
             mysqli_query($link, "INSERT INTO doctor (profession_id, doctor_name, password, city, adress, tel) VALUES (4, 'Ελευθέριος Τσουκαλάς ', 12345, 'Αγρίνιο', 'Όδος Γρηγοριάδης, 8, 834 22, Αγρίνιο', '23 9120 2102')");
             mysqli_query($link, "INSERT INTO doctor (profession_id, doctor_name, password, city, adress, tel) VALUES (5, 'Βασίλειος Λεπενιώτης', 12345, 'Αθήνα', 'Λεωφόρος Κόκκινος, 25-41, 07226, Περιστέρι'. '21 0120 0329')");
             mysqli_query($link, "INSERT INTO doctor (profession_id, doctor_name, password, city, adress, tel) VALUES (6, 'Ειρήνη Μπενιζέλου', 12345, 'Θεσσαλονίκη', 'Λεωφόρος Σακελλάρης, 053-704, 316 01, Συκιές', '23 1931 0981')");
             mysqli_query($link, "INSERT INTO doctor (profession_id, doctor_name, password, city, adress, tel) VALUES (7, 'Σωτηρία Γουδή', 12345, 'Αθήνα', 'Όδος Γεωγιάδου, 1, 80816, Ηλιούπολη', '21 0918 2107')");
             mysqli_query($link, "INSERT INTO doctor (profession_id, doctor_name, password, city, adress, tel) VALUES (8, 'Παύλος Μαραγκός ', 12345, 'Αθήνα', 'Λεωφόρος Παναγιωτίδης, 637, 23234, Σαλαμίνα', '21 9201 9281')");
             mysqli_query($link, "INSERT INTO doctor (profession_id, doctor_name, password, city, adress, tel) VALUES (9, 'Στυλιανός Μαρής ', 12345, 'Θεσσαλονίκη', 'Όδος Κωνσταντινίδου, 900, 505 69, Αμπελόκηποι', '23 0291 9201')");
             mysqli_query($link, "INSERT INTO doctor (profession_id, doctor_name, password, city, adress, tel) VALUES (11, 'Γεράσιμος Μαυρίδης', 12345, 'Λακωνία', 'Όδος Ανυφαντή, 9-6, 008 79, Μονεμβασιά', '21 9019 1978')");
             mysqli_query($link, "INSERT INTO doctor (profession_id, doctor_name, password, city, adress, tel) VALUES (1, 'Χαράλαμπος Παπαδόπουλος', 12345, 'Αθήνα', 'Λεωφόρος Ανδρεάδης, 178-818, 18943, Γαλάτσι', '21 0192 8747')");
             mysqli_query($link, "INSERT INTO doctor (profession_id, doctor_name, password, city, adress, tel) VALUES (6, 'Χαράλαμπος Καντζιλιέρης', 12345, 'Καβάλα', .'Λεωφόρος Σταματιάδου, 8, 266 27, Φούρνοι', '21 9210 7491')");
             mysqli_query($link, "INSERT INTO doctor (profession_id, doctor_name, password, city, adress, tel) VALUES (12, 'Νικόλαος Καβαλούρης', 12345, 'Θεσσαλονίκη', 'Όδος Θεωδωρίδης, 3, 02737, Κιλελέρ', ;'23 1290 8481;')");
             mysqli_query($link, "INSERT INTO doctor (profession_id, doctor_name, password, city, adress, tel) VALUES (16, 'Αγλαΐα Βασιλειάδη ', 12345, 'Εύβοια', 'Λεωφόρος Θεοτόκου, 9, 258 87, Χαλκίδα', '24 8291 8962')");
             mysqli_query($link, "INSERT INTO doctor (profession_id, doctor_name, password, city, adress, tel) VALUES (1, 'Ουρανία Παπακωνσταντίνου', 12345, 'Αθήνα', 'Όδος Δημητριάδης, 5, 704 20, Περιστέρι', '21 9129 7471')");
             mysqli_query($link, "INSERT INTO doctor (profession_id, doctor_name, password, city, adress, tel) VALUES (12, 'Άγγελος Λειβαδίτης ', 12345, 'Ξάνθη', 'Όδος Αγγελόπουλος, 9-3, 662 26, Ξάνθη', '23 9198 7319')");
             mysqli_query($link, "INSERT INTO doctor (profession_id, doctor_name, password, city, adress, tel) VALUES (1, 'Παρασκευή Αργυράκη ', 12345, 'Δράμα', 'Λεωφόρος Κοντολέων, 0-4, 53430, Δράμα', '23 8919 7812')");
             mysqli_query($link, "INSERT INTO doctor (profession_id, doctor_name, password, city, adress, tel) VALUES (3, 'Σταυρός Γιαννόπουλος ', 12345, 'Θεσσαλονίκη', 'Όδος Μπόγρη, 384-621, 30367, Καλαμαριά', '23 1294 7461')");
             mysqli_query($link, "INSERT INTO doctor (profession_id, doctor_name, password, city, adress, tel) VALUES (1, 'Σεραφείμ Γερμανός', 12345, 'Πρέβεζα', 'Λεωφόρος Βαριμπόμπη, 919-169, 06390, Πεύκη', '23 0102 9480')");
             mysqli_query($link, "INSERT INTO doctor (profession_id, doctor_name, password, city, adress, tel) VALUES (1, 'Αχιλλέας Λαγός', 12345, 'Θεσσαλονίκη', 'Όδος Παπαστεφάνου, 072-134, 58696, Μύκη', '29 9120 3162')");
             mysqli_query($link, "INSERT INTO doctor (profession_id, doctor_name, password, city, adress, tel) VALUES (17, 'Αδάμ Γιάνναρης', 12345, 'Θεσσαλονίκη', 'Όδος Γεωργίου, 425-660, 659 10, Νέστος', '21 8128 4719')");
             mysqli_query($link, "INSERT INTO doctor (profession_id, doctor_name, password, city, adress, tel) VALUES (20, 'Ουρανία Μαγγίνα', 12345, 'Αλεξανδρούπολη',  'Όδος Κοσμόπουλος, 789-438, 014 61, Ορεστίαδα', '24 1295 1295')");
             mysqli_query($link, "INSERT INTO doctor (profession_id, doctor_name, password, city, adress, tel) VALUES (19, 'Νεκτάριος Μητσοτάκης ', 12345, 'Θεσσαλονίκη', 'Όδος Ανδρέου, 989-978, 21200, Θεσσαλονίκη', '23 9128 1124')");
             mysqli_query($link, "INSERT INTO doctor (profession_id, doctor_name, password, city, adress, tel) VALUES (1, 'Αργυρώ Ανδρέου ', 12345, 'Κέρκυρα', 'Όδος Ευταξίας, 441, 843 06, 21 1072 3580', '29 4919 5123')");
             mysqli_query($link, "INSERT INTO doctor (profession_id, doctor_name, password, city, adress, tel) VALUES (10, 'Αριστείδης Παπαδάκης', 12345, 'Θεσσαλονίκη','Λεωφόρος Ζωγραφός, 328-120, 908 11, Εύοσμος', '23 1299 3123')");
             mysqli_query($link, "INSERT INTO doctor (profession_id, doctor_name, password, city, adress, tel) VALUES (9, 'Νεκτάρια Βιτάλη', 12345, 'Κοζάνη', 'Λεωφόρος Αντωνιάδης, 741-446, 65252, Τζουμέρκα', '23 8121 9128')");
             mysqli_query($link, "INSERT INTO doctor (profession_id, doctor_name, password, city, adress, tel) VALUES (22, 'Έλλη Ανδρέου', 12345, 'Έδεσσα', 'Λεωφόρος Κοκκίνου, 35, 812 14, Αλμωπία', '29 0128 4719')");
             mysqli_query($link, "INSERT INTO doctor (profession_id, doctor_name, password, city, adress, tel) VALUES (20, 'Στυλιανός Λαιμός', 12345, 'Θεσσαλονίκη', 'Όδος Σταματιάδου, 4-0, 56914, Πυλαία-Χορτιάτης', '23 7512 2127')");
             mysqli_query($link, "INSERT INTO doctor (profession_id, doctor_name, password, city, adress, tel) VALUES (8, 'Θεοχάρης Λύτρας', 12345, 'Ηράκλειο', 'Όδος Αλεξίου, 1, 36356, Άγιοι', '21 7129 6218')");
             mysqli_query($link, "INSERT INTO doctor (profession_id, doctor_name, password, city, adress, tel) VALUES (1, 'Χριστίνα Γιαννάκη', 12345, 'Άρτα', 'Λεωφόρος Σπανού, 4, 98116, Άρτα', '23 4128 5612')");
             mysqli_query($link, "INSERT INTO doctor (profession_id, doctor_name, password, city, adress, tel) VALUES (7, 'Αθανάσιος Τσικλητήρας', 12345, 'Κοζάνη', 'Λεωφόρος Σταματιάδου, 2, 194 14, Κοζάνη', '23 9127 6518')");
             mysqli_query($link, "INSERT INTO doctor (profession_id, doctor_name, password, city, adress, tel) VALUES (4, 'Σπυριδούλα Λιάπη', 12345, 'Θεσσαλονίκη', 'Λεωφόρος Σιδέρης, 6-7, 873 59, Κιλελέρ'. '21 8126 9812')");
			}else{
			    echo "Πρόβλημα στη δημιουργία του πίνακα data: ".$link->error."<br/>";
		}
//}
 
   // if(mysqli_query($link,"DESCRIBE  profession ")){
        // Αν υπάρχει μην κάνεις τίποτε
   // }else{
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
   //} 

    
   // if(mysqli_query($link,"DESCRIBE  appointment")){
        
     //}else{
        // Αν δεν υπάρχει δημιούργησέ τον
        echo "Ο πίνακας appointment δεν υπάρχει... ";
        // Δημιουργία πίνακα food
        $sql = "CREATE TABLE IF NOT EXISTS appointment (id INT(11) AUTO_INCREMENT PRIMARY KEY, date DATE ,time TIME(6) ,doctor_id INT(11),patient_id INT(11))";
        if ($link->query($sql) === TRUE) {
            echo "ΔΗΜΙΟΥΡΓΗΘΗΚΕ!<br/>";

        } else {
            echo "Πρόβλημα στη δημιουργία του πίνακα appointment: " . $link->error . "<br/>";
        }
   //}


    mysqli_close($link);

?>