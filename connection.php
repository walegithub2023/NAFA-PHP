<?php

//Declare Connection Variables
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "nafa";

//Create Connection to the Database
$conn = new mysqli($servername, $username, $password, $dbname);

//Check Connection to the Database
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }


?>

