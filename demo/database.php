<?php
// Establish database connection
$host = '2l5.h.filess.io';
$username = 'elibio_gatherword';
$password = '8ca57c4b3a95e5f1646e0718260917e0fcce1e5b';
$database = 'elibio_gatherword';


$conn = new mysqli($host, $username, $password, $database, 3307);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}else{
    echo "Connected successfully!";
}
?>
