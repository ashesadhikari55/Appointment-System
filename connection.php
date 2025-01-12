<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "db-appointment";

$con = new mysqli($servername,$username,$password,$database);

if(!$con)
{
    die("Connection failed: " . mysqli_connect_error());
}

?>