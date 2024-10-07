<?php
    $hostname = 'localhost';
    $database = 'db_ajax';
    $username = 'root';
    $password = '';

    $mysqli = mysqli_connect($hostname, $username, $password, $database);

    if (!$mysqli) {
        die("Connection failed: " . mysqli_connect_error());
    } else {
        echo ""; 
        
    }
?>
