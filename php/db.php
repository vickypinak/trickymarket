<?php
//DB connection

    $servername = "46.17.172.103";
    $username = "u645511434_DBA_user";
    $password = "DBATest@1234";
    $dbname = "u645511434_trickymarketDB";

    // Create connection

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        header("Location: https://trickymarket.in"); 
    } else {
        // echo "DB connected";
    }
?>