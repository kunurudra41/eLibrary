<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/explore.css">
    <link rel="icon" href="https://cdn-icons-png.flaticon.com/512/616/616616.png" title="explore">
    <title>Explore</title>
</head>
<body>
  <button onclick="topFunction()" id="myBtn" title="Go to top"><img class="top" src="https://cdn.iconscout.com/icon/free/png-256/free-up-arrow-1767496-1502504.png"></button>

<center>
<header>
<a class="backlink" href="userpage"><b> &#8592; Back</b></a>
<p>#Explore</p>
</header>
</center>

<section><center>
<?php 
session_start();
if (!isset($_SESSION['user_name'])) {
   header('location:/');
} 
    $name=$_SESSION['user_name'];

$host = 'sql109.infinityfree.com';
$username = 'if0_36313886';
$password = 'guzQVtX3fVuI';
$database = 'if0_36313886_Admin';

    $conn = new mysqli($host, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $query = "SELECT * FROM books order by Slno DESC";
$result = $conn->query($query);

     if ($result->num_rows > 0) {
         while ($row = $result->fetch_assoc()){
    $booklink=$row['booklink'];
$bookcover=$row['bookcover'];  
$bookname=$row['name'];
$bookauthor=$row['author'];
$bookslno=$row['Slno'];  

      echo ' <div class="ebooks">
                       <img class="bookthumbnail" src="'.$bookcover.'" alt="" >
              <div class="bookbody">
              <i title="Sl no." class="slno">'.$bookslno.'</i><br>
            <b style="font-size:6vmin;">'.$bookname.'</b><br>
            <i style="font-size:2.5vmin;"> '.$bookauthor.'</i><br>
            <p class="bookabout">'.($row['about']).'</p>
            <a href="'.$booklink.'"
              style="text-decoration: none; color: rgb(0, 0, 0);" target="blank" download><button class="bookbutton">Download</button></a>
              <form action="read_later.php" method="post"><button type="submit" class="bookbutton" name="bookname" value="'.$bookname.'">Read later</button></form></div>
          </div> ';
     } }
     else
     {
         echo 'error occurred';
     }
     ?>
     </center>
</section>

</content>
<script type=text/javascript src="js/explore.js"></script>
</body>
</html>
