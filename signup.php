<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <title>Signup-status</title>
</head>
<body>
<?php
$enteredUsername = $_POST["username"];
$enteredemail = $_POST["email"];
$enteredPassword = $_POST["password"];

     $host = 'sql109.infinityfree.com';
     $username = 'if0_36313886';
     $password = 'guzQVtX3fVuI';
     $database = 'if0_36313886_Admin';

     $conn = mysqli_connect($host, $username, $password, $database);

     if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
     }

     $query = "SELECT * FROM user_login WHERE name= '$enteredUsername'";
     $result = $conn->query($query);

     if ($result->num_rows > 0) {
     $signup='CreateAccount';
         $url='https://cdn1.iconfinder.com/data/icons/client-management/512/warning-512.png';
    $imageData = base64_encode(file_get_contents($url));
     echo '<div class="caution"><center>
    <img src="data:image/gif;base64,' . $imageData . '" alt="confirmed"/>
    <p>Username has been already used !<br><b><a href="'.$signup.'">Try again here</a></b></p></center>
     </div>';
     }

     else {

    $sql = "INSERT INTO user_login (name, email, password) VALUES ('$enteredUsername', '$enteredemail', '$enteredPassword')";

     if (mysqli_query($conn, $sql)) {
     $loginurl='login';
    $url='https://cliply.co/wp-content/uploads/2021/03/372103860_CHECK_MARK_400px.gif';
    $imageData = base64_encode(file_get_contents($url));
    echo '<div class="caution"><center>
    <img src="data:image/gif;base64,' . $imageData . '" alt="confirmed"/>
    <p>Account Created Successfully !<br><b><a href="'.$loginurl.'">Login here</a></b></p></center>
     </div>';
     } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
     }
     
     }
     mysqli_close($conn);
     ?>
     </body>
     </html>