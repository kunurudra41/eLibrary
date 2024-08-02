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
    if (!isset($_SESSION['user_name'])) {
   header('location:/');
}
    $name=$_SESSION['user_name'];
$booksl=$_POST['booksl'];

$query = "DELETE FROM read_later
WHERE booksl = '$booksl';
";
$result = $conn->query($query);
if ($result===false){
    echo 'error occurred';
}else{
    $_SESSION['msg']="Book removed successfully";
    header('location:https://elib.rf.gd/userpage');
}

?>