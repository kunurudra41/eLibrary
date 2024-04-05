// // Assuming you have already set up your MySQL connection

var hostname = "2l5.h.filess.io";
var database = "elibio_gatherword";
var port = "3307";
var usernam = "elibio_gatherword";
var passwor = "8ca57c4b3a95e5f1646e0718260917e0fcce1e5b";



// Function to check if the input matches any record in the database
function checkInputMatch(id, username, password) {
    const mysql = require('mysql');
    const connection = mysql.createConnection({
        host: hostname,
        user: usernam,
        password: passwor,
        database: database,
        port
    });
    const sql = 'SELECT COUNT(*) AS count FROM Adminlogin WHERE id = ? AND username = ? AND password = ?';
    return new Promise((resolve, reject) => {
        connection.query(sql, [id, username, password], (err, result) => {
            if (err) {
                reject(err);
            } else {
                resolve(result[0].count > 0);
            }
        });
    });
}
// Example usage
const userInputId = 1; // Replace with actual user input ID
const userInputUsername = 'suvuelib77'; // Replace with actual user input username
const userInputPassword = 'Suvam2003'; // Replace with actual user input password

checkInputMatch(userInputId, userInputUsername, userInputPassword)
    .then((matches) => {
        if (matches) {
            console.log('Input matches a record in the database.');
        } else {
            console.log('Input does not match any record.');
        }
    })
    .catch((err) => {
        console.error('Error checking input:', err);
    })
    .finally(() => {
        connection.end();
    });
