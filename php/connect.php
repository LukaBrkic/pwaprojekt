<?php
header('Content-Type: text/html; charset=utf-8'); 
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$baza = "pwaprojekt"; 
$dbc =  new mysqli($servername, $username , $password, $baza);
mysqli_set_charset($dbc, "utf8");
if ($dbc->connect_error) {
    die("Connection failed: " . $dbc->connect_error);
  }
?>