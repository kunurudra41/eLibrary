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
    $currentpassword=$_POST["password"];
    $new=$_POST["newpassword"];
    $confirm=$_POST["new_password"];

$query = "SELECT * FROM user_login WHERE name = '$name' AND password = '$currentpassword'";
$result = $conn->query($query);
if ($result->num_rows > 0) {
       if($new==$confirm){
       $query = "UPDATE user_login SET password='$confirm' WHERE name='$name'";
       $result = $conn->query($query);
               $_SESSION['msg']='Password changed successfully';
       }
       else{
        echo 'passwords does not match.';
               $_SESSION['msg']='passwords does not match.';
       }
       }
else
{
    echo 'invalid current password.';
                   $_SESSION['msg']='invalid current password.';
}
header('location:userpage');
?>