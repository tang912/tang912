<?php

    $db_server = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_database = "skilltest_db";

    $conn = new mysqli($db_server, $db_user, $db_pass, $db_database);

    if($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
    }

?>