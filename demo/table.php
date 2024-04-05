<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adminlogin Table</title>
</head>
<body>
    <h1>Adminlogin Table</h1>
    <table border="1">
        <?php
        include("database.php");
        $query = "SELECT * FROM Adminlogin";
 $result = $conn->query($query);

 if ($result->num_rows > 0) {
     echo "<table border='1'>
             <tr>
                 <th>ID</th>
                 <th>Username</th>
                 <th>Password</th>
             </tr>";

     while ($row = $result->fetch_assoc()) {
         echo "<tr>
                 <td>{$row['id']}</td>
                 <td>{$row['username']}</td>
                 <td>{$row['password']}</td>
               </tr>";
     }
     echo "</table>";
 } else {
     echo "No records found.";
 }
 $conn->close();
  ?>

    </table>
</body>
</html>
