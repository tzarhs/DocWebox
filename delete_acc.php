<?php
session_start();
include('connect.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style2.css">
    <title>Delete Account</title>
</head>

<body>
    <div id="contentbox" >
    <script type="text/javascript">

        function countdown() {
            var i = document.getElementById('timecount');
            if (parseInt(i.innerHTML)<=1) {
                location.href = 'index.php';
            }
            i.innerHTML = parseInt(i.innerHTML)-1;
        }   

    setInterval(function(){ countdown(); },1000);
    </script>

    <?php
    $username=$_SESSION['username'];

    $sql1="SELECT * FROM doctor WHERE doctor_name= '$username'";
    $result1=mysqli_query($link, $sql1);

    $sql2="SELECT * FROM patient WHERE name = '$username'";
    $result2=mysqli_query($link, $sql2);


    if(mysqli_num_rows($result1) == 1) {
    ?>
        <br><b>
    <?php
        $sql3="DELETE FROM doctor WHERE doctor_name= '$username'";
        $result3=mysqli_query($link, $sql3);

        echo " <div align='center'>";
        echo "Your Doctor Account Deleted Sucessfully.";
        echo " <a href='index.php' >Click here</a> to go back. ";
        echo "</div> ";
    }elseif(mysqli_num_rows($result2) == 1) {
        ?>
        <br><b>
    <?php
        $sql4="DELETE FROM doctor WHERE doctor_name= '$username'";
        $result4=mysqli_query($link, $sql4);

        echo " <div align='center'>";
        echo "Your Patient Account Deleted Sucessfully.";
        echo " <a href='index.php' >Click here</a> to go back. ";
        echo "</div> ";
    }elseif(!isset($username) || $username==NULL) {
        header("Location: index.php");
    }else {
        echo "Unable to delete Your Account ";
    
    }
    ?>
        </b>
</div>
</body>
</html>
</div>