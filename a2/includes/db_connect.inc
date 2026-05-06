<?php

// Check what server you are accessing
if (strstr($_SERVER['SERVER_NAME'], 'localhost')) {

    // LOCAL XAMPP
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "petconnect";
    $port = 3307;

    $conn = new mysqli($servername, $username, $password, $dbname, $port);

} else {

    // TITAN SERVER
    $servername = "talsprddb02.int.its.rmit.edu.au";
    $username = "s4166097";
    
    include("/home/sh7/s4166097/.htdb_pass");
    
    $dbname = "s4166097";

    $conn = new mysqli($servername, $username, $password, $dbname);
}

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>