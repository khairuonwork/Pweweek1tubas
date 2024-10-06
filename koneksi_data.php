<?php
    $hostname = 'localhost';
    $database = 'db_ajax';
    $username = 'root';
    $password = '';

    // Corrected mysqli_connect() usage
    $mysqli = mysqli_connect($hostname, $username, $password, $database);

    // Check if the connection was successful
    if (!$mysqli) {
        die("Connection failed: " . mysqli_connect_error());
    } else {
        echo ""; 
        
    }
?>
