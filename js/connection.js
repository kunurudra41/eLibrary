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


// this is creating table
// createStudentTable();
// function createStudentTable() {
//   const sql = `
//     CREATE TABLE students (
//       id INT AUTO_INCREMENT PRIMARY KEY,
//       name VARCHAR(255),
//       age INT,
//       email VARCHAR(255)
//     )
//   `;
//   con.query(sql, (err, result) => {
//     if (err) throw err;
//     console.log('Table "students" created successfully!');
//   con.end(); // Close the connection
//   });
// }



// this is inserting data into table
// const studentData = {
//   name: 'John Doe',
//   age: 20,
// };
// const sql = 'INSERT INTO students (name, age) VALUES (?, ?)';
// con.query(sql, [studentData.name, studentData.age], (err, result) => {
//   if (err) throw err;
//   console.log('Record inserted successfully!');
//   con.end(); // Close the connection
// });



// this is displaying table
  // const sql = 'SELECT * FROM students';
  // con.query(sql, (err, result) => {
  //   if (err) throw err;
  //   console.log(result); // Display the result (array of records)
  //   con.end(); // Close the connection
  // });



  // deletion of first row
  // const sql = 'DELETE FROM students ORDER BY id LIMIT 1';
  // con.query(sql, (err, result) => {
  //   if (err) throw err;
  //   console.log('First row deleted successfully!');
  //   con.end(); // Close the connection
  // });



// deletion of table
//   const sql = 'DROP TABLE students';
//   con.query(sql, (err, result) => {
//     if (err) throw err;
//     console.log('Table "students" deleted successfully!');
//     con.end(); // Close the connection
//   });