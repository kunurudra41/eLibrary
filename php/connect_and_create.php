<?php
// Establish database connection
$host = '2l5.h.filess.io';
$username = 'elibio_gatherword';
$password = '8ca57c4b3a95e5f1646e0718260917e0fcce1e5b';
$database = 'elibio_gatherword';


$conn = new mysqli($host, $username, $password, $database, 3307);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully!";


//Creation of admin data table
// $createTableQuery = "
// CREATE TABLE Adminlogin (
//            id INT AUTO_INCREMENT,
//            username VARCHAR(255),
//            password VARCHAR(255),
//      PRIMARY KEY(id,username)
//      )";
// if ($conn->query($createTableQuery) === TRUE) {
//     echo "Table 'adminlogin' created successfully!";
// }else {
//     echo "Error creating table: " . $conn->error;
// }

//insertion of data into table
// $insertDataQuery = "
// INSERT INTO Adminlogin (username, password)
// VALUES
//     ('suvuelib77', 'Suvam2003'),
//     ('shivomsamal', 'shivomzade'),
//     ('kamallochan', 'mrkichmich'),
//     ('sumantaelib', 'elibdev'),
//     ('rudrakunu', 'kunuelib')
// ";
// if ($conn->query($insertDataQuery) === TRUE) {
//     echo "Sample data inserted successfully!";
// } else {
//     echo "Error inserting data: " . $conn->error;
// }

//display the table
// $query = "SELECT * FROM Adminlogin";
// $result = $conn->query($query);

// if ($result->num_rows > 0) {
//     echo "<table border='1'>
//             <tr>
//                 <th>ID</th>
//                 <th>Username</th>
//                 <th>Password</th>
//             </tr>";

//     while ($row = $result->fetch_assoc()) {
//         echo "<tr>
//                 <td>{$row['id']}</td>
//                 <td>{$row['username']}</td>
//                 <td>{$row['password']}</td>
//               </tr>";
//     }

//     echo "</table>";
// } else {
//     echo "No records found.";
// }

// Close the connection
$conn->close();
?>
