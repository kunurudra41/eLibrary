<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="icon" href="https://cdn-icons-png.flaticon.com/512/3237/3237447.png" title="books icons">
    <title>login-status</title>
    <style>
        img{
            aspect-ratio: 2/2;
            width: 40vmin;
            object-fit: cover;
            object-position: center;
        }
.caution{
    font-size: 3vmin;
    margin-top: 15vh;
    font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
}
a{
    text-decoration: none;
}
 a:hover {
    opacity: 0.5;
  }
p{
    margin-top: -2vh;
}
    </style>
</head>
<body>
<?php
// Database configuration
// $host = '2l5.h.filess.io';
// $username = 'elibio_gatherword';
// $password = '8ca57c4b3a95e5f1646e0718260917e0fcce1e5b';
// $database = 'elibio_gatherword';

$host = 'sql109.infinityfree.com';
$username = 'if0_36313886';
$password = 'guzQVtX3fVuI';
$database = 'if0_36313886_Admin';


// Create a connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// User input (replace with actual form input)
$mail = $_POST["mail"];
$enteredPassword = $_POST["password"];

// Check if credentials match
$query = "SELECT * FROM user_login WHERE email = '$mail' AND password = '$enteredPassword'";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    session_start();
            $row = $result->fetch_assoc();
    $_SESSION['user_name']= $row['name'];
        header("Location:userpage");
} else {
    $loginurl='login';
    $url='https://media3.giphy.com/media/Pm9ld1ynrkAiObjqSu/giphy.gif';
    $imageData = base64_encode(file_get_contents($url));
    echo '<div class="caution"><center>
    <img src="data:image/gif;base64,' . $imageData . '" alt="invalid inputs"/>
    <p>Invalid Credentials, Please try again !<br><b><a href="'.$loginurl.'">click here</a></b></p></center>
</div>';
}
// Close the connection
$conn->close();
?>
</body>
</html>
