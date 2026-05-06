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
    $servername = "127.0.0.1";
    $username = "s4166097";
    $password = "nocTo2-civwoh-fepdef";
    $dbname = "s4166097";
}

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname,);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>