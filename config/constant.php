<?php

// Start the session
session_start();

// Prevent CORS policy errors
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *');

$url = "http://localhost/myprojects/reservationwebsite/";
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kopitime";

// Make a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if($conn->connect_error) {
    die("Connection error: " . $conn->connect_error);
}

?>

<?php
 
 //Create Constants to Store Non Repeating Values
//  define('SITEURL', 'http://localhost/myprojects/reservationwebsite/');
//  define('LOCALHOST', 'localhost');
//  define('DB_USERNAME', 'root');
//  define('DB_PASSWORD', '');
//  define('DB_NAME', 'kopitime');

//  $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error()); // Database Connection
//  $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error()); //selecting Database

?>