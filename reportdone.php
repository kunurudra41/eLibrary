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
    else{
        echo 'connnected';
    }

$name=$_POST['username'];
$phone=$_POST['phone'];
$mail=$_POST['user-email'];
$comment=$_POST['comment'];

$query = "INSERT INTO reports (name, phone, email, message) VALUES ('$name', '$phone', '$mail', '$comment')";
if (mysqli_query($conn, $query)){
    header('location:/');
}else{
    echo 'error occurred';
}
?>