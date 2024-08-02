<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/admin.css">
    
      <link rel="icon" href="https://www.iconpacks.net/icons/1/free-user-group-icon-296-thumb.png" title="admin">
    <title>Admin Panel</title>
 <style>


    </style>
</head>

<body>
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

include('operation/time_out.php');

if (!isset($_SESSION['admin_username'])) {
   header('location:/');
} 

$enteredusername = $_SESSION['admin_username'];
    $query = "SELECT name, username from adminlogin WHERE username= '$enteredusername'";
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $name = $row["name"];
        $userna =$row["username"];
    }
    $query = "SELECT COUNT(*) FROM books";
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $bookcount = $row["COUNT(*)"];
    }
    $query = "SELECT COUNT(*) FROM user_login";
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $usercount = $row["COUNT(*)"];
    }
    $query ="SELECT * FROM books ORDER BY count DESC LIMIT 1";
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $slno=$row["Slno"];
        $entryby = $row["entry_by"];
    }

    ?>
 <div class="notification">
<?php session_start();
 echo $_SESSION['msg'];
 $_SESSION['msg']="";
  ?>
 </div>
    <nav id="nav">
        <div class="sidebar-header">
            <a class="logo-wrapper">
                <img src="https://cdn-icons-png.freepik.com/512/10089/10089764.png" alt="Logo">
                <h2 class="hidden">eLibrary</h2>
            </a>
            <button class="toggle-btn">
                <img src="https://cdn-icons-png.flaticon.com/512/32/32213.png" alt="expand button">
            </button>
        </div>


        <div class="sidebar-links">
            <a class="link" href="/">
                <img src="https://cdn-icons-png.flaticon.com/512/25/25694.png" alt="">
                <span class="hidden">Home</span>
            </a>
            <a class="link" href="#overview">
                <img src="https://cdn-icons-png.flaticon.com/512/3137/3137672.png" alt="">
                <span class="hidden">Overview</span>
            </a>
            <a class="link" href="#books">
                <img src="https://www.iconpacks.net/icons/2/free-opened-book-icon-3163-thumb.png" alt="">
                <span class="hidden">Books</span>
            </a>
            <a class="link" href="#feed">
                <img src="https://cdn-icons-png.freepik.com/512/5471/5471074.png" alt="">
                <span class="hidden">Reports</span>
            </a>
            <a class="link">
                <img src="https://cdn-icons-png.flaticon.com/512/281/281743.png" alt="">
                <span class="hidden">Docs</span>
            </a>
        </div>


        <div class="sidebar-bottom">
            <div class="sidebar-links">
                <a class="link" href="logout">
                    <img src="https://cdn-icons-png.flaticon.com/512/25/25376.png" alt="">
                    <span class="hidden">Sign out</span>
                </a>
            </div>

            <div class="user-profile">
                <div class="user-avatar">
                    <img src="https://cdn-icons-png.flaticon.com/512/61/61205.png" alt="">
                </div>
                <div class="user-details hidden">
                    <p class="username"><?php echo $userna; ?></p>
                    <p class="user-email"><?php echo $name; ?></p>
                </div>
            </div>
        </div>
    </nav>
    <content>
        <header id="overview">
            <center>
             <img class="request" src="https://geowealth.com/wp-content/uploads/2023/05/2023-04-White-labeled-Desktop-gif.gif">
                <p class="head">Welcome to the Dashboard, <b><?php echo $name; ?></b></p>
            </center>
        </header>
        <section><div><center>
<a href="#table"><div class="cards"><b class="card-top"> <?php echo $bookcount; ?> </b><p class="cardbody">total books on server</p></div></a>
<div id="openPopup" class="cards"><b class="card-top"> <?php echo $usercount; ?> </b><p class="cardbody">total user registered</p></div>
<div id="overlay" class="hidden"></div>

    <div id="popup" class="hidden">
        <span id="closePopup">&times;</span><br><center>
<?php 
    $query = "SELECT * FROM user_login";
    $result = $conn->query($query);
    $var=1;
     if ($result->num_rows > 0) {
     echo "<table class='userdata'>
             <tr>
                 <th>No</th>
                 <th>Username</th>
                 <th>Email</th>
                 <th>Terminate</th>
             </tr>";

     while ($row = $result->fetch_assoc()) {
         echo "<tr>
                 <td>".$var."</td>
                 <td>{$row['name']}</td>
                 <td>{$row['email']}</td>
                 <td> <form action='operation/delete_user.php' method='post'><button class='delete' type='submit' name='user' value=".$row['count']."> Delete </button></form> </td>
               </tr>";
               $var=$var+1;
     }
     echo "</table>";
 } else {
     echo "No records found.";
 }
