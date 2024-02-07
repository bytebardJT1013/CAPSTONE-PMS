<?php
/*define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS',' ');
define('DB_NAME','capstonepms');


    try{
        $dbh = new PDO("mysql:host=".DB_HOST."; dbname=". DB_NAME,DB_USER, DB_PASS);
    } catch(PDOException $e) {
        exit("Error".$E-> getMessage()) ;
    }*/

// MySQL database credentials
/*$servername = "localhost";  // Replace 'localhost' with your MySQL server hostname
$username = "root"; // Replace 'your_username' with your MySQL username
$password = ""; // Replace 'your_password' with your MySQL password
$database = "capstonepms"; // Replace 'your_database' with your MySQL database name

try {
    // Create a new PDO instance
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    echo "Connected successfully";
} catch(PDOException $e) {
    // If an error occurs, display the error message
    echo "Connection failed: " . $e->getMessage();
}

// Perform database operations here...

// Close the database connection
$conn = null;*/

$con = new mysqli('localhost','root','','capstonepms');
if ($con) {
    echo"Connection Successful";
} else {
    die(mysqli_error($con));
}

?>