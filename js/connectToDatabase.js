var mysql = require("mysql");

var hostname = "2l5.h.filess.io";
var database = "elibio_gatherword";
var port = "3307";
var username = "elibio_gatherword";
var password = "8ca57c4b3a95e5f1646e0718260917e0fcce1e5b";

var con = mysql.createConnection({
  host: hostname,
  user: username,
  password,
  database,
  port,
});

con.connect(function (err) {
  if (err)
  {
    throw err;
  } 
  console.log("Connected to database!");
});


// Admin table created
// createAdminlogin();
// function createAdminlogin() {
//   const sql = `
//     CREATE TABLE Adminlogin (
//       id INT AUTO_INCREMENT,
//       username VARCHAR(255),
//       password VARCHAR(255),
// PRIMARY KEY(id,username)
//     )
//   `;
//   con.query(sql, (err, result) => {
//     if (err) throw err;
//     console.log('Table "Adminlogin" created successfully!');
//   con.end(); // Close the connection
//   });
// }


//insertion of admin log in data
// const records = [
//   ['suvuelib77', 'Suvam2003'],
//   ['shivomsamal', 'shivomzade'],
//   ['kamallochan', 'mrkichmich'],
//   ['sumantaelib', 'elibdev'],
//   ['rudrakunu', 'kunuelib']
// ];

// var sql = 'INSERT INTO Adminlogin (username, password) VALUES ?';

// con.query(sql, [records], (err, result) => {
//   if (err) throw err;
//   console.log('Inserted ' + result.affectedRows + ' rows.');
// });


  // sql = 'SELECT * FROM Adminlogin';
  // con.query(sql, (err, result) => {
  //   if (err) throw err;
  //   console.log(result); // Display the result (array of records)
  //   con.end(); // Close the connection
  // });

  //   const sql = 'DROP TABLE Adminlogin';
  // con.query(sql, (err, result) => {
  //   if (err) throw err;
  //   console.log('Table "Adminlogin" deleted successfully!');
  //   con.end(); // Close the connection
  // });