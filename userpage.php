<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/userpage1.css">
      <link rel="icon" href="https://cdn.iconscout.com/icon/free/png-256/free-user-1648810-1401302.png" title="user">
    <title>User panel</title>
</head>

<body>
<?php
session_start();
include('operation/time_out.php');

if (!isset($_SESSION['user_name'])) {
   header('location:login');
} 
    $name=$_SESSION['user_name'];
 ?>
 <div class=main-body>
 <div class="notification">
<?php session_start();
 echo $_SESSION['msg'];
 $_SESSION['msg']="";
  ?>
 </div>
    <div class=main-body>
        <center>
            <div class="profile">
                <center>
                    <img class="profilepic" src="https://cdn-icons-png.flaticon.com/512/5987/5987424.png" alt="">
                    <p class="username"><?php echo $name; ?></p>
                   <section class="option">
                        <a href="request">Request</a>
                        <a href="https://forms.gle/K7dTuhwY8aFXZ1ZZ7">Submission</a>
                        <a href="logout">Sign out</a>
                    </section>
                </center>
            </div>
            <div class="userbody">
                <header>Welcome to Dashboard</header>
                <section>
                    <center>
                        <a href="/"><div class="cards">
                            <p class="card-top">Home</p>
                            <p class="card-body">Search book & articles, FAQs</p>
                        </div></a>
                        <a href="explore"><div class="cards">
                            <p class="card-top">Explore</p>
                            <p class="card-body">Explore the available books in library</p>
                        </div></a>
                        <div class="cards1">
                            <p class="card-top">Read later</p>
                            <p class="card-body">View your bookmarks</p>
                        </div>
                        <div class="expand1"><ol>
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
        $query = "SELECT * FROM read_later WHERE name='$name'";
$result = $conn->query($query);

     if ($result->num_rows > 0) {
         while ($row = $result->fetch_assoc()){
             $book=$row['book'];
            $booksl=$row['booksl'];
             $query = "SELECT booklink FROM books WHERE name='$book'";
             $result1 = $conn->query($query);
            $row1 = $result1->fetch_assoc();
             $link=$row1['booklink'];
             
             echo '<li><a class="readlater" href="'.$link.'">'.$book.'</a><br> <form action="operation/remove_from_read_later" method="post"><button class="remove" type="submit" name="booksl" value="'.$booksl.'">Remove</button></form></li><br>';

         }
     }
                        ?></ol>
                            </div>
                            <div id="openPopup" class="cards">
                            <p class="card-top">My Requests</p>
                            <p class="card-body">View your requests for books.</p>
                        </div>
                        <div id="overlay" class="hidden"></div>
                          <div id="popup" class="hidden">
        <span id="closePopup">&times;</span><br>
        <ol><?php
    $query ="SELECT * FROM bookrequest WHERE user='$name' ORDER BY date DESC";
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()){
        $book=$row["book_name"];
        $author = $row["author"];
        $pubyear=$row["publish_year"];
        $user=$row["user"];
        $date=$row["date"];
        $status=$row["status"];
        echo '<li><p><b style="font-size:5vmin;">'.$book.'</b><br>by '.$author.', '.$pubyear.'<br>Requested on '.$date.'<br><i style="opacity:0.5;">'.$status.'</i></p><br></li>';
    }
    }
 ?></ol>
      </div>
                        <div class="cards1">
                            <p class="card-top">Security</p>
                            <p class="card-body">Change your password</p>
                        </div>
                        <div class="expand">
                            <form id="passwordchange" action="changepassword" method="post">
                            <label>Current password</label><br>
                            <input class="entry" name="password" type="text" required><br><br>
                            <label>New password</label><br>
                            <input class="entry" name="newpassword" type="text" required><br><br>
                            <label>Confirm new password</label><br>
                            <input class="entry" name="new_password" type="text" required><br><br>
                            <button class="sub" type="button" onclick="formsubmit()">Change</button>
                        </form>
                            </div>

                        <a href="report"><div class="cards">
                            <p class="card-top">Report a problem</p>
                            <p class="card-body">Reach out our support team.</p>
                        </div></a>
                    </center>
                </section>
            </div>
        </center>
    </div>
    <script type="text/javascript" src="js/userpage.js"></script>
</body>

</html>