<?php
$host = 'localhost';
$user= 'root';
$pass = '';
$db='odev';


// Create connection
$conn = new mysqli($host, $user, $pass,$db);
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