?> <center>   </div>
<div class="cards" id="req-expand"><b class="card-top"><img src="https://lordicon.com/icons/wired/lineal/193-bell-notification.gif" id="reqst"> </b><p class="cardbody" style="margin-top:-5%;">Pending Requests</p></div>
</center></div>

<div id="expand">
<center>
<h1 style="font-size:6vmin;">REQUESTS FROM USERS</h1>
<div id="userrequest" class="user-request" >
<ol><?php
    $query ="SELECT * FROM bookrequest WHERE status = 'Queued' ORDER BY count";
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()){
        $book=$row["book_name"];
        $author = $row["author"];
        $pubyear=$row["publish_year"];
        $user=$row["user"];
        $date=$row["date"];
        $count=$row["COUNT"];
        echo '<li><p><b style="font-size:5vmin;">'.$book.'</b><br>by '.$author.', '.$pubyear.'<br><i style="opacity:0.5;">Requested by '.$user.' on '.$date.'</i></p>
        <form class="btn" action="operation/request_added.php" method="post"><button class="accept" type="submit" name="accept" value="'.$count.'"> Added </button></form>
        <form class="btn" action="operation/request_rejected.php" method="post"><button class="reject" type="submit" name="reject" value="'.$count.'"> Reject </button></form>
        </li><br>';
    }
    }
 ?></ol>
</div>
</center>
</div>

        </section>

         <section id="books">
            <center>
                <form id="bookentryform" class="bookentry" action="bookentry.php" method="post">
                    <center><b>Last entry: </b><i><?php echo $slno ?> by <?php echo $entryby ?></i><br><br></center>
                    <label for="bookname">Title&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </label><input class="inputspace" id="bookname" name="booksname" type="text" required><br>
                    <label for="author">Author&nbsp;&nbsp;
                    </label><input class="inputspace" id="author" name="authorname" type="text" required><br>
                    <label for="coverimage">Cover&nbsp;&nbsp;&nbsp;
                    </label><input class="inputspace" id="coverimage" name="coverlink" type="text" required><br>
                    <label for="booklink">link&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </label><input class="inputspace" id="booklink" name="booklink" type="text" required><br>
                    <label for="slno">Sl. no&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </label><input class="inputspace" id="slno" name="bookslno" type="text" required><br>
                    <label for="desc">About&nbsp;&nbsp;&nbsp;&nbsp;
                    </label><input class="inputspace" id="desc" name="Description" type="text" required><br>
                    <br>
                    <center><button id="booksubmit" type="button" onClick="formsubmit()">Submit</button></center>
                </form>
                <div class="request-body" style="font-size: 2.7vmin;"><b style="font-size: 7vmin;">Add books</b>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Administrators have the authority to enhance the library by adding books based on user requests or to expand the collection. Additionally, they are responsible for reviewing and approving submissions from readers. To add a book, complete the form by providing the following attributes: book title, author, serial number (slno), cover link and the others as required.
                    <br><br><b style="color: red;">NOTE: To prevent any future inconvenience, please ensure accurate information is provided.</b></p>
                    <div class="cards2">
                        <a href="https://docs.google.com/forms/d/1NdxyeU1ryhhBbJUQgp6wEM66dDInFW6QZzqW8zVGLeE/edit#responses">
                        <div class="card2body"><b class="card2-top">User Submisssions</b>
                            <img class="cardimg" src="https://static.thenounproject.com/png/1053750-200.png" alt="">
                        </div></a>
                    </div>
                </div>

            </center>
        </section>
        
<section id="table"><center>
            <div class="table">
                <h1>Available books</h1>
<?php 
    $query = "SELECT * FROM books";
    $result = $conn->query($query);
     if ($result->num_rows > 0) {
     echo "<table>
             <tr>
                 <th>Sl. no</th>
                 <th>Title</th>
                 <th>Author</th>
                 <th>Remove</th>
             </tr>";

     while ($row = $result->fetch_assoc()) {
         echo "<tr>
                 <td>{$row['Slno']}</td>
                 <td>{$row['name']}</td>
                 <td>{$row['author']}</td>
                 <td>
                 
                 <form action='operation/delete_book.php' method='post'><button class='delete' type='submit' name='count' value=".$row['count']."> Delete </button></form>

                 </td>
               </tr>";
     }
     echo "</table>";
 } else {
     echo "No records found.";
 }
?></div>
        </center>
</section>

<section id="report">
<center>

<h1 style="font-size:6vmin;">FEEDBACK FROM USERS</h1>
<div id="feed" class="report">
<div>
<?php
    $query ="SELECT * FROM reports ORDER BY counts DESC";
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()){
        $reporter=$row["name"];
        $report = $row["message"];
        echo '<h3>'.$reporter.':</h3><p>'.$report.'</p><br>';
    }
    }
 ?>
</div>
</div>

</center>
</section>
    </content>
    <script type="text/javascript" src="js/admin.js"></script>
</body>

</html>