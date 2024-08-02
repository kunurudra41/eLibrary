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
                    $bookname = $_POST["booksname"];
                    $author = $_POST["authorname"];
                    $cover = $_POST["coverlink"];
                    $bookslink = $_POST["booklink"];
                    $booksl = $_POST["bookslno"];
                    $about=$_POST["Description"];

$enteredusername = $_SESSION['admin_username'];
    $query = "SELECT name from adminlogin WHERE username= '$enteredusername'";
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $name = $row["name"];
    }
    $sql = "INSERT INTO books (Slno, name, author, bookcover, booklink, entry_by, about) VALUES ('$booksl', '$bookname', '$author', '$cover', '$bookslink', '$name', '$about')";
     if (mysqli_query($conn, $sql)) {
         session_start();
          $_SESSION['msg']="Book added successfully";
header("Location:admin_dashboard");
}else{
    echo 'error occurred';
}
?>