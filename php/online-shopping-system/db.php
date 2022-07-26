<?php

$servername = "p:192.168.0.123:6033";
$username = "root";
$password = "root";
$db = "database";

// Create connection
$con = mysqli_connect($servername ,$username,$password,$db);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}


?>
