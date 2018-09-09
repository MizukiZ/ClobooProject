<?php
if(!isset($_SESSION)){ 
session_start(); 
} 


if(isset($_POST['empty'])){
  // empty cart array
  $_SESSION["booksArray"] = array();
  exit();
}

if(!isset($_SESSION["booksArray"])){
  // if books array is not there, create new one
$_SESSION["booksArray"] = array();
  
}

$bookDetail = array();

$bookDetail["id"] = $_POST['id'];
$bookDetail["title"] = $_POST['title'];
$bookDetail["cost"] = $_POST['cost'];
$bookDetail["type"] = $_POST['type'];

// push book detail to session array 
array_push($_SESSION["booksArray"], $bookDetail);

echo count($_SESSION["booksArray"]);