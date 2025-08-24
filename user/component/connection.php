<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "psources";

// Create connection
$con = mysqli_connect($servername, $username, $password,$database);

// Check connection
if ($con->connect_error) {
    echo "". mysqli_connect_error();
  die("Connection failed: " . $con->connect_error);
}

?>