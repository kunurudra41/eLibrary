<?php

 $host = 'sql109.infinityfree.com';
$username = 'if0_36313886';
$password = 'guzQVtX3fVuI';
$database = 'if0_36313886_Admin';

    $conn = new mysqli($host, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    session_start();
    if (!isset($_SESSION['admin_username'])) {
   header('location:/');
}
$COUNT=$_POST['reject'];

$query = "UPDATE bookrequest SET status = 'Request rejected' WHERE COUNT = '$COUNT'";
$result = $conn->query($query);
if ($result===false){
    echo 'error occurred';
}else{
    $_SESSION['msg']="Request rejected";
    header('location:https://elib.rf.gd/admin_dashboard');
}


?>