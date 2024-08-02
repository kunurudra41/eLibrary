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
    $name=$_SESSION['user_name'];
    $bookname=$_POST['name'];
    $author=$_POST['author'];
    $year=$_POST['year'];
    $currentDate = date('Y-m-d');

    $sql="insert into bookrequest(book_name,author,publish_year,user,date) values ('$bookname','$author','$year','$name','$currentDate')";
if (mysqli_query($conn, $sql)) {
         session_start();
          $_SESSION['msg']="Book requested successfully";
header("Location:userpage");
}else{
    echo 'error occurred';
}
?>