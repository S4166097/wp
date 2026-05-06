<?php

// LOCAL XAMPP
if ($_SERVER['HTTP_HOST'] == 'localhost') {

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "petconnect";
    $port = 3307;

} else {

    // TITAN SERVER
    $servername = "localhost";
    $username = "s4166097";
    $password = "nocTo2-civwoh-fepdef";
    $dbname = "s4166097";
    $port = 3306
}

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>