<?php

include_once '../_helper/console_log.php';

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Cloboo";

// Create connection
$database = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($database->connect_error) {
    die("Connection failed: " . $database->connect_error);
} 
  consoleLog("Connect successfully");
?>