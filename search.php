<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Search result</title>
<link rel="icon" href="https://cdn-icons-png.freepik.com/512/8437/8437973.png" title="search">
<link rel="stylesheet" href="css/search.css">
</head>

<body>
<center><b style="font-size:6.3vmin;">e-Library</b><br>
<i>A virtualspace for readers</i></center>
<center>
<form action="search.php" method="GET">
            <div id="searchbox">
            <a class="backlink" href="index.php"><b> &#8592; Back</b></a>
              <input name="searchhere" aria-label="search for books" autocomplete="off" inputmode="search"
                placeholder="  Book Name, Author, SLno" type="search" />
              <button type="Submit" class="btn btn-success">Search
              </button>
            </div></form>
<?php 
session_start();
    $host = 'sql109.infinityfree.com';
$username = 'if0_36313886';
$password = 'guzQVtX3fVuI';
$database = 'if0_36313886_Admin';

    $conn = new mysqli($host, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
$searchQuery = $_GET['searchhere'];

    $query = "SELECT * FROM books WHERE name='$searchQuery'  OR Slno='$searchQuery' OR author='$searchQuery'";
    $result = $conn->query($query);
     if ($result->num_rows > 0) {
          $rowCount = mysqli_num_rows($result);
          echo '<h4><i>" Total '.$rowCount. ' results found. "</i></h4>';
     while ($row = $result->fetch_assoc()) {

if ((isset($_SESSION['admin_username'])) || (isset($_SESSION['user_name']))) {
$booklink=$row['booklink'];
$bookcover=$row['bookcover'];  
$bookname=$row['name'];
$bookauthor=$row['author'];
$bookslno=$row['Slno'];  
}
    else
    {
$booklink='login.html';
$bookcover=$row['bookcover'];
$bookname=$row['name'];
$bookauthor=$row['author'];
$bookslno=$row['Slno']; 
    }
         echo ' <div class="ebooks">
                       <img class="bookthumbnail" src="'.$bookcover.'" alt="" >
              <div class="bookbody">
              <i title="Sl no." class="slno">'.$bookslno.'</i><br>
            <b style="font-size:6vmin;">'.$bookname.'</b><br>
            <i style="font-size:2.5vmin;"> '.$bookauthor.'</i><br>
            <p class="bookabout">'.($row['about']).'</p>
            <a href="'.$booklink.'"
              style="text-decoration: none; color: rgb(0, 0, 0);"><button class="bookbutton">Download</button></a>
              <form action="read_later.php" method="post"><button type="submit" class="bookbutton" name="bookname" value="'.$bookname.'">Read later</button></form></div>
          </div> ';
     }   
     }
     else{
         echo '<div class="notfound">
         <center>
                <img class="request" src="https://i.pinimg.com/originals/28/25/64/2825644cf426d71e7618523e5594ec68.gif">
                <div class="request-body" style="font-size: 2.7vmin;"><b style="font-size: 7vmin;">Not available !</b><br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; We could not find your book, but there is no need to worry. Simply submit a request on our website, and our team will promptly add it to our library. Soon, it will be available for you to enjoy.
                    <br><br>
                    <center><a class="view-request" href="https://forms.gle/nVDKtZbSgJhogk6p6">Request</a></center></div>';
     }
?>
</center>
</body>
</html>