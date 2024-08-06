<?php

$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "sica";

// Create connection
$mysqli = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($mysqli->connect_error) {
  die("Connection failed: " . $mysqli->connect_error);
}