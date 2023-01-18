<?php
    include("connect.php");
    $q = isset($_GET['q']) ? $_GET['q'] : '';
    $sql = "SELECT DISTINCT city FROM doctor WHERE city LIKE '%$q%'";
    $result = mysqli_query($link, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<div>' . $row['city'] . '</div>';
        }
    }
    else{
        echo "No results found.";
    }
?>

