<?php

// include the database object
include '../model/db_init.php';

$id = $_GET['category_id'];
$category_title = $_GET['category_title'];

if(isset($_GET['sortBy'])){
  // if sort by is required
  $sortQuery = $_GET['sortBy'];
  
   // find one book data by id
$categoryBooksQuery = "SELECT * FROM `book` WHERE category_id=". "'" . $id . "' ORDER BY ". $sortQuery . " DESC";
$categoryBookRecods = mysqli_query($database, $categoryBooksQuery);
  
}else{
  // sort by is not required
  
  // find one book data by id
$categoryBooksQuery = "SELECT * FROM `book` WHERE category_id=". "'" . $id . "'";
  
$categoryBookRecods = mysqli_query($database, $categoryBooksQuery);
}



// close that connection
mysqli_close($database);
?>